let images = document.querySelectorAll('.img-section');
let forwardBtn = document.querySelector('.forward-btn');
let backwardBtn = document.querySelector('.backward-btn');
let counter = 0;

function updateImage() {
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