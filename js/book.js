const racine = document.documentElement;
const read = document.getElementById('readBook');
const book = document.getElementById('book');
const menuBook = document.getElementById('menuBook');
const header = document.querySelector('header');
const headerColorBefore = getComputedStyle(racine).getPropertyValue('--mainColor0L');
const headerColorAfter = getComputedStyle(racine).getPropertyValue('--mainColor0');
const slices = document.getElementsByClassName('sliceR');
const pageDroite = document.getElementById('pageDroite');
const pageGauche = document.getElementById('pageGauche');

const imagesLivre = [];
let tabImage = [];

let vitessePage = getComputedStyle(racine).getPropertyValue('--vitessePage');
let vPage = parseFloat(vitessePage.replace('s', '')) * 999;

let interval;
let iterationPage = 1;
let previousScroll = 0;

function fuzziessssssss() {
    read.checked = false;
    iterationPage = 1;
}

window.addEventListener('scroll', function() {
  let scrolling = window.pageYOffset;
  console.log(scrolling);

  if (scrolling === 0) {
        header.classList.remove('scrolled');
        header.style.background = "linear-gradient(to bottom, var(--mainColor0), var(--mainColor0L))";
        book.style.background = "linear-gradient(to bottom, #ffffff00, #ffffff00 125px, var(--mainColor0L) 125px, var(--sideColor1L) 100%)";
        menuBook.style.display = "block";
    } else if (scrolling > previousScroll) {
        header.style.height = '75px';
        header.classList.add('scrolled');
        header.style.background = headerColorAfter;
        book.style.background = "linear-gradient(to bottom, #ffffff00, #ffffff00 75px, var(--mainColor0L) 75px, var(--sideColor1L) 100%)";
        menuBook.style.display = "none";
    } else {
        header.style.height = '125px';
        header.classList.add('scrolled');
        header.style.background = headerColorAfter;
        book.style.background = "linear-gradient(to bottom, #ffffff00, #ffffff00 125px, var(--mainColor0L) 125px, var(--sideColor1L) 100%)";
        menuBook.style.display = "none";
}
  previousScroll = scrolling;
});

function PHPtoJS(tab, str) {
    let tabInfos = [];
    let tabTT = [];
    
    for (let i = 0; i < 16; i++) {
        tabTT.push(tab[i][0], tab[i][1], tab[i][2]);
        tabInfos.push(tabTT);
        tabTT = [];

        const image = new Image();
        image.src = tab[i][1];
        imagesLivre.push(image);
        tabImage = imagesLivre.map(image => image.src);
    }

    return eval(str + "(" + JSON.stringify(tabInfos) + ", "+ JSON.stringify(tabImage) +")");
}

function affichageImageLivre(tab2, tab) {
    console.log(tab2);
    setImage(0, tab[0]);
    setImage(1, tab[1]);
    setImage(2, tab[2]);
    setImage(3, tab[3]);
}

function setImage(pos, url) {
    let urlTemp = "url('"+url+"')";

    switch (pos) {
        case 0:
            racine.style.setProperty('--bookImgLeft', urlTemp);
            break;
        case 1:
            racine.style.setProperty('--bookImgFront', urlTemp);
            break;
        case 2:
            racine.style.setProperty('--bookImgBack', urlTemp);
            break;
        case 3:
            racine.style.setProperty('--bookImgRight', urlTemp);
            break;
    }
}

read.addEventListener("change", function() {
    if (this.checked) {
        interval = setInterval(function() {
            for (let i = 0; i < 4; i++) {
                setImage(i, tabImage[((2 * iterationPage) + i) % 16]);
                //console.log("iter"+i+" :");
                //console.log("Modulo :"+((2 * iterationPage) + i) % 16);
            }
            iterationPage++;
        }, vPage);
    } else {
        clearInterval(interval);
        iterationPage = 1;
    }
});

pageGauche.addEventListener('click', function() {
    imageAccueilClicked(1);
});

Array.from(slices).forEach(function(slice) {
  slice.addEventListener('click', function() {
    imageAccueilClicked(2);
  });
});

pageDroite.addEventListener('click', function() {
    imageAccueilClicked(3);
});




function imageAccueilClicked(url) {
    console.log(url);
    if (typeof url === 'number') {
        switch (url) {
            case 1:
                url = getComputedStyle(racine).getPropertyValue('--bookImgLeft');
                console.log('cas1');
                break;
            case 2:
                url = getComputedStyle(racine).getPropertyValue('--bookImgFront') + "&img2=" + getComputedStyle(racine).getPropertyValue('--bookImgBack');
                console.log('cas2');
                break;
            case 3: 
                url = getComputedStyle(racine).getPropertyValue('--bookImgRight');
                console.log('cas3');
                break;
        }
    }
    window.location.href = `bibliotheque.php?img1=${url}`;
}
