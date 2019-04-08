<?php
session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
        <script src="fullcalendar/lib/jquery.min.js"></script>
        <script src="fullcalendar/lib/moment.min.js"></script>
        <script src="fullcalendar/fullcalendar.min.js"></script>
        <meta charset="UTF-8">
        <title>Medication Tracker App</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <!-- <link href="css/cover.css" rel="stylesheet"> -->
        <link href="css/calendar.css" rel="stylesheet">
        <!-- Script that runs calendar -->
        <script src="js/calendar.js"></script>

    </head>
    <body class="text-center" style="background-image: url(images/doctor1.jpg); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                    <!-- Add logo here -->
                    <h3 class="masthead-brand">Team Overload</h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link" href="index.html">Home</a>
                        <a class="nav-link active" href="calendar.php">Calendar</a>
                        <a class="nav-link" href="#">Prescriptions</a>
                        <a class="nav-link" href="#">Appointments</a>
                        <a class="nav-link" href="login.html">Login</a>
                        <a class="nav-link" href="register.html">Register</a>
                    </nav>
                </div>
            </header>
        </div>
        <!-- <h2>Calendar</h2> -->
        <div class="calen">
            <div class="response"></div>
            <div id='calendar'></div>
        </div>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
        </footer>

        <!-- Bootstrap 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>


</html>