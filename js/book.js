const h1 = document.getElementsByTagName('h1')[0];
const menuBook = document.getElementById('menuBook');

function fuzzyTales() {
    h1.style.zIndex = 10;
    h1.classList.add('loaded');
    menuBook.classList.add('loaded');
}