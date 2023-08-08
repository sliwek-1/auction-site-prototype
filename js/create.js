let submitBtn = document.querySelector('.submit');
let form = document.querySelector('.create-form');

submitBtn.addEventListener('click', async (e) => {
    e.preventDefault();
    try{
        let formData = new FormData(form);
        let request = await fetch('php/create.php',{
            method: 'post',
            body: formData
        })

        let response = await request.text();
        console.log(response)
    }catch(error){
        console.log(error);
    }
})  