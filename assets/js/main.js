;(function ($) {
    $(document).ready(function () {
        var App = {};

        App.init = function () {

            var $grid = $('.grid').isotope({
                itemSelector: '.harvest',
                percentPosition: true,
                layoutMode: 'fitRows',
                masonry: {
                    columnWidth: '.grid-sizer'
                },
                filter: '*'
            });


        };

        App.init();

    });

})(jQuery);
