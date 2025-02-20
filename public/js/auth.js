
let regAcc = document.querySelector('#reg-redirect');

if(regAcc){

    regAcc.addEventListener('click', ()=>{
       
        // set ang action as regAcc sa route
        
        window.location.href='../../../routes/viewRoutes.php?action=regAcc';
      
    })
}