function showPopupImg(imageSrc) {
    const popup = document.getElementById('imagePopup');
    const popupImage = document.getElementById('popupImage');
    popupImage.src = imageSrc;
    popup.style.display = 'block';
}

// Function to hide popup
function hidePopupImg() {
    const popup = document.getElementById('imagePopup');
    popup.style.display = 'none';
}