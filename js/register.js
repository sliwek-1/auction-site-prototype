let form = document.querySelector('.register-form');
let btn = document.querySelector('.register-btn');
let errorElement = document.querySelector('.error');

btn.addEventListener('click', async (e) => {
    e.preventDefault();
    try{
        let formData = new FormData(form);
        let request = await fetch('php/register.php',{
            method: 'post',
            body: formData
        })
    
        let response = await request.text();
        errorElement.innerText = response;
        
        if(response == "Rejestracja się powiodła"){
            let inputs = document.querySelectorAll('.input');
            inputs.forEach(input => {
                input.value = "";
            })
            errorElement.classList.add("good-info");
        }else{
            errorElement.classList.add("bad-info");
        }

    }catch(error){
        console.log(error);
    }
})  