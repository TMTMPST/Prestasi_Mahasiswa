const form = document.getElementById('myForm');
const popup = document.getElementById('popup');

form.addEventListener('submit', function (event) {
    event.preventDefault(); 
    popup.style.display = 'flex'; 

    setTimeout(() => {
        window.location.href = 'Dashboard.html'; 
    }, 2000);
}); 