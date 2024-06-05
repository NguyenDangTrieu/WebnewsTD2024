$(document).ready(function(){
    var navbar = $('.navbar');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 50) {
            navbar.addClass('fixed-top');
        } else {
            navbar.removeClass('fixed-top');
        }
    });
});

    // Lắng nghe sự kiện nhấp chuột vào các liên kết trong menu
    document.addEventListener("DOMContentLoaded", function() {
        var navLinks = document.querySelectorAll(".navbar-nav .nav-link");
        navLinks.forEach(function(navLink) {
            navLink.addEventListener("click", function(event) {
                // Ngăn chặn hành vi mặc định của liên kết
                event.preventDefault();

                // Lấy href của liên kết
                var href = this.getAttribute("href");

                // Chuyển hướng đến trang được chỉ định
                window.location.href = href;
            });
        });
    });