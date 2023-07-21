<!--*    influenced by
    *    Title: Lab 07 - Connecting to a database
    *    Author: City University London
    *    Date: 2021
    *    Availability: https://moodle.city.ac.uk/pluginfile.php/2254188/mod_resource/content/2/Lab%207%20-%20Connecting%20to%20Database.pdf
    -->

<?php

$db = new mysqli('smcse-stuproj00.city.ac.uk', 'adbs893', '200013374', 'adbs893');

$email = $_POST['email'];
$bookingEnquiry = $_POST['bookingEnquiry'];
$insert = "INSERT INTO Booking (email,bookingEnquiry) VALUES ('".$email."', '".$bookingEnquiry."')";
$stmt = mysqli_query($db, $insert);
header("Location: booking.html");
exit();
  
?>