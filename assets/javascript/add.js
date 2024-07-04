function previewImage() {
    const fileInput = document.getElementById('foto');
    const imagePreview = document.getElementById('imagePreview');


    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}