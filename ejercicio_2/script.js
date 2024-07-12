document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Show the success message
    document.getElementById('successMessage').style.display = 'block';
    
    // Clear the form fields
    document.getElementById('name').value = '';
    document.getElementById('email').value = '';
    document.getElementById('message').value = '';
    document.getElementById("contact-form").submit();
});