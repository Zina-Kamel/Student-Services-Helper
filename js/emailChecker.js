var emailField = document.getElementById("email-field");
var emailLabel = document.getElementById("email-label");
var emailError = document.getElementById("email-error");

function validatePassword() {
    emailLabel.style.bottom = "45px";
     if (!emailField.value.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
        
        emailError.innerHTML = "Make sure to use your LAU email<br><em>example: ariana.grande@lau.edu</em>";
        return false;
    }
    emailError.innerHTML = "Valid email";
    return true;
}
