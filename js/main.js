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
   // $("a.js-open-gallery").fancybox();

    $("#contact").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'sendMail.php',
            data: $(this).serialize(),
            success: function() {
                alert('Thank you for your message!');
            }
        });
    });

});