


let fnameRegExp = new RegExp('^[a-z ]{3,15}$');
let emailRegExp = new RegExp('^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.com$');
let pwdRegExp = new RegExp('^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$');

function validation(input, regExp) {
    let testchamp = regExp.test(input.value);
    let small = input.nextElementSibling;
    if (testchamp) {
        small.innerHTML = 'valid';
        small.style.color = '#96C291';
        input.style.border = '2px solid #96C291';
    }
    else {
        small.innerHTML = 'invalid ';
        small.style.color = '#D83F31';
        input.style.border = '2px solid #D83F31';
    }
}

window.addEventListener("DOMContentLoaded", (event) => {

    const form = document.getElementById("form");
    form.addEventListener("input", function () {

        form.lname.addEventListener('input', function () {
            validation(this, fnameRegExp);
        });
        form.fname.addEventListener('input', function () {
            validation(this, fnameRegExp);
        });
        form.email.addEventListener('input', function () {
            validation(this, emailRegExp);
        });
        form.pwd.addEventListener('input', function () {
            validation(this, pwdRegExp);
        });
    });
});
