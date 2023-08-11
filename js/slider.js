let images = document.querySelectorAll('.img-section');
let forwardBtn = document.querySelector('.forward-btn');
let backwardBtn = document.querySelector('.backward-btn');
let paginationImages = document.querySelectorAll('.img-pagination');
let counter = 0;

paginationImages.forEach(img => {
    img.addEventListener('click', (e) => {
        let id = e.target.parentElement.dataset.id;
        images.forEach((img,index) => {
            img.classList.remove('active');
            if(index == id){
                img.classList.add('active');
            }
        })
        counter = id;
    })
})

function updateImage(id = null) {
    images.forEach((img, index) => {
        if (index === counter) {
            img.classList.add('active');
        } else {
            img.classList.remove('active');
        }
    });
}

updateImage(); 

forwardBtn.addEventListener('click', () => {
    counter++;
    if (counter >= images.length) {
        counter = 0;
    }
    updateImage();
});

backwardBtn.addEventListener('click', () => {
    counter--;
    if (counter < 0) {
        counter = images.length - 1;
    }
    updateImage();
});