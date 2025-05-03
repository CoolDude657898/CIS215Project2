/* Written by Amanda Nichols */

const backgroundButton = document.getElementById("background-color");
const textButton = document.getElementById("text-color");

backgroundButton.addEventListener("input", function() {
    document.body.style.backgroundColor = backgroundButton.value;
});

textButton.addEventListener("input", function() {
    document.body.style.color = textButton.value;
});
