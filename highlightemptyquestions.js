/* Written by Michael Meacham */

const pronounQuestion = document.getElementById("pronoun");
const genderQuestion = document.getElementById("gender");
const ageQuestion = document.getElementById("age-label");
const emailQuestion = document.getElementById("email-id");
const userPasswordQuestion = document.getElementById("user-pw-id");
const versionQuestion = document.getElementById("version");
const favoriteQuestion = document.getElementById("favorite");
const submitButton = document.getElementById("button-submit-form-id");
const ageRadioButtons = document.getElementsByName("age");

const redBorderStyle = "2px solid red";

submitButton.addEventListener("click", submitOrNot);

pronounQuestion.addEventListener("input", removeRedBorderPronoun);
genderQuestion.addEventListener("input", removeRedBorderGender);
emailQuestion.addEventListener("input", removeRedBorderEmail);
userPasswordQuestion.addEventListener("input", removeRedBorderUserPassword);
versionQuestion.addEventListener("input", removeRedBorderVersion);
favoriteQuestion.addEventListener("input", removeRedBorderFavorite);

for(let i = 0; i < ageRadioButtons.length; i++){
    ageRadioButtons[i].addEventListener("change", removeRedBorderAge);
}

function removeRedBorderPronoun(){
    if(pronounQuestion.value != ""){
        pronounQuestion.style.border = "";
    }
}

function removeRedBorderGender(){
    if(genderQuestion.value != ""){
        genderQuestion.style.border = "";
    }
}

function removeRedBorderEmail(){
    if(emailQuestion.value != ""){
        emailQuestion.style.border = "";
    }
}

function removeRedBorderUserPassword(){
    if(userPasswordQuestion.value != ""){
        userPasswordQuestion.style.border = "";
    }
}

function removeRedBorderVersion(){
    if(versionQuestion.value != ""){
        versionQuestion.style.border = "";
    }
}

function removeRedBorderFavorite(){
    if(favoriteQuestion.value != ""){
        favoriteQuestion.style.border = "";
    }
}

function removeRedBorderAge(){
    if(checkIfAgeSelected() == true){
        ageQuestion.style.border = "";
    }
}

function checkIfAgeSelected(){
    for(let i = 0; i < ageRadioButtons.length; i++){
        if(ageRadioButtons[i].checked == true){
            return true;
        }
    }

    return false;
}

function colorUnfilledQuestionsRed(){
    let unfilledQuestions = false;

    if(pronounQuestion.value == ""){
        pronounQuestion.style.border = redBorderStyle;
        unfilledQuestions = true;
    } else {
        pronounQuestion.style.border = "";
    }

    if(genderQuestion.value == ""){
        genderQuestion.style.border = redBorderStyle;
        unfilledQuestions = true;
    } else {
        genderQuestion.style.border = "";
    }

    if(emailQuestion.value == ""){
        emailQuestion.style.border = redBorderStyle;
        unfilledQuestions = true;
    } else {
        emailQuestion.style.border = "";
    }

    if(userPasswordQuestion.value == ""){
        userPasswordQuestion.style.border = redBorderStyle;
        unfilledQuestions = true;
    } else {
        userPasswordQuestion.style.border = "";
    }

    if(versionQuestion.value == ""){
        versionQuestion.style.border = redBorderStyle;
        unfilledQuestions = true;
    } else {
        versionQuestion.style.border = "";
    }

    if(favoriteQuestion.value == ""){
        favoriteQuestion.style.border = redBorderStyle;
        unfilledQuestions = true;
    } else {
        favoriteQuestion.style.border = "";
    }

    if(checkIfAgeSelected() == false){
        ageQuestion.style.border = redBorderStyle;
        unfilledQuestions = true;
    } else {
        ageQuestion.style.border = "";
    }

    return unfilledQuestions;
}

function submitOrNot(event){
    let areQuestionsUnfilled = colorUnfilledQuestionsRed();

    if(areQuestionsUnfilled == true){
        event.preventDefault();
    }
}