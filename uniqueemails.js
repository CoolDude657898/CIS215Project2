/* Written by Michael Meacham */
const email = document.getElementById("email-id");
const emailInUseP = document.createElement("p");
emailInUseP.innerText = "Email is already in use! If you are updating your data, please input the correct user password!";

email.addEventListener("input", checkEmailInDb);

async function checkEmailInDb(){
    const response = await fetch(`checkemail.php?email=${email.value}`);

    const json = await response.json();

    if(json == true){
        email.parentElement.after(emailInUseP);
    }

    if(json == false){
        emailInUseP.remove();
    }
}