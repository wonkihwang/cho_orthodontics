$(document).ready(function () {
    window.onscroll = function () {
        myFunction();
        scrollFunction();
    };

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }

    $('.dropdown-menu a.dropdownToggle').on('click', function (e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
            $('.dropdown-submenu .show').removeClass("show");
        });

        return false;
    });

    $('#appointment_phone').on('input', function () {
        var number = $(this).val().replace(/[^\d]/g, '')
        if (number.length == 7) {
            number = number.replace(/(\d{3})(\d{4})/, "$1-$2");
        } else if (number.length == 10) {
            number = number.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3");
        }
        $(this).val(number)
    });

    $(".phone_num").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && String.fromCharCode(e.which) != '-' && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

    $('.btn-tiffany').on('click', function () {
        history.back();
        return false;
    })

    var mybutton = document.getElementById("topBtn");

    function scrollFunction() {
        if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    $('#topBtn').click(function () {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    })
});