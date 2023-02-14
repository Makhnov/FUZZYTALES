//VARIABLES ET GENERALITES //

// Récupération des éléments HTML nécessaires
const racine = document.documentElement;  // La racine du document HTML
const read = document.getElementById('readBook');  // Bouton "Lire le livre"
const book = document.getElementById('book');  // La partie principale du livre
const pageDroite = document.getElementById('pageDroite');  // Page de droite du livre
const pageGauche = document.getElementById('pageGauche');  // Page de gauche du livre
const livre = document.getElementById('livre');  // L'image du livre
const pageMobile = document.getElementById('pageMobile');  // Page mobile du livre

const menuBook = document.getElementById('menuBook');  // Menu de navigation du livre
const header = document.querySelector('header');  // L'en-tête de la page
const mts = document.getElementById('moreToSee');  // Éléments "plus à voir"
const headerColorBefore = getComputedStyle(racine).getPropertyValue('--mainColor0L');  // Couleur de l'en-tête avant la transition
const headerColorAfter = getComputedStyle(racine).getPropertyValue('--mainColor0');  // Couleur de l'en-tête après la transition
const slices = document.getElementsByClassName('sliceR');  // Les éléments "slices" (tranches) du livre

// Classe pour stocker les données des images floues
class imgFuzzy {
    constructor(id, titre, url, date, description, id_user, tag, likes) {
        this.id = id;  // L'ID de l'image
        this.titre = titre;  // Le titre de l'image
        this.url = url;  // L'URL de l'image
        this.date = date;  // La date de l'image
        this.description = description;  // La description de l'image
        this.id_user = id_user;  // L'ID de l'utilisateur qui a posté l'image
        this.tag = tag;  // Le tag associé à l'image
        this.likes = likes;  // Le nombre de likes de l'image
    }
}

// Variables
let tabAccueil = [];  // Tableau pour stocker les images floues de la page d'accueil
let imagesLivre = [];  // Tableau pour stocker les images floues du livre
let objImgTemp;  // Objet temporaire pour stocker les données d'une image floue
let dataUser;  // Données de l'utilisateur

let vitessePage = getComputedStyle(racine).getPropertyValue('--vitessePage');  // Vitesse de transition de la page
let vPage = parseFloat(vitessePage.replace('s', '')) * 999;  // Durée maximale d'une transition de page
let resteBook = vPage;  // Durée restante pour la transition de la page

let interval;  // Intervalle pour animer la transition de la page
let departBook;  // Heure de départ de la transition de la page
let iterationPage = 1;  // Numéro de la page en cours
let repriseLivre = true;  // Indicateur de reprise de la lecture du livre
let reprisePage = true;  // Indicateur de reprise de la transition de la page

let previousScroll = 0;  // Position de défilement précédente


// RESETS //
// Fonction qui remet certains éléments à leur état initial
function fuzziessssssss() {
    read.checked = false;
    iterationPage = 1;
}

// VISUELS //
// On ajoute un événement de scroll sur la fenêtre
window.addEventListener('scroll', function () {
    let scrolling = window.pageYOffset;
    if (scrolling === 0) { // Si on est en haut de la page
        header.style.height = '125px'; // Agrandit le header
        header.classList.remove('scrolled'); // Supprime la classe "scrolled"
        header.style.background = headerColorBefore; // Modifie la couleur de fond du header
        book.style.background = "var(--mainColor0L)"; // Modifie la couleur de fond du livre
        menuBook.style.display = "block"; // Affiche le menu
    } else if (scrolling > previousScroll) { // Si on descend dans la page
        header.style.height = '75px'; // Réduit la hauteur du header
        header.classList.add('scrolled'); // Ajoute la classe "scrolled"
        header.style.background = headerColorAfter; // Modifie la couleur de fond du header
        book.style.background = "linear-gradient(to bottom, #ffffff00, #ffffff00 75px, var(--mainColor0L) 75px, var(--sideColor1L) 100%)"; // Applique un dégradé sur la couleur de fond du livre
        menuBook.style.display = "none"; // Masque le menu
    } else { // Si on remonte dans la page
        header.style.height = '75px'; // Réduit la hauteur du header
        header.classList.add('scrolled'); // Ajoute la classe "scrolled"
        header.style.background = headerColorAfter; // Modifie la couleur de fond du header
        book.style.background = "var(--mainColor0L)"; // Modifie la couleur de fond du livre
        menuBook.style.display = "block"; // Affiche le menu
    }

    previousScroll = scrolling; // Met à jour la position de scroll précédente
});

// Récupération des données depuis PHP vers JavaScript
function PHPtoJS(tab, str) {
    // Boucle sur le tableau pour extraire les données de chaque image
    for (let i = 0; i < 16; i++) {

        // Création d'un objet Image pour charger l'image depuis l'URL
        let image = new Image();
        image.src = tab[i]['url_image'];

        // Création d'un objet imgFuzzy à partir des données extraites
        objImgTemp = new imgFuzzy(
            tab[i][0], tab[i][1], image.src,
            tab[i][3], tab[i][4], tab[i][5],
            tab[i][6], tab[i][7], tab[i][8]);

        // Ajout de l'objet créé dans le tableau "tabAccueil"
        tabAccueil.push(objImgTemp);
    }

    // Appel de la fonction passée en paramètre, avec le tableau créé en JSON
    return eval(str + "(" + JSON.stringify(tabAccueil) + ")");
}

// Affichage des images du livre à partir des données récupérées
function affichageImageLivre(tabObj) {
    // Boucle sur le tableau pour afficher chaque image dans la page
    for (let i = 0; i < tabObj.length; i++) {
        setImage(i, tabObj[i]);
    }
}

// Affichage d'une image du livre à une position donnée
function setImage(pos, obj) {
    // Construction de l'URL de l'image
    let url = "url('" + obj['url'] + "')";
    let val = obj['id'];

    // Mise à jour de l'image et de la page correspondantes en fonction de la position
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

// Fonction d'animation du livre
function animBook() {

    // Intervalle d'exécution de la fonction
    interval = setInterval(function () {

        // Boucle sur les 4 images de chaque page
        for (let i = 0; i < 4; i++) {

            // Positionne les images selon l'ordre du tableau tabAccueil
            setImage(i, tabAccueil[((2 * iterationPage) + i) % 16]);
        }

        // Incrémente l'itérateur de page
        iterationPage++;

    }, vPage);
}

// Activation de l'animation lors du clic sur l'interrupteur de lecture
read.addEventListener("change", function () {

    if (this.checked) {
        animBook();
    } else {

        // Arrêt de l'animation et réinitialisation de l'itérateur de page
        clearInterval(interval);
        iterationPage = 1;
    }
});

// Ajout d'un écouteur d'événement sur les boutons de pages du livre
pageGauche.addEventListener('click', function () {
    imageClicked(this, tabAccueil);
});

slices[0].addEventListener('click', function () {
    imageClicked(this, tabAccueil);
});

pageDroite.addEventListener('click', function () {
    imageClicked(this, tabAccueil);
});

// Fonction exécutée lors du clic sur une image
function imageClicked(e, tab) {

    // Remonte en haut de la page et met en forme la barre de navigation
    window.scrollTo(0, 0);
    header.style.height = '125px';
    header.classList.add('scrolled');
    header.style.background = headerColorAfter;
    book.style.background = "linear-gradient(to bottom, #ffffff00, #ffffff00 125px, var(--mainColor0L) 125px, var(--sideColor1L) 100%)";

    // Affichage de l'image en grand
    const imageZoom = document.getElementById('imageZoom');
    imageZoom.classList.add('active');
    mts.classList.add('active');
    document.body.style.overflowY = "hidden";

    // Récupération des éléments du bloc d'affichage de l'image en grand
    const zoomBloc = document.getElementById('containerZoom');
    const zoomImage = zoomBloc.children[0];
    const zoomUserBloc = zoomBloc.children[1].children[1];
    const zoomImgBloc = zoomBloc.children[1].children[2];

    // Recherche de l'image cliquée dans le tableau tabAccueil
    let imageChoisie;
    for (let t of tab) {
        if (t['id'] === e.value) {
            imageChoisie = t;
            break;
        }
    }

    // Affichage de l'image choisie en grand
    racine.style.setProperty('--zoomImage', "url('" + imageChoisie['url'] + "')");

    // Affichage du titre et du résumé de l'image choisie
    zoomImgBloc.children[0].innerHTML = "Titre de l'image : <span style=color:var(--mainColor1);>" + imageChoisie['titre'] + "</span>";
    zoomImgBloc.children[1].innerHTML = "Résumé : <br><span style=color:var(--mainColor1);>" + imageChoisie['description'] + "</span>";

    // Affichage du nombre de likes de l'image choisie
    zoomBloc.children[1].children[3].children[1].textContent = imageChoisie['likes'];

    htmlReqUser(imageChoisie['id_user']).then(dataUser => {
        console.log(dataUser[0]);
        racine.style.setProperty('--zoomImageUser', "url('" + dataUser[0]['avatar_utilisateur'] + "')");
        zoomUserBloc.children[1].textContent = dataUser[0]['pseudo_utilisateur'];
    }).catch(error => {
        console.error(error);
    });
}

