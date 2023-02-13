const racine = document.documentElement;
const read = document.getElementById('readBook');
const book = document.getElementById('book');
const pageDroite = document.getElementById('pageDroite');
const pageGauche = document.getElementById('pageGauche');
const livre = document.getElementById('livre');
const pageMobile = document.getElementById('pageMobile');

const menuBook = document.getElementById('menuBook');
const header = document.querySelector('header');
const mts = document.getElementById('moreToSee');
const headerColorBefore = getComputedStyle(racine).getPropertyValue('--mainColor0L');
const headerColorAfter = getComputedStyle(racine).getPropertyValue('--mainColor0');
const slices = document.getElementsByClassName('sliceR');

class imgFuzzy {
    constructor(id, titre, url, date, description, id_user, tag, likes) {
        this.id = id;
        this.titre = titre;
        this.url = url;
        this.date = date;
        this.description = description;
        this.id_user = id_user;
        this.tag = tag;
        this.likes = likes;
    }
}

let tabAccueil = [];
let imagesLivre = [];
let objImgTemp;

let vitessePage = getComputedStyle(racine).getPropertyValue('--vitessePage');
let vPage = parseFloat(vitessePage.replace('s', '')) * 999;
let resteBook = vPage;

let interval;
let departBook;
let iterationPage = 1;
let repriseLivre = true;
let reprisePage = true;

let previousScroll = 0;

// RESETS //
function fuzziessssssss() {
    read.checked = false;
    iterationPage = 1;
}

// VISUELS //
window.addEventListener('scroll', function () {
    let scrolling = window.pageYOffset;
    //console.log(scrolling);

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

// RECUP DATAS (PHP) //
function PHPtoJS(tab, str) {

    console.log(tab);

    for (let i = 0; i < 16; i++) {
        //console.log(tab[i]);

        let image = new Image();
        image.src = tab[i]['url_image'];

        objImgTemp = new imgFuzzy(tab[i][0], tab[i][1], image.src, tab[i][3], tab[i][4], tab[i][5], tab[i][6], tab[i][7], tab[i][8]);
        tabAccueil.push(objImgTemp);
    }

    return eval(str + "(" + JSON.stringify(tabAccueil) + ")");
}

function affichageImageLivre(tabObj) {
    for (let i = 0; i < tabObj.length; i++) {
        setImage(i, tabObj[i]);
    }
    //console.log(tabObj);
}

function setImage(pos, obj) {
    let url = "url('" + obj['url'] + "')";
    let val = obj['id'];
    //console.log(pos + " " + val + " " + url);

    switch (pos) {
        case 0:
            racine.style.setProperty('--bookImgLeft', url);
            pageGauche.value = val;
            break;
        case 1:
            racine.style.setProperty('--bookImgFront', url);
            Array.from(slices).forEach(function (slice) {
                slice.value = val;
            });
            break;
        case 2:
            racine.style.setProperty('--bookImgBack', url);
            break;
        case 3:
            racine.style.setProperty('--bookImgRight', url);
            pageDroite.value = val;
            break;
    }
}

// ANIMATION //
function animBook() {
    interval = setInterval(function () {
        for (let i = 0; i < 4; i++) {
            setImage(i, tabAccueil[((2 * iterationPage) + i) % 16]);
            //console.log("iter" + i + " :");
            //console.log("Modulo :" + ((2 * iterationPage) + i) % 16);
            //console.log("image :" + tabImage[((2 * iterationPage) + i) % 16])
        }
        iterationPage++;
    }, vPage);
}

read.addEventListener("change", function () {
    if (this.checked) {
        animBook();
    } else {
        clearInterval(interval);
        iterationPage = 1;
    }
});

// CLIC IMAGES => MODAL ZOOM //
pageGauche.addEventListener('click', function () {
    imageClicked(this, tabAccueil);
});

slices[0].addEventListener('click', function () {
    imageClicked(this, tabAccueil);
});

pageDroite.addEventListener('click', function () {
    imageClicked(this, tabAccueil);
});

function imageClicked(e, tab) {
    //console.log(id);
    //console.log('clicked');
    //console.log(tab);
    //window.location.href = `bibliotheque.php?img1=${url}`;
    //window.location.href = `zoom.php?img1=${url}`;

    window.scrollTo(0, 0);
    header.style.height = '125px';
    header.classList.add('scrolled');
    header.style.background = headerColorAfter;
    book.style.background = "linear-gradient(to bottom, #ffffff00, #ffffff00 125px, var(--mainColor0L) 125px, var(--sideColor1L) 100%)";
    const imageZoom = document.getElementById('imageZoom');
    imageZoom.classList.add('active');
    mts.classList.add('active');
    document.body.style.overflowY = "hidden";

    const zoomBloc = document.getElementById('containerZoom');
    const zoomImage = zoomBloc.children[0].children[0];
    const zoomUserBloc = zoomBloc.children[1].children[1];
    const zoomImgBloc = zoomBloc.children[1].children[2];

    // console.log(zoomImage);
    // console.log(zoomUserBloc);
    // console.log(zoomImgBloc);

    let imageChoisie;
    for (let t of tab) {
        if (t['id'] === e.value) {
            imageChoisie = t;
            break;
        }
    }
    zoomImage.src = imageChoisie['url'];
    zoomImage.style.minHeight = "100%";

    zoomImgBloc.children[0].textContent = imageChoisie['titre'];
    zoomImgBloc.children[1].textContent = imageChoisie['description'];

    console.log(zoomBloc.children[1].children[3].children[1]);
    zoomBloc.children[1].children[3].children[1].textContent = imageChoisie['likes'];

    htmlReqUser(imageChoisie['id_user']);
    zoomUserBloc.children[1].textContent = ""

}

function closeImageZoom() {
    const imageZoom = document.getElementById('imageZoom');
    imageZoom.classList.remove('active');
    mts.classList.remove('active');
    document.body.style.overflowY = "visible";
}
// RECUP INFOS USER (image) //
function htmlReqUser(id) {
    let req = new XMLHttpRequest();

    req.open("POST", "../model/zoom_image.php", true);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function () {
        if (req.readyState === XMLHttpRequest.DONE) {
            if (req.status === 200) {
                let data = JSON.parse(req.responseText);
                console.log(data);
            } else {
                console.error(req.statusText);
            }
        }
    };
    req.send("id=" + id);
}
// RECUP INFOS PHP DEPUIS JS //
function htmlReqImage(obj) {
    let req = new XMLHttpRequest();
    let id = obj['id'];
    let titre = obj['titre'];
    let url = obj['url'];
    let date = obj['date'];
    let description = obj['description'];
    let id_user = obj['id_user'];
    let tag = obj['tag'];
    console.log(titre);

    req.open("POST", "../model/zoom_image.php", true);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function () {
        if (req.readyState === XMLHttpRequest.DONE) {
            if (req.status === 200) {
                console.log(req.responseText);
            } else {
                console.error(req.statusText);
            }
        }
    };
    req.send(
        "id=" + id +
        "&titre=" + titre +
        "&url=" + url +
        "&date=" + date +
        "&description=" + description +
        "&id_user=" + id_user +
        "&tag=" + tag
    );
}

/* TEST ANIMATION PAUSE.
function animBook(bool) {
    departBook = Date.now();
    if (bool) { 
        //f°départ
    } else {
        interval = setTimeout(function () {
            for (let i = 0; i < 4; i++) {
                setImage(i, tabAccueil[((2 * iterationPage) + i) % 16]);
            }
            iterationPage++;
    }, resteBook);
    console.log("PAUSED" + iterationPage);
}

function pauseBook() {
    if ((reprisePage || repriseLivre) && (read.checked)) {
        clearInterval(interval);
        resteBook = vPage - ((Date.now() - departBook) % vPage);
    }
}

function repriseBook() {
    if ((reprisePage && repriseLivre) && (read.checked)) {
        departBook = Date.now();
        animBook(false);
    }
}

livre.addEventListener("mouseenter", function () {
    repriseLivre = false;
    //console.log(repriseLivre);
    pauseBook();
});

livre.addEventListener("mouseleave", function () {
    repriseLivre = true;
    //console.log(repriseLivre);
    repriseBook();
});

pageMobile.addEventListener("mouseenter", function () {
    reprisePage = false;
    //console.log(reprisePage);
    pauseBook();
});

pageMobile.addEventListener("mouseleave", function () {
    reprisePage = true;
    //console.log(reprisePage);
    repriseBook();
});
*/
