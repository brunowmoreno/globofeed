$(function() {

    var FEEDS_TOTAL = $('.items').find('.item').length;
    var FEED_CURRENT = 1;

    $('.items').find('.item').eq(0).addClass('active');

    $('.arrow').on('click', function() {
        var dir = $(this).data('dir');
        var currentitem = $('.items').find('.item').eq(FEED_CURRENT - 1);

        FEED_CURRENT = FEED_CURRENT + dir;

        if (FEED_CURRENT < 1) {
            FEED_CURRENT = FEEDS_TOTAL;
        }

        if (FEED_CURRENT > FEEDS_TOTAL) {
            FEED_CURRENT = 1;
        }

        var newitem = $('.items').find('.item').eq(FEED_CURRENT - 1);
        console.log(FEED_CURRENT);

        // exibe o novo item
        currentitem.removeClass('active');
        newitem.addClass('active');
    });

});
