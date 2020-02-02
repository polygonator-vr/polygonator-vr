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

    $(".clients-footer").slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: false,
        centerMode: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            }
        ]
    });

});
