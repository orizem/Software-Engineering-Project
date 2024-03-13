function resetErrors() {
  // Reset error messages
  const inputs = [
    "firstName",
    "lastName",
    "phoneNumber",
    "email",
    "password",
    "birthDate",
  ];

  inputs.forEach((element) => {
    elem = document.getElementById(`${element}Error`);
    elem.innerText = "";
    elem.style.display = "none";
  });
}

function testValidation(input, id, message) {
  if (input === "") {
    elem.style.display = "none";
    return false;
  }

  elem = document.getElementById(id);
  elem.innerText = message;
  elem.style.display = "";

  return false;
}

function validateForm() {
  resetErrors();

  // Get form values
  var firstName = document.getElementById("firstName").value;
  var lastName = document.getElementById("lastName").value;
  var phoneNumber = document.getElementById("phoneNumber").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var birthDate = document.getElementById("birthDate").value;

  // Validate first name and last name (only letters allowed)
  var nameRegex = /^[a-zA-Z]+$/;
  if (!nameRegex.test(firstName)) {
    return testValidation(firstName, id="firstNameError", message="Only letters allowed");
  }

  if (!nameRegex.test(lastName)) {
    return testValidation(lastName, id="lastNameError", message="Only letters allowed");
  }

  // Validate phone number (10 digits)
  var phoneNumberRegex = /^[0-9]{10}$/;
  if (!phoneNumberRegex.test(phoneNumber) || phoneNumber.length != 10) {
    return testValidation(phoneNumber, id="phoneNumberError", message="Enter a valid phone number");
  }

  // Validate email
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email) || email.length > 100) {
    return testValidation(email, id="emailError", message="Enter a valid email address");
  }

  // Validate password (between 8 and 30 characters)
  if (password.length < 8 || password.length > 30) {
    return testValidation(password, id="passwordError", message="Enter a valid password");
  }

  // Validate birthDate (16 years ago or older)
  var currentDate = new Date();
  var inputDate = new Date(birthDate);
  var sixteenYearsAgo = new Date();
  sixteenYearsAgo.setFullYear(currentDate.getFullYear() - 16);

  if (inputDate > sixteenYearsAgo) {
    return testValidation(birthDate, id="birthDateError", message="Must be at least 16 years old");
  }

  document.getElementById("submitButton").disabled = false;
  return true;
}

resetErrors();

// Disable submit button by default
document.getElementById("submitButton").disabled = true;

// Enable submit button only when all fields are valid
document.addEventListener("input", function () {
  document.getElementById("submitButton").disabled = !validateForm();
});

// Prevent form submission if the submit button is disabled
document
  .getElementById("registrationForm")
  .addEventListener("submit", function (event) {
    if (document.getElementById("submitButton").disabled) {
      event.preventDefault();
      alert("Please fill in all required fields with valid data.");
    }
  });
