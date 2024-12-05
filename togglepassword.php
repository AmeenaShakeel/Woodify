<script>
// toggle Password
document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    eyeIcon.classList.toggle('fa-eye-slash');
    eyeIcon.classList.toggle('fa-eye');
});

document.getElementById('togglePassword1').addEventListener('click', function () {
    const passwordInput1 = document.getElementById('cpassword');
    const eyeIcon1 = document.getElementById('eyeIcon1');
    
    const type = passwordInput1.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput1.setAttribute('type', type);

    eyeIcon1.classList.toggle('fa-eye-slash');
    eyeIcon1.classList.toggle('fa-eye');
});
</script>