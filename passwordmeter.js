/* Written by Amanda Nichols */

const passwordBox = document.getElementById("user-pw-id");
const passwordMeter = document.getElementById("password-meter");


passwordBox.addEventListener("keyup", function() {

    let password = passwordBox.value;

    let upper = false;
    let lower = false;
    let special = false;
    let number = false;
    let length = 0;

    for (let i = 0; i < password.length; i++) {

        if (password[i] >= 'A' && password[i] <= 'Z') {
            upper = true;
        } else if (password[i] >= 'a' && password[i] <= 'z') {
            lower = true;
        } else if (password[i] >= '0' && password[i] <= '9') {
            number = true;
        } else {
            special = true;
        }
        length++;

    }


    if( upper && lower && special && number && length >= 8 ){ //password is valid

        if(length >= 12) { //password is over 12 characters
            passwordMeter.textContent = "Good";
            passwordMeter.style.backgroundColor = "green";
        }
        else { //password is valid but under 12 characters
            passwordMeter.textContent = "OK";
            passwordMeter.style.backgroundColor = "yellow";
        }
    }
    else { //password is invalid
        passwordMeter.textContent = "Too Weak";
        passwordMeter.style.backgroundColor = "red";
    }

});
