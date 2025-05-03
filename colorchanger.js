/* Written by Amanda Nichols */

const backgroundButton = document.getElementById("background-color");
const textButton = document.getElementById("text-color");

backgroundButton.addEventListener("blur", changeBackgroundColor);

textButton.addEventListener("blur", changeTextColor);

function changeBackgroundColor() {
    document.body.style.backgroundColor = backgroundButton.value;
}

function changeTextColor() {
    document.body.style.color = textButton.value;
}
