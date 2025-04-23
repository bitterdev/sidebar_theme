(function($) {
    $(function() {
        const $toggle = $(".navbar-toggle");
        const $page = $(".ccm-page");

        function closeNavbar() {
            $toggle.removeClass("active");
            $page.removeClass("navbar-visible");
        }

        $toggle.on("click", function() {
            $toggle.toggleClass("active");
            $page.toggleClass("navbar-visible");
        });

        $page.find(".content-section").on("click", function() {
            if ($page.hasClass("navbar-visible")) {
                closeNavbar();
            }
        });

        $('body').on("keydown", function(e) {
            if ($page.hasClass("navbar-visible")) {
                closeNavbar();
            }
        });
    });
})(jQuery);
