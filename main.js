/* Written by Michael Meacham */
const email = document.getElementById("email-id");
const email_in_use_p = document.createElement("p");
email_in_use_p.innerText = "Email is already in use! If you are updating your data, please input the correct user password!";

email.addEventListener("input", check_email_in_db);

async function check_email_in_db(){
    const response = await fetch(`checkemail.php?email=${email.value}`);

    const json = await response.json();

    if(json == true){
        email.parentElement.after(email_in_use_p);
    }

    if(json == false){
        email_in_use_p.remove();
    }
}