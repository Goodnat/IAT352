$(document).ready(function () {


    let $btns = $('.product-area .button-group button');


    $btns.click(function (e) {

        $('.product-area .button-group button').removeClass('active');
        e.target.classList.add('active');

        let selector = $(e.target).attr('data-filter');
        $('.product-area .grid').isotope({
            filter: selector
        });

        return false;
    })

    $('.product-area .button-group #btn1').trigger('click');

    $('.product-area .grid .test-popup-link').magnificPopup({
        type: 'image',
        gallery: { enabled: true }
    });

});