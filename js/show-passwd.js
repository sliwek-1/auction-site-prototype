let showPasswdCheckBox = document.querySelector('.show-passwd');
let passwdInput = document.querySelectorAll('.passwd-input');

showPasswdCheckBox.addEventListener('change', () => {
    if(showPasswdCheckBox.checked == true){
        passwdInput.forEach(input => {
            input.type = "text";
        })
    }else{
        passwdInput.forEach(input => {
            input.type = "password";
        })
    }
})