$(document).ready(function() {
    $('#registrationForm').on('submit', function(event) {
        // Client-side validation logic
        let valid = true;
        
        // Check required fields
        $('input[required], select[required]').each(function() {
            if ($(this).val() === '') {
                alert('Please fill out the ' + $(this).prev('label').text() + ' field.');
                valid = false;
                return false;
            }
        });
        
        // Check valid email
        const email = $('#email').val();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert('Please enter a valid email address.');
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});
