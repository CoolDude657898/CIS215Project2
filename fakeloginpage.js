/* Written By Michael Meacham */
const globalPassword = document.getElementById("global-pw-id");
const passwordProtectedDiv = document.getElementById("password-protected-div");
const emailInput = document.getElementById("email-id");
const userPassword = document.getElementById("user-pw-id");
const passwordMeterElement = document.getElementById("password-meter");
const emailLabel = document.getElementById("email-label");
const userPasswordLabel = document.getElementById("user-password-label");

let formHidden = true;

globalPassword.addEventListener("input", checkIfCorrectGlobalPassword);

async function checkIfCorrectGlobalPassword(){
    const formData = new FormData();

    formData.append("global_password", globalPassword.value);

    const request = new Request("globalpasswordchecker.php",{
        method: "POST",
        body: formData
    });
    const response = await fetch(request);
    
    const text = await response.text();

    if(text == "true" && formHidden == true){
        formHidden = false;
        showForm();
    } else if(text == "false" && formHidden == false){
        formHidden = true;
        hideForm();
    }
}

function hideForm(){
    emailInput.setAttribute("hidden", "true");
    userPassword.setAttribute("hidden", "true");
    passwordMeter.setAttribute("hidden", "true");
    emailLabel.setAttribute("hidden", "true");
    userPasswordLabel.setAttribute("hidden", "true");
    passwordProtectedDiv.setAttribute("hidden", "true");
}

function showForm(){
    emailInput.removeAttribute("hidden");
    userPassword.removeAttribute("hidden");
    passwordMeter.removeAttribute("hidden");
    emailLabel.removeAttribute("hidden");
    userPasswordLabel.removeAttribute("hidden");
    passwordProtectedDiv.removeAttribute("hidden");
}

hideForm();