const racine = document.documentElement;
let bookImg1 = getComputedStyle(racine).getPropertyValue('--bookImgFront');
let bookImg2 = getComputedStyle(racine).getPropertyValue('--bookImgBack');

console.log(bookImg1);
console.log(bookImg2);


racine.style.setProperty('--bookImgFront', 'url("../divers/img/2.jpg")');
racine.style.setProperty('--bookImgBack', 'url("../divers/img/1.jpg")');


bookImg1 = getComputedStyle(racine).getPropertyValue('--bookImgFront');
bookImg2 = getComputedStyle(racine).getPropertyValue('--bookImgBack');

console.log(bookImg1);
console.log(bookImg2);

/*
function fuzzyTales() {

}*/


