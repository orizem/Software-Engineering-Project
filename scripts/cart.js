document.addEventListener('DOMContentLoaded', function() {
    var forms = document.querySelectorAll('.shoppingCartForm'); // Get all forms with id "shoppingCartForm"

    forms.forEach(function(form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            var formData = new FormData(form); // Create a FormData object from the form

            fetch('php/shoppingCart.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text()) // Assuming the response is text
            .then(data => {
                console.log('Success:', data);
                // Reload the page containing the form
                window.location.href = "http://gourmethaven.byethost4.com/menu.php#" + form.id.replace('cart', 'food');
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
    });
});
