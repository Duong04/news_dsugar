document.addEventListener('DOMContentLoaded', function () {
    new Splide('#card-carousel', {
        perPage: 6,
        rewind : true,
        perMove: 1,
        pagination: false,
        breakpoints: {
            992: {
                perPage: 5,
            },
            768: {
                perPage: 4,
            },
            576: {
                perPage: 3,
            },
            400: {
                perPage: 2,
            }
        },
    }).mount();
});