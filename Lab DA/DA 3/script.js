document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('registrationForm');

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        clearErrors();

        if (!validateForm()) {
            return;
        }
        alert('Registration successful!');
    });

    function validateForm() {
        let isValid = true;
        const name = document.getElementById('name').value.trim();
        const registerNumber = document.getElementById('registerNumber').value.trim();
        const password = document.getElementById('password').value.trim();
        const confirmPassword = document.getElementById('confirmPassword').value.trim();
        const dob = document.getElementById('dob').value.trim();
        const email = document.getElementById('email').value.trim();
        const cgpa = parseFloat(document.getElementById('cgpa').value.trim());

        if (name === '' || registerNumber === '' || password === '' || confirmPassword === '' ||
            dob === '' || email === '' || cgpa === NaN) {
            alert('All fields are required.');
            isValid = false;
        }

        if (password !== confirmPassword) {
            alert('Passwords do not match.');
            isValid = false;
        }

        if (!dob.match(/^\d{2}\/\d{2}\/\d{2}$/)) {
            alert('DOB must be in dd/mm/yy format.');
            isValid = false;
        }

        if (!validateEmail(email)) {
            alert('Invalid email format.');
            isValid = false;
        }

        return isValid;
    }

    function validateEmail(email) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }

    function displayError(message) {
        const errorMessage = document.createElement('div');
        errorMessage.className = 'error-message';
        errorMessage.textContent = message;
        form.appendChild(errorMessage);
    }

    function clearErrors() {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach((message) => message.remove());
    }
});
