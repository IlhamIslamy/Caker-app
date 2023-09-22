/* JavaScript Code (script.js) */
document.addEventListener("DOMContentLoaded", function () {
    const loginContainer = document.getElementById("login-container");
    const registerContainer = document.getElementById("register-container");
    const forgotPasswordContainer = document.getElementById("forgot-password-container");
    const forgotPasswordLink = document.getElementById("forgot-password-link");
    const registerLink = document.getElementById("register-link");

    loginContainer.classList.add("active");

    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");
    const forgotPasswordForm = document.getElementById("forgot-password-form");

    loginForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const username = document.getElementById("login-username").value;
        const password = document.getElementById("login-password").value;
        // Add your login logic here
        console.log("Logging in with username:", username);
    });

    registerForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const username = document.getElementById("register-username").value;
        const email = document.getElementById("register-email").value;
        const phone = document.getElementById("register-phone").value;
        const password = document.getElementById("register-password").value;
        // Add your registration logic here
        console.log("Registering with username:", username);
    });

    forgotPasswordForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const username = document.getElementById("forgot-username").value;
        const email = document.getElementById("forgot-email").value;
        // Add your forgot password logic here
        console.log("Requesting password reset for username:", username);
    });

    forgotPasswordLink.addEventListener("click", function (e) {
        e.preventDefault();
        loginContainer.classList.remove("active");
        registerContainer.classList.remove("active");
        forgotPasswordContainer.classList.add("active");
    });

    registerLink.addEventListener("click", function (e) {
        e.preventDefault();
        loginContainer.classList.remove("active");
        registerContainer.classList.add("active");
        forgotPasswordContainer.classList.remove("active");
    });
});
