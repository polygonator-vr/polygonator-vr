function toggleMenu() {
	var header = document.getElementById('header');
    var headerMenu = document.getElementById('header-menu');
    var mainPageHero = document.getElementById('main-page-hero');
    if (headerMenu.clientHeight == 0) {
        headerMenu.style.display = 'block';
        header.style.height = 'auto';
    } else {
        headerMenu.style.display = 'none';
        header.style.height = '10vh';
        mainPageHero.style.height = '90vh';
    }
}

// vanilla JS
// init with element
var grid = document.querySelector('.services');
var msnry = new Masonry( grid, {
    // options...
    itemSelector: '.services__image-wrap',
    columnWidth: 310,
    gutter: 15,
    percentPosition: true
});

// // init with selector
// var msnry = new Masonry( '.services', {
//     // options...
// });