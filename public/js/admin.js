// iframe modal
const modal = document.querySelector('.modal');
const closeModal = modal.querySelector('.fa-x');
const iframe = modal.querySelector('iframe');
const imgModal = document.querySelector('.imgModal')
const closeImgModal =imgModal.querySelector('.fa-x')

// Attach click event to all buttons with class "preview"
document.querySelectorAll('.preview').forEach(button => {
    button.addEventListener('click', () => {
        const latitude = button.getAttribute('data-lat');
        const longitude = button.getAttribute('data-lng');
        const iframeDisplay = window.getComputedStyle(modal).display;

        // Set iframe src dynamically with latitude and longitude
        if (latitude && longitude) {
            iframe.src = `https://www.google.com/maps?q=${latitude},${longitude}&hl=;z=14&output=embed`;
        } else {
            iframe.src = '';
        }

        // Toggle modal visibility
        const isVisible = iframeDisplay === 'none' || !modal.style.display === '';
        modal.style.display = isVisible ? 'flex' : 'none';
    });
});

// Close modal when the "X" icon is clicked
closeModal.addEventListener('click', () => {
    modal.style.display = 'none';
    
    iframe.src = ''; // Clear iframe src to stop loading content when hidden
});

// List toggle functionality
const toggleContainers = document.querySelectorAll('.toggle-container');

toggleContainers.forEach(toggle => {
    toggle.addEventListener('click', () => {
        document.querySelectorAll('.container').forEach(container => {
            container.classList.remove('active');
        });

        const target = toggle.getAttribute('data-target');
        const targetContainer = document.querySelector(target);

        if (targetContainer) {
            targetContainer.classList.add('active');
        }
    });
});



document.querySelectorAll('.previewImg').forEach(button => {
    button.addEventListener('click', ()=>{ 
        const imgdata = button.getAttribute('img-data')
        const img = imgModal.querySelector('.loader')

        img.style.backgroundImage = `url('../../../public/photos/reports/${imgdata}')`;
        console.log('Background Image Set:', img.style.backgroundImage);
        imgModal.style.display = 'flex'
    })
})

closeImgModal.addEventListener('click', ()=>{
    imgModal.style.display = 'none';
})