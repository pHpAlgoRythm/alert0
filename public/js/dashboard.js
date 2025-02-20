// Side-bar Variables
const options = document.getElementById("side-bar");
const items = document.getElementById("hamburger-items");

// Request pop-op Modal and Vehicle variables  
const modal = document.querySelector(".modal");
const carType = document.getElementById('Vehicle-type');
const reqAmbulance = document.getElementById("ambulance");
const reqFireTruck = document.getElementById('fireTruck');
const reqBoat = document.getElementById('rescueBoat');
const reqRescueTruck = document.getElementById('rescueTruck');

// Camera stream variables and camera modal
const webcam = document.getElementById('webcam');
const capture = document.querySelector('.capture');
const inputimg = document.querySelector('.capture-btn');
const cameraModal = document.querySelector('.camera-modal');
const capturedImage = document.getElementById('Captured-Image');
const imageDataInput = document.getElementById('image-data');





//access to media device (video)
let stream;
const constraints = { video: true };
// Toggle Side-bar visibility
  options.addEventListener("click", () => {
  const currentDisplay = window.getComputedStyle(items).display;
  const isVisible = currentDisplay === "none";
  items.style.display = isVisible ? "block" : "none";
  items.classList.toggle("animate", isVisible);
  options.classList.toggle("colors", isVisible);
});
//Function For vehicle type
function dataInfo(car) {
  if (window.getComputedStyle(modal).display === "none") {
    modal.style.display = "flex";
    document.body.style.overflow = "hidden";
    
    carType.textContent = car;
    document.querySelector('.vehicle').value = car;

    
  }
}
//Function caller and params  for vehicle type
reqAmbulance.addEventListener('click', () => dataInfo('AMBULANCE'));
reqFireTruck.addEventListener('click', () => dataInfo('FIRETRUCK'));
reqBoat.addEventListener('click', () => dataInfo('RESCUE BOAT'));
reqRescueTruck.addEventListener('click', () => dataInfo('RESCUE TRUCK'));

//async function for accessing the camera and starting the stream/camera record
async function startStream() {
  try {
    stream = await navigator.mediaDevices.getUserMedia(constraints);
    cameraModal.style.display = 'flex';
    webcam.srcObject = stream;
    webcam.play();
  } catch (error) {
    console.log(error);
  }
}
//function caller that will trigger the stream
inputimg.addEventListener('click', startStream);

// captured image will print here 
  capture.addEventListener('click', () => {
  const canvas = document.querySelector('.canvas');
  const cxt = canvas.getContext('2d');
  cxt.drawImage(webcam, 0, 0, canvas.width, canvas.height);
  cameraModal.style.display = 'none';
  const imageData = canvas.toDataURL('image/png');

  capturedImage.src = imageData;

  capturedImage.style.display = 'block';
  
  imageDataInput.value = imageData;
    
  if(capturedImage.src){
    const track = stream.getTracks();
      track.forEach(track =>track.stop())
  }

});

//discard function will erase everything including src,vehicle type and the hidden input
async function discardReport() {
  try {
    if(stream) {
      const track = await stream.getTracks();
      track.forEach(track => track.stop());
      cameraModal.style.display = 'none'
      modal.style.display = 'none'
      capturedImage.src = '';
      imageDataInput.value = '';
      document.body.style.overflow = 'scroll'
    }else if(!stream){
      modal.style.display = 'none'
      imageDataInput.value = 'none'
       document.body.style.overflow = 'scroll'
    } else{
      alert('failed to discard Report please try again')
    }
  } catch (error) {
    console.log(error);
  }
}

//function caller for the discard function
const discard = document.getElementById('discard');
discard.addEventListener('click', discardReport);

//Confirm/submit button
const confirmBtn = document.getElementById('confirm')
const formSubmit = document.getElementById('formSubmit')
confirmBtn.addEventListener('click', () => {
  if(!imageDataInput.value){
    alert('Invalid Report! Please ensure that you have captured a photo ')
  }

  formSubmit.click()
})

// set date and time

let dateANDtime = document.querySelector('#lastname');
let now = new Date();

dateANDtime.textContent = now.toUTCString();



//  kwa location

function getLocation(){
  if(navigator.geolocation){
      navigator.geolocation.getCurrentPosition(showPosition);
  }
}
function showPosition(position){
  document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
  document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
  
}

function showErro(){
  switch(error.code){
      case error.PERMISSION_DENIED:
          alert("You Must Allow Location Sharing for Us to track your location");
          location.reload();
          break;
  }
}


document.querySelector('.account-settings').addEventListener('click', ()=>{
  window.location.href = '../../../routes/viewRoutes.php?action=viewProfile';
})