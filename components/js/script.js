const carouselImages = document.querySelector('.carousel-images');
const images = document.querySelectorAll('.carousel img');

let currentIndex = 0;

function showImage(index) {
    const imageWidth = images[0].clientWidth;
    carouselImages.style.transform = `translateX(${-index * imageWidth}px)`;
}

function nextImage() {
    currentIndex = (currentIndex === images.length - 1) ? 0 : currentIndex + 1;
    showImage(currentIndex);
}

// Auto-slide every 3 seconds
setInterval(nextImage, 3000);

// Adjust carousel on page load
window.addEventListener('load', () => {
    showImage(currentIndex);
});

document.getElementById('userIcon')?.addEventListener('click', function(event) {
    event.stopPropagation();
    const menu = document.getElementById('dropdownMenu');
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
});

document.addEventListener('click', function() {
    const menu = document.getElementById('dropdownMenu');
    if(menu) menu.style.display = 'none';
});



