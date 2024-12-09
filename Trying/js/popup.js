// const form = document.getElementById('myForm');
// const popup = document.getElementById('popup');

// form.addEventListener('submit', function (event) {
//     event.preventDefault(); 
//     popup.style.display = 'flex'; 

//     setTimeout(() => {
//         window.location.href = 'Dashboard.php'; 
//     }, 2000);
// });

window.onload = function() {
    // Memeriksa query string di URL
    const urlParams = new URLSearchParams(window.location.search);
    const submitStatus = urlParams.get('submit');

    if (submitStatus === 'success') {
        showPopup(); // Tampilkan popup jika submit berhasil
    }
};

// Fungsi untuk menampilkan popup
function showPopup() {
    const popup = document.getElementById('popup');
    popup.style.display = 'flex';

    setTimeout(() => {
        window.location.href = 'Dashboard.php';  // Arahkan ke halaman dashboard setelah 2 detik
    }, 2000);
}
