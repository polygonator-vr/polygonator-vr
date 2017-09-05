function toggleMenu() {
    var x = document.getElementById('header-menu');
    if (x.clientHeight == 0) {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}