const openLogin = document.getElementById('open-login');
const loginContainer = document.getElementById('login-container');
const overlay = document.getElementById('overlay');
const closeLogin = document.getElementById('close-login');
const openRegister = document.getElementById('open-register');
const registerContainer = document.getElementById('register-container');
const closeRegister = document.getElementById('close-register');


openLogin.addEventListener('click', function() {
  loginContainer.style.display = 'grid';
  overlay.style.display = 'block';
});

closeLogin.addEventListener('click', function() {
  loginContainer.style.display = 'none';
  overlay.style.display = 'none';
});

openRegister.addEventListener('click', function(){
    registerContainer.style.display = 'block';
    overlay.style.display = 'block';
});

closeRegister.addEventListener('click', function() {
    registerContainer.style.display = 'none';
    overlay.style.display = 'none';
});
