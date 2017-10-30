function toggleMenu() {
	var header = document.getElementById('header');
    var headerMenu = document.getElementById('header-menu');
    var mainPageHero = document.getElementById('main-page-hero');
    if (headerMenu.clientHeight == 0) {
        headerMenu.style.display = 'block';
        header.style.height = 'auto';
    } else {
        headerMenu.style.display = 'none';
        header.style.height = '60px';
        mainPageHero.style.height = 'calc(100vh - 60px)';
    }
}

$(document).ready(function() {
      $("#selector-mobile").on("change", function() {
        window.location = $(this).val();
    });

    
    $('#contact').on('submit', function(e) {
        $('#contact *').fadeOut(2000);
        $('#submitted_message').prepend('Your submission has been processed...');
    });

});