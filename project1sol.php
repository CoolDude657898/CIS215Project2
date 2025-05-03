<!DOCTYPE html>
<html>
    <head>
        <title>Survey: PHP Questions</title>
    </head>
<body>

<!-- Big takeaways: required keyword, make sure value is in there, feel free to use other attributes! -->

<form action="project1submit.php" method="post" class="survey">

<fieldset>

<label id="email-label">Enter your email: </label>
<input type="email" name="email-name" id="email-id" required>

<label>Enter the global password: </label>
<input type="password" name="global-pw-name" id="global-pw-id" required>

<label id="user-password-label">Enter your user password: </label>
<input type="password" name="user-pw-name" id="user-pw-id">

<!--Written by Amanda Nichols-->
<small id="password-meter" style="background-color:red"> Too Weak </small>

</fieldset>

<div id="password-protected-div">
<!--Written by Michael Meacham-->
<div>
    <ul>
        <li>User password must be at least 8 characters long</li>
        <li>User password must contain an uppercase letter</li>
        <li>User password must contain a lowercase letter</li>
        <li>User password must contain a number</li>
    </ul>
</div>

<div>
<label>What age are you? </label>
<div>
<label> <input type="radio" name="age" id="age-0" value="0" required>
0-12 </label>
</div>
<?php

for($i=13;$i<65;$i=$i + 5){
    $j = $i + 4;
    print("<div><label><input type='radio' name='age' id='age-$i'value='$i'>
    $i-$j </label></div>");
}

?>
<div>
<label> <input type="radio" name="age" id="age-68" value="68">
68+ </label>
</div>
</div>

<div>
<select name="gender" id="gender">
    <option value="">--Please select your gender--</option>
    <option value="ma">Male</option>
    <option value="fe">Female</option>
    <option value="nb">Nonbinary</option>
    <option value="gf">Genderfluid</option>
    <option value="ag">Agender</option>
    <option value="ot">Choose not to say/Other</option>
</select>
</div>

<div>
<!--Written by Amanda Nichols-->
<select name="pronoun" id="pronoun">
<option value="">--Please select your pronouns--</option>
    <option value="hh">He/Him</option>
    <option value="sh">She/Her</option>
    <option value="tt">They/Them</option>
    <option value="Ht">He/They</option>
    <option value="St">She/They</option>
    <option value="na">Choose not to say/Other</option>
</select>
</div>


<div>
    <label> What version of PHP do you use? (only include the main version number) <input type="number" name="version" id="version" min="1", max="9" required> </label>
</div>

<div>
    <div>
        Please answer in 120 characters or fewer.
    </div>
    <label> What is your favorite part of PHP?     
    <input type=text name="favorite" id="favorite" required></label>
</div>

<button type="submit" name="button-submit-form" id = "button-submit-form-id">Submit</button>

<!--Written by Amanda Nichols-->
<div>
  <label id="background-color-label">Background Color: </label>
  <input type="color" id="background-color" value="#FFFFFF">
  <label id="text-color-label">Text Color: </label>
  <input type="color" id="text-color" value="#000000">
</div>

</div>

</form>

<div><a href='project1data.php'>View data page here</a></div>

<script src="colorchanger.js"></script>
<script src="uniqueemails.js"></script>
<script src="passwordmeter.js"></script>
<script src="fakeloginpage.js"></script>

</body></html>
