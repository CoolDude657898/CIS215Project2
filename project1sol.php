<!DOCTYPE html>
<html>
    <head>
        <title>Survey: PHP Questions</title>
    </head>
<body>

<!-- Big takeaways: required keyword, make sure value is in there, feel free to use other attributes! -->

<form action="project1submit.php" method="post" class="survey">

<fieldset>

<label>Enter your email: </label>
<input type="email" name="email-name" id="email-id" required>

<label>Enter the global password: </label>
<input type="password" name="global-pw-name" id="global-pw-id" required>

<label>Enter your user password: </label>
<input type="password" name="user-pw-name" id="user-pw-id">

</fieldset>

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

</form>

<div><a href='project1data.php'>View data page here</a></div>

</body></html>
