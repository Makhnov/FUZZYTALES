

// const slider = document.getElementsByClassName('tags');
// let mouseDown = false;
// let startX, scrollLeft;
// console.log(slider);



// let startDragging = function (e) {
//   let sliderE = e.target.parentNode;
//   mouseDown = true;
//   startX = e.pageX - sliderE.offsetLeft;
//   scrollLeft = sliderE.scrollLeft;
// };

// let stopDragging = function (event) {
//   mouseDown = false;
//   console.log('stopDrag')
// };


// for (let i = 0; i < slider.length; i++) {
//   slider[i].addEventListener('mousedown', startDragging, false);
//   slider[i].addEventListener('mouseup', stopDragging, false);
//   slider[i].addEventListener('mouseleave', stopDragging, false);
//   console.log(i);
// }

// for (let i = 0; i < slider.length; i++) {
//   slider[i].addEventListener('mousemove', (e) => {
//     e.preventDefault();
//     if(!mouseDown) { return; }
//     const x = e.pageX - slider[i].offsetLeft;
//     const scroll = x - startX;
//     slider[i].scrollLeft = scrollLeft - scroll;
//   });
// }






// const scrollContainer = document.querySelector(".tags");
// scrollContainer.addEventListener("wheel", (evt) => {
//     evt.preventDefault();
//     scrollContainer.scrollLeft += evt.deltaY;
// });



/* scroll card tags horizontally */
document.querySelectorAll('.tags').forEach(item => {
  item.addEventListener('wheel', event => {
    event.preventDefault();
    item.scrollLeft += event.deltaY;
  })
});

/* add landscape/portrait classes to images */

window.onload = function imageSize(){
  let img = document.getElementsByTagName('img');
  console.log(img);
  for (let i = 0; i < img.length; i++) {
    if (img[i].naturalWidth > img[i].naturalHeight){
      console.log("landscape");
      img[i].classList = "landscape";
      console.log(img[i]);
    } else if (img[i].naturalWidth < img[i].naturalHeight){
        console.log("portrait");
        img[i].classList = "portrait";
    } else {
        return
    }
  }
}





/*
███    ███  ██████  ██████   █████  ██      
████  ████ ██    ██ ██   ██ ██   ██ ██      
██ ████ ██ ██    ██ ██   ██ ███████ ██      
██  ██  ██ ██    ██ ██   ██ ██   ██ ██      
██      ██  ██████  ██████  ██   ██ ███████ 
 */

let openModalButtons = document.querySelectorAll('[data-modal-target]')
let closeModalButtons = document.querySelectorAll('[data-close-button]')
let overlay = document.getElementById('overlay')

overlay.addEventListener('click', () => {
    let modals = document.querySelectorAll('.modal.active')
    modals.forEach(modal => {
      closeModal(modal);
    })
})
openModalButtons.forEach(button => {
    button.addEventListener('click',() => {
        let modal = document.querySelector(button.dataset.modalTarget)
        openModal(modal)
    })
})

closeModalButtons.forEach(button => {
    button.addEventListener('click',() => {
        let modal = button.closest('.modal')
        closeModal(modal)
    })
})

function openModal(modal){
    if(modal == null) return
    modal.classList.add('active')
    overlay.classList.add('active')
}

function closeModal(modal){
    if(modal == null) return
    modal.classList.remove('active')
    overlay.classList.remove('active')
}
