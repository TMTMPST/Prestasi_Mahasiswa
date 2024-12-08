const showImageButton = document.getElementById('showImageButton');
const popup = document.getElementById('popupimg');
const popupImage = document.getElementById('popupImage');

showImageButton.addEventListener('click', () => {
    event.preventDefault(); 
    const imagePath = "../img/dummy/preview.jpeg";
    popupImage.src = imagePath;
    popup.style.display = "flex";
});

popup.addEventListener('click', (event) => {
    if (event.target === popup) {
        popup.style.display = "none";
    }
}); 