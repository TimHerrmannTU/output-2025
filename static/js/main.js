// Import HTML snippet
function loadHTML(htmlName) {
    fetch(`${htmlName}.html`)
        .then(response => response.text())
        .then(data => {
            document.getElementById(`${htmlName}-ph`).outerHTML = data;
        })
        .catch(error => console.error('Error loading snippet:', error));
}