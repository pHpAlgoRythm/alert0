// Select necessary elements
let uploadProfileBtn = document.querySelector('.camera-btn');
let imgInput = document.querySelector('.img-input');
let preview = document.querySelector('.profile');

// Trigger the file input dialog
uploadProfileBtn.addEventListener('click', () => {
    imgInput.click();
});

// Handle file selection and display in the preview
imgInput.addEventListener('change', function () {
    const file = imgInput.files[0]; // Get the first selected file

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            const base64Image = e.target.result;

            // Update the profile background image with the new selected image
            preview.style.backgroundImage = `url('${base64Image}')`;
        };

        reader.onerror = function () {
            console.error('Failed to read file.');
        };

        reader.readAsDataURL(file); // Read the file as a Base64 URL
    } else {
        console.log('No file selected.');
    }
});
