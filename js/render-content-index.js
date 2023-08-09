window.addEventListener('DOMContentLoaded', () => {
    load();
})


async function load(){
    try{
        let request = await fetch('php/getData.php');
        let response = await request.json();

        
        console.log(response);
        
    }catch(error){
        console.log(error);
    }
}