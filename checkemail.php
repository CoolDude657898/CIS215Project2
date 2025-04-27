<?php
/**
 * Written by Michael Meacham
 */
$email = $_GET["email"];
require("dbconfig.php");
$db = connectDB();

function check_if_email_in_db($email){
    global $db;

    $prep_select = $db->prepare("SELECT email FROM project_data");
    $prep_select->execute();
    
    $emails = $prep_select->fetchAll();
    
    foreach($emails as $email_row){
        if($email_row[0] == $email){
            return true;
        }
    }

    return false;
}

echo json_encode(check_if_email_in_db($email));
?>