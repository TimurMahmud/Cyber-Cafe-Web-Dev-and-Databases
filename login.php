<!--*    influenced by
    *    Title: Lab 07 - Connecting to a database
    *    Author: City University London
    *    Date: 2021
    *    Availability: https://moodle.city.ac.uk/pluginfile.php/2254188/mod_resource/content/2/Lab%207%20-%20Connecting%20to%20Database.pdf
    -->


<?php
   if(!isset($_SESSION)) {
       session_start(); // start the session if it still does not exist
   }

  // connect to the database
	$conn = new mysqli('smcse-stuproj00.city.ac.uk', 'adbs893', '200013374', 'adbs893'); 
   if ($db->connect_errno) {
       printf("Connection failed: %s\n", $db->connect_error);
       exit();
   } else {
       // declare variables containing values from the input fields of the login form
       //the values come from the name attributes of the input fields
       
       $username = $_POST['username'];
       $psw = $_POST['psw'];
       
    // password encryption
       $md5pass = md5($psw);
       $psw = $md5pass;

       // select the username and password fields which match the data entered in the input fields
       $query = "SELECT username, psw FROM Details WHERE username = '$username' AND psw = '$psw'";
       // execute the query
       $result = $conn->query($query);
       // store the results in $row variable
       $row = mysqli_fetch_row($result);

        // if $row returned no results from the query, then create a javascript alert
        if (!isset($row[0]) || !isset($row[1])) {
        // this will alert the user and then redirect to the specified page (Change the URL)
        echo "<script language='javascript'>
                alert('Please enter valid credentials.');
                window.location.href = 'https://smcse.city.ac.uk/student/adbs893/login.html';
                </script>";
        }
        // if there is a match then activate a custom session called 'username' which allows access to a new web page called appointments
        else if ($username == $row[0] && $psw == $row[1]) {
            $_SESSION['username'] = $username;
            echo "login success";

            // redirect to this page
            header("Location: home.html");
        }
 }

?>

