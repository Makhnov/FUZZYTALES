const racine = document.documentElement;
const read = document.getElementById('readBook');
const imagesLivre = [];
let tabImage = [];
let bookImg1 = getComputedStyle(racine).getPropertyValue('--bookImgFront');
let bookImg2 = getComputedStyle(racine).getPropertyValue('--bookImgBack');
let vitessePage = getComputedStyle(racine).getPropertyValue('--vitessePage');
let vPage = parseFloat(vitessePage.replace('s', '')) * 999;

let interval;

let iterationPage = 1;

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
};

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
                console.log("iter"+i+" :");
                console.log("Modulo :"+((2 * iterationPage) + i) % 16);
            }
            iterationPage++;
        }, vPage);
    } else {
        clearInterval(interval);
        iterationPage = 1;
    }
});

function fuzziessssssss() {
    read.checked = false;
    iterationPage = 1;
}