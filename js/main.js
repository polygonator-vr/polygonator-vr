function toggleMenu() {
	var header = document.getElementById('header');
    var headerMenu = document.getElementById('header-menu');
    var mainPageHero = document.getElementById('main-page-hero');
    if (headerMenu.clientHeight == 0) {
        headerMenu.style.display = 'block';
        header.style.height = '40vh';
        mainPageHero.style.height = '60vh';
    } else {
        headerMenu.style.display = 'none';
        header.style.height = '10vh';
        mainPageHero.style.height = '90vh';
    }
}