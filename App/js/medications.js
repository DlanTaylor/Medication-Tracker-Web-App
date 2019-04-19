$(document).ready(() => {

  getMedications();

  $('#createPrescription').click(e => {
    $('#viewPrescriptions').removeClass('active');
    $('#createPrescription').addClass('active');
    $("#view").hide();
    $("#create").show();
  });

  $('#viewPrescriptions').click(e => {
    $('#createPrescription').removeClass('active');
    $('#viewPrescriptions').addClass('active');
    $("#create").hide();
    $("#view").show();
  });

  $('#list-tab').on('click', 'a', function (e) {
    e.preventDefault();
    $('#list-tab a').removeClass('active');
    $(this).addClass('active');
    $('#nav-tabContent div').removeClass('show');
    $(this).tab('show');
  });

  $('#createBtn').click(e => {
    const id = UUID4();
    const email = $('#email').val();
    const prescription = $('#prescription').val();
    const instruction = $('#instruction').val();
    const dosage = $('#dosage').val();
    const doctor = $('#doctor option:selected').val().substr(4);
    
    $.ajax({
      type: 'post',
      url: 'php/addMed.php',
      data: {
        id: id,
        email: email,
        prescription: prescription,
        instruction: instruction,
        dosage: dosage,
        doctor: doctor
      },
      success: () => {
        console.log('Event added succesfully');

        // Clear all fields
        $('#email').val("");
        $('#prescription').val("");
        $('#instruction').val("");
        $('#dosage').val("");
        $('#doctor option:eq(0)').prop('selected', true);

        getMedications();
        $('#viewPrescriptions').click();
      },
      statusCode: {
        // Internal server error
        500: () => {
          alert("Server error!");
        }
      }
    });
  });

  $('#logout').click(e => {
    e.preventDefault();
    $.ajax({
      type: 'post',
      url: 'php/logout.php',
      success: () => {
        // Goes to login screen
        console.log('Logged out');
        window.location = 'login.html';
      }
    });
  });

  function UUID4() {
    function S4() {
      return (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1);
    }
    return (S4() + S4() + '-' + S4() + '-4' + S4().substr(0, 3) + '-' + S4() + '-' + S4() + S4() + S4()).toLowerCase();
  }

  function getMedications() {
    $.ajax({
      type: 'post',
      url: 'php/getMedications.php',
      statusCode: {
        // OK
        200: results => {
          const result = JSON.parse(results);
          let email;
          let prescription;
          let instruction;
          let dosage;
          let doctor;
          $('#list-tab').html("");
          $('#nav-tabContent').html("");

          $.each(result, (i, data) => {
            email = data.email;
            prescription = data.prescription;
            instruction = data.instruction;
            dosage = data.dosage;
            doctor = data.doctor;

  
            // Show first medication automatically
            if (i == 0) {
              $('#list-tab').append(`<a class="list-group-item list-group-item-action active" data-toggle="list" href="#list-${i}" role="tab"> ${prescription}</a>`);
              $('#nav-tabContent').append(`<div class="tab-pane fade show" id="list-${i}" role="tabpanel"><div class="list-group">
              <a href="#" class="list-group-item list-group-item-action list-group-item-info">Directions: ${instruction}</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-info">Dosage : ${dosage}</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-info">Doctor : ${doctor}</a>
              
              </div></div>`);
            } else {
              $('#list-tab').append(`<a class="list-group-item list-group-item-action" data-toggle="list" href="#list-${i}" role="tab"> ${prescription}</a>`);
              $('#nav-tabContent').append(`<div class="tab-pane fade" id="list-${i}" role="tabpanel"><div class="list-group">
              <a href="#" class="list-group-item list-group-item-action list-group-item-info">Directions: ${instruction}</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-info">Dosage : ${dosage}</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-info">Doctor : ${doctor}</a>
              
              </div></div>`);
            }
          });
        },
        // No content
        204: () => {
          console.log('No medications in database to retrieve.');
        }
      }
    });
  }
});
