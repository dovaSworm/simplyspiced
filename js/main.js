$(() => {
    $(window).on('scroll', () => {
        stickyNavbar();
    });
    var isMobile;
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        isMobile = true;
    }
    // if (isMobile) {
    //     $("nav").addClass("sticky");
    // }
    // if (!isMobile) {
    //     $(window).on('scroll', () => {
    //         stickyNavbar();
    //     });
    // }
    $('.navbar-nav>a').on('click', function(){
        $('.navbar-collapse').collapse('hide');
    });
    var navbar = document.getElementById("navbar");
    function stickyNavbar() {
        var sticky = navbar.offsetTop;
        if (document.title == "Simply Spiced") {
            if (window.pageYOffset >= sticky + 70) {
                navbar.classList.add("sticky-top");
                navbar.classList.remove("sticky-bottom");
                var poz = navbar.offsetTop;
            } else {
                navbar.classList.remove("sticky-top");
                navbar.classList.add("sticky-bottom");
            }
        }else {
            navbar.classList.add("sticky-top");
            navbar.classList.remove("sticky-bottom");
        }
    }

    function setActiveLink() {
        $(".navbar-nav a").click(function () {
            $('.navbar-nav a').not(this).removeClass('active');
            $(this).toggleClass('active');
        });
    }
    setActiveLink();
    if (document.title == "Simply Spiced") {
        $('.navbar-nav a[href="index.html"]').toggleClass('active');
    } else if (document.title == "Proizvodi") {
        $('.navbar-nav a[href="proizvodi.html"]').toggleClass('active');
    } else if (document.title == "Recepti"){
        $('.navbar-nav a[href="recepti.html"]').toggleClass('active');
    }
});