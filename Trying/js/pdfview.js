function showPopupPDF(pdfUrl) {
    var popup = document.getElementById('pdfPopup');
    var pdfViewer = document.getElementById('pdfViewer');
    
    pdfViewer.src = pdfUrl;
    popup.style.display = 'block';
    
    // Prevent scrolling on the main page when popup is open
    document.body.style.overflow = 'hidden';
}

function hidePopupPDF() {
    var popup = document.getElementById('pdfPopup');
    var pdfViewer = document.getElementById('pdfViewer');
    
    popup.style.display = 'none';
    pdfViewer.src = '';
    
    // Re-enable scrolling on the main page
    document.body.style.overflow = 'auto';
}

// Close popup when clicking outside the PDF viewer
window.onclick = function(event) {
    var popup = document.getElementById('pdfPopup');
    if (event.target == popup) {
        hidePopupPDF();
    }
}