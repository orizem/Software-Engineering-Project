const loggedIn = false;

function loadLoginOrRegister(logged) {
  var data = "ascd";
  if (logged === true) {
    data = '<li><button><a href="/">יציאה</a></button></li>';
  } else {
    data = '<li><button><a href="/">התחברות</a></button></li>';
  }
  // Insert the loaded HTML content into the container div
  const navbarItems = document.getElementById(`navId`).innerHTML
  document.getElementById(`navId`).innerHTML = navbarItems + data;
}

/* Load Login or Register */
loadLoginOrRegister(loggedIn);
