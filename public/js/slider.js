document.addEventListener('DOMContentLoaded', function () {
    new Splide('#card-carousel', {
        perPage: 6,
        rewind : true,
        perMove: 1,
        pagination: false,
        breakpoints: {
            640: {
                perPage: 1,
            },
        },
    }).mount();
});