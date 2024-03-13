function loadFile(file_name, format) {
  fetch(`/${file_name}.${format}`)
    .then((response) => response.text())
    .then((data) => {
      // Insert the loaded HTML content into the container div
      document.getElementById(`${file_name}-container`).innerHTML = data;

      // Call a function from the fetched HTML file if needed
      if (typeof onFetchedHtmlLoaded === "function") {
        onFetchedHtmlLoaded();
      }
    })
    .catch((error) => console.error(`Error loading ${file_name}:`, error));
}

try {
  var viewMode = getCookie("view-mode");
  if (viewMode == "desktop") {
    viewport.setAttribute("content", "width=1024");
  } else if (viewMode == "mobile") {
    viewport.setAttribute(
      "content",
      "width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no"
    );
  }
} catch {}
