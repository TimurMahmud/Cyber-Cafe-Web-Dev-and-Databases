<!--*    influenced by
    *    Title: Lab 07 - Connecting to a database
    *    Author: City University London
    *    Date: 2021
    *    Availability: https://moodle.city.ac.uk/pluginfile.php/2254188/mod_resource/content/2/Lab%207%20-%20Connecting%20to%20Database.pdf
    -->

<?php

 $db = new mysqli('smcse-stuproj00.city.ac.uk', 'adbs893', '200013374', 'adbs893');

$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname= $_POST['lastname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$psw = $_POST['psw'];

 //    password encryption
$md5pass = md5($psw);
$psw = $md5pass;


$queryNAME = "SELECT Username FROM Details WHERE Username='".$username."'";
$queryEMAIL = "SELECT Email FROM Details WHERE Email='".$email."'";
$name = mysqli_query($db,$queryNAME) or die (mysqli_error($db));
$emails = mysqli_query($db,$queryEMAIL) or die (mysqli_error($db));

if (mysqli_num_rows($name) == 1){
  echo "name is already taken";

}else if (mysqli_num_rows ($emails) == 1) {
      echo "email is already taken";

}else{

$insert = "INSERT INTO Details (username, firstname, lastname, phone, email, psw) VALUES ('".$username."', '".$firstname."','".$lastname."', '".$phone."','".$email."','".$psw."')";

$stmt = mysqli_query($db, $insert);


    $_SESSION['username'] = $username;
    header("Location: home.html");
    exit();
}

?>


