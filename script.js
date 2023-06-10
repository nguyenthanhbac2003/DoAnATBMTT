const wrapper  = document.querySelector('.wrapper');
const registerLink = document.querySelector('.register-link');
const loginLink = document.querySelector('.login-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');
const contentLink = document.querySelector('.content-link');


registerLink.onclick = () => {
    wrapper.classList.add('active');
};

loginLink.onclick = () => {
    wrapper.classList.remove('active');
};
btnPopup.onclick = () => {
    wrapper.classList.add('active-popup');
};
iconClose.onclick = () => {
    wrapper.classList.remove('active-popup');
};

contentLink.onclick = () => {
    wrapper.classList.add('active');
};


contentLink.onclick = () => {
    wrapper.classList.add('active');
    window.location.href = '.register-link';
};


/// script.js
document.addEventListener("DOMContentLoaded", function() {
    var registerLink = document.querySelector(".register-link");
    registerLink.addEventListener("click", function(e) {
        e.preventDefault();
        showRegistrationForm();
    });

    function showRegistrationForm() {
        var loginForm = document.querySelector(".form-box.login");
        var registerForm = document.querySelector(".form-box.register");

        loginForm.style.display = "none";
        registerForm.style.display = "block";
    }
});
