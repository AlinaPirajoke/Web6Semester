$(document).ready(function () {
    $('[data-toggle="popover"]').popover();

    $('#popover').mouseenter(function () {
        console.log("Мышка здесь");
        var _this = this;
        $(this).popover('show');
        // setTimeout(function () {
        //     if (!$(_this).is(':hover')) {
        //         $(_this).popover('hide');
        //     }
        // }, 3000);
    });

    $('[data-toggle="popover"]').on('mouseleave', function () {
        console.log("Мышка там");
        var _this = this;
        setTimeout(function () {
            if (!$('.popover:hover').length) {
                $(_this).popover('hide');
            }
        }, 1000);
    });

    var modal = $("#myModal");
    var btn = $("#myBtn");
    var span = $(".close");
    btn.click(function () {
        modal.show();
    });
    span.click(function () {
        modal.hide();
    });
    $(window).click(function (event) {
        if (event.target == modal[0]) {
            modal.hide();
        }
    });
    $(".modal-button").click(function () {
        modal.hide();
    });
});