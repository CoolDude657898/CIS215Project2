<!DOCTYPE html>
<html>
    <head>
        <title>PHP Questions: Submit</title>
    </head>
<body>

<?php
/**
 * Note: I created my SQL table in PuTTY using the following command:
 * 
 * CREATE TABLE project_data (id INT PRIMARY KEY AUTO_INCREMENT, email VARCHAR(320), age INT, gender CHAR(2), pronoun CHAR(2), version INT, favorite VARCHAR(120));
 */

# Retrieved the hashed password as discussed in classes.
# Password: CIS215php!
$hashed_pass = '$2y$10$ViIleDzZvM5nXXfScjwGz.D4GH.CqNabTJ9uoIqydR5.SjmzWuxNi';
require ('dbconfig.php');
$db = connectDB();

/**
 * Validate returns an empty string if there were no errors, and a message about the worst error if there was one in validation.
 */
function validate(){
    global $hashed_pass;
    # The most important piece is the password:
    if(!password_verify($_POST["pw-name"], $hashed_pass)){
        return "Error: Incorrect Password.";
    }
    # Next, let's make sure everything was filled in:
    if(($_POST["email-name"] == NULL) or ($_POST["age"] == NULL) or ($_POST["gender"] == "") or ($_POST["pronoun"] == "") or ($_POST["version"] == NULL) or ($_POST["favorite"] == NULL)){
        return "Error: You have not filled in all questions.";
    }
    # Now, let's make sure the results make sense.

    # Email
    if(!filter_var($_POST["email-name"], FILTER_VALIDATE_EMAIL)){
        return "Please enter a valid email address.";
    }

    # This next stuff is some complicated SQL commands to determine if there is an email like the one given.
    # equivalent to: select count(email) from project_data where email like "kegross%" and email like "%genesee.edu";
    # assuming kegross@genesee.edu is the email
    # it'll find the count! Try it out!
    # % is a placeholder, saying any value could be there (like a wildcard)

    ## This is the Email validation that doesn't work!

    /* $email = filter_var($_POST["email-name"], FILTER_VALIDATE_EMAIL);
    $email_pieces = explode("@", $email);
    $front = '"' . $email_pieces[0] . "%" . '"';
    $back = '"' . "%" . $email_pieces[1] . '"';
    global $db;
    $num_emails = $db->prepare("SELECT count(email) FROM project_data where email like $front and email like $back");
    $num_emails->execute();
    $fetch_emails = $num_emails->fetchAll();
    # This is getting the size of the array, because all we care about is if it's empty or not
    if(count($fetch_emails) > 0){
        return "Only one entry per email.";
    } */

    # Age
    $age_list = ["0"];
    for($i=13;$i<65;$i=$i + 5){
        $age_list []= $i;
    }
    $age_list []= "68";
    if(!in_array($_POST["age"], $age_list)){
        return "Please select one of the radio buttons to indicate your age.";
    }

    # Gender
    if(strlen($_POST["gender"]) != 2){
        return "Please select a gender from the gender dropdown.";
    }

    # Pronoun
    if(strlen($_POST["pronoun"]) != 2){
        return "Please select pronouns from the gender dropdown.";
    }

    # Version
    if(!is_numeric($_POST["version"])){
        return "Please enter a number for Version.";
    } else if($_POST["version"] < 0 || $_POST["version"] > 8){
        return "Please enter a valid PHP Version.";
    }

    # Favorite
    if(strlen($_POST["favorite"]) > 120){
        return "Please keep your character count below 120 for your favorite part of PHP.";
    }
    return "";
}

/**
 * Sanitize returns sanitized data in the form of an array
 */
function sanitize(){
    $email = filter_var($_POST["email-name"], FILTER_VALIDATE_EMAIL);
    $age = (int)$_POST["age"];
    $gender = htmlentities($_POST["gender"]);
    $pronoun = htmlentities($_POST["pronoun"]);
    $version = (int)$_POST["version"];
    $favorite = htmlentities($_POST["favorite"]);

    return array($email, $age, $gender, $pronoun, $version, $favorite);
}

/**
 * Add Data adds sanitized data into SQL safely
 */
function add_data(){
    global $db;
    $prep_insert = $db->prepare("INSERT INTO project_data (email, age, gender, pronoun, version, favorite) values (?,?,?,?,?,?)");
    $prep_insert->execute(sanitize());
}


if(validate()==""){
    print("<div>Thanks for your submission!</div>");
    print("<div><a href='project1data.php'>View data page here</a></div>");
    add_data();
} else{
    print("<div>We could not take your data at this time</div>");
    print(validate());
    print("<div><a href='project1sol.php'>Try submitting again here</a></div>");
}

?>

</body></html>
