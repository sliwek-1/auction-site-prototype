let form = document.querySelector('.login-form');
let btn = document.querySelector('.register-btn');
let errorElement = document.querySelector('.error');

btn.addEventListener('click', async (e) => {
    e.preventDefault();
    try{
        let formData = new FormData(form);
        let request = await fetch('php/login.php',{
            method: 'post',
            body: formData
        })
        
        let response = await request.text();
        errorElement.innerText = response;
        console.log(response)
        if(response == "Logowanie powiodło się"){
            let inputs = document.querySelectorAll('.input');
            inputs.forEach(input => {
                input.value = "";
            })
            errorElement.classList.add("good-info");

            setTimeout(() => {
                location.href = "index.php";
            },1000);

        }else{
            errorElement.classList.add("bad-info");
        }

    }catch(error){
        console.log(error);
    }
})  