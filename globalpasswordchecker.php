<?php
$hashed_pass = '$2y$10$ViIleDzZvM5nXXfScjwGz.D4GH.CqNabTJ9uoIqydR5.SjmzWuxNi';
$password_sent = $_POST["global_password"];

if(password_verify($password_sent, $hashed_pass)){
    echo "true";
} else {
    echo "false";
}
?>