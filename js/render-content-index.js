window.addEventListener('DOMContentLoaded', () => {
    load();
})


async function load(){
    let main = document.querySelector('.product-section');
    try{
        let request = await fetch('php/getData.php');
        let response = await request.json();

        
        let data = Object.values(response);

        data.forEach((row, i) => {
            let text = `
                <div class="img-auction"> 
                    <img src="./php/${row.images[0].src}" alt="#" class="img-auction">
                </div>
                <div class="title-auction">${row.title}</div>
                <div class="cena">cena: ${row.cena} zł</div>
                <div class="time-info"></div>
                <button type="submit" class="btn-buy">Licytuj</button>`;

                let element = document.createElement('div');
                element.classList.add('auction-product');
                element.innerHTML = text;
                main.appendChild(element);

                let timeInfo = element.querySelector('.time-info');

                let calculateData = (startData, endData) =>{
                    let dt = new Date().getTime();
                    let dataStart = new Date(startData).getTime();
                    let dataEnd = new Date(endData).getTime();
                
                    if(dt <= dataStart){
                        let timeDiffrent = dataStart - dt;
                        let days = Math.floor(timeDiffrent / (1000 * 60 * 60 * 24));
                        let hours = Math.floor((timeDiffrent % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        let minutes = Math.floor((timeDiffrent % (1000 * 60 * 60)) / (1000 * 60));
                        let seconds = Math.floor((timeDiffrent % (1000 * 60)) / 1000);
                        timeInfo.innerHTML = "";
                        let text = '<p style="color:green;">Do rozpoczęcia pozostało - ' + (days < 10 ? "0" + days : days) + ":"+ (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds) + '</p>';
                        timeInfo.innerHTML = text;
                    }else if(dt >= dataStart && dt <= dataEnd){
                        let timeDiffrent = dataEnd - dt;
                        let days = Math.floor(timeDiffrent / (1000 * 60 * 60 * 24));
                        let hours = Math.floor((timeDiffrent % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        let minutes = Math.floor((timeDiffrent % (1000 * 60 * 60)) / (1000 * 60));
                        let seconds = Math.floor((timeDiffrent % (1000 * 60)) / 1000);
                
                        timeInfo.innerHTML = "";
                        let text = '<p style="color:red;">Do zakończenia pozostało - ' +  (days < 10 ? "0" + days : days) + ":"+ (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds) + '</p>';
                        timeInfo.innerHTML = text;
                    }else{
                        timeInfo.innerHTML = "";
                        let text = '<p>Licytacja się zakończyła</p>';
                        timeInfo.innerHTML = text;
                    }
                }

                setInterval(() => {
                    calculateData(row.data_start, row.data_end);
                },1000);
        })
    }catch(error){
        console.log(error);
    }
}
