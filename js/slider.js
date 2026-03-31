const options = {
    loop: true,
    delay: 3000,
    autoplay: {
        disableOnInteraction: false,
        waitForTransition: false,
    },
    effect: 'fade',
    fadeEfect: {
        crossFade: true,
    },
    speed: 1200,
}

const swiper = new Swiper('.swiper', options);