function showFileName(input, elementId) {
    const fileName = input.files[0] ? input.files[0].name : 'Belum ada file';
    document.getElementById(elementId).textContent = fileName;
}
