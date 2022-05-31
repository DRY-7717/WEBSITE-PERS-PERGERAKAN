function previewImage() {
    const imagePreview = document.querySelector('.img-preview');
    const image = document.querySelector('#customFile');
    const ofReader = new FileReader();

    imagePreview.classList.replace('d-none', 'd-block')

    ofReader.readAsDataURL(image.files[0]);
    ofReader.onload = function (ofREvent) {
        imagePreview.src = ofREvent.target.result;
    }
}
