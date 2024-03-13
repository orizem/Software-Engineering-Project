const pages = ["navbar", "footer"];

// /* Load Pages */
// pages.forEach((page) => {
//   loadFile(page, "html");
// });

/* Load Header */
loadFile(pages[0], "php");

/* Load Footer */
loadFile(pages[1], "html");

/* Stars Background Animation */
var ul = document.getElementById("stars");
for (var i = 1; i <= 15; i++) {
  var li = document.createElement("li");
  li.innerHTML = "&#9733;";
  ul.appendChild(li);
}