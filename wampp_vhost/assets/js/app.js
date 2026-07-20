const form = document.getElementById("loginForm");

const email = document.getElementById("email");

const password = document.getElementById("password");

const togglePassword = document.getElementById("togglePassword");

const toggleIcon = document.getElementById("toggleIcon");

const loginBtn = document.getElementById("loginBtn");

const btnText = document.getElementById("btnText");

const btnSpinner = document.getElementById("btnSpinner");

const capsLockWarning = document.getElementById("capsLockWarning");

const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


// Password Toggle

togglePassword.addEventListener("click", () => {

    if (password.type === "password") {

        password.type = "text";

        toggleIcon.classList.replace("bi-eye", "bi-eye-slash");

    } else {

        password.type = "password";

        toggleIcon.classList.replace("bi-eye-slash", "bi-eye");

    }

});


// Caps Lock

password.addEventListener("input", function (e) {

    if (e.getModifierState("CapsLock")) {

        capsLockWarning.classList.remove("d-none");

    } else {

        capsLockWarning.classList.add("d-none");

    }

});


email.addEventListener("input", function () {

    email.classList.remove("is-invalid");

});

password.addEventListener("input", function () {

    password.classList.remove("is-invalid");

});

password.addEventListener("blur", function () {

    capsLockWarning.classList.add("d-none");

});


// Form Validation

form.addEventListener("submit", function (e) {

    e.preventDefault();

    let isFormValid = true;

    if (!emailPattern.test(email.value.trim())) {

        email.classList.add("is-invalid");

        isFormValid = false;

    } else {

        email.classList.remove("is-invalid");

    }

    if (password.value.trim().length < 8) {

        password.classList.add("is-invalid");

        isFormValid = false;

    } else {

        password.classList.remove("is-invalid");

    }

    if (!isFormValid) {

        return;

    }

    loginBtn.disabled = true;

    togglePassword.disabled = true;

    btnText.textContent = "Logging in...";

    btnSpinner.classList.remove("d-none");

    // setTimeout(() => {

    //     loginBtn.disabled = false;

    //     togglePassword.disabled = false;

    //     btnText.textContent = "Login";

    //     btnSpinner.classList.add("d-none");

    //     alert("Frontend Validation Passed!");

    // }, 2000);

    $.ajax({

        url: "../ajax/login.php",

        type: "POST",

        data: {

            email: email.value.trim(),

            password: password.value.trim()

        },

        dataType: "json",

        success: function (response) {

            loginBtn.disabled = false;

            togglePassword.disabled = false;

            btnText.textContent = "Login";

            btnSpinner.classList.add("d-none");

            if (response.status) {

                window.location.href = "../dashboard/dashboard.php";
            } else {

                alert(response.message);

            }


        },

        error: function () {

            loginBtn.disabled = false;

            togglePassword.disabled = false;

            btnText.textContent = "Login";

            btnSpinner.classList.add("d-none");

            alert("Something went wrong. Please try again.");

        }

    });


});