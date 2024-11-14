import lightGallery from "https://cdn.skypack.dev/lightgallery@2.0.0-beta.3";
import lgZoom from "https://cdn.skypack.dev/lightgallery@2.0.0-beta.3/plugins/zoom";
import lgShare from "https://cdn.skypack.dev/lightgallery@2.0.0-beta.3/plugins/share";
import lgHash from "https://cdn.skypack.dev/lightgallery@2.0.0-beta.3/plugins/hash";

$(() => {
    $("#navbarToggler").on("click", function (e) {
        let navigationMenu = $(this).attr("data-target");
        $(navigationMenu).toggleClass("hidden");
    });
});

const swiper_banner = new Swiper("#swiper_banner", {
    // direction: "horizontal",
    // slidesPerView: 1,
    centeredSlides: true,
    loop: true,
    spaceBetween: 20,
    effect: "fade",
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// const swiper_banner = new Swiper("#swiper_banner", {
//     direction: "horizontal",
//     slidesPerView: 1,
//     spaceBetween: 30,
//     loop: true,
//     pagination: {
//         el: ".swiper-pagination",
//         clickable: true,
//     },
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
// });
const swiper_promo = new Swiper("#swiper_promo", {
    direction: "horizontal",
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    // pagination: {
    //     el: ".swiper-pagination",
    //     clickable: true,
    // },
    breakpoints: {
        640: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
    },
});

let $swiper_product_lgSwiper = document.getElementById(
    "swiper_product_lg-swipper"
);
const swiper_product = new Swiper("#swiper_product", {
    direction: "horizontal",
    spaceBetween: 20,
    slidesPerView: "auto",
    reakpoints: {
        640: {
            slidesPerView: "auto",
            spaceBetween: 20,
        },
        768: {
            slidesPerView: "auto",
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 20,
            centeredSlides: true,
        },
    },
    // slidesOffsetBefore: 20,
    // slidesOffsetAfter: 20,
    // on: {
    //     init: function () {
    //         const lg = lightGallery($swiper_product_lgSwiper, {
    //             speed: 300,
    //             plugins: [lgZoom, lgShare, lgHash],
    //         });
    //         $swiper_product_lgSwiper.addEventListener("lgBeforeClose", () => {
    //             swiper_product.slideTo(lg.index, 0);
    //         });
    //     },
    // },
});

const swiper_maskapai = new Swiper("#swiper_maskapai", {
    direction: "horizontal",
    spaceBetween: 16,
    slidesPerView: 3,
    loop: true,
    autoplay: true,
    // slidesOffsetBefore: 20,
    // slidesOffsetAfter: 20,
    breakpoints: {
        640: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 5,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 6,
            spaceBetween: 20,
        },
    },
});

const swiper_partner = new Swiper("#swiper_partner", {
    direction: "horizontal",
    spaceBetween: 16,
    slidesPerView: 3,
    loop: true,
    autoplay: true,
    // slidesOffsetBefore: 20,
    // slidesOffsetAfter: 20,
    breakpoints: {
        640: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 5,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 6,
            spaceBetween: 20,
        },
    },
});

let $swiper_brochure_lgSwiper = document.getElementById(
    "swiper_brochure_lg-swipper"
);
const swiper_brochure = new Swiper("#swiper_brochure", {
    direction: "horizontal",
    spaceBetween: 16,
    slidesPerView: 2,
    loop: true,
    autoplay: true,
    grabCursor: true,
    // slidesOffsetBefore: 20,
    // slidesOffsetAfter: 20,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
    },
    on: {
        init: function () {
            const lg = lightGallery($swiper_brochure_lgSwiper, {
                speed: 300,
                plugins: [lgZoom, lgShare, lgHash],
            });
            $swiper_brochure_lgSwiper.addEventListener("lgBeforeClose", () => {
                swiper_brochure.slideTo(lg.index, 0);
            });
        },
    },
});

const swiper_testimonial = new Swiper("#swiper_testimonial", {
    direction: "horizontal",
    spaceBetween: 16,
    slidesPerView: 1,
    loop: false,
    autoplay: false,
    // slidesOffsetBefore: 20,
    // slidesOffsetAfter: 20,
    breakpoints: {
        640: {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: false,
            autoplay: false,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: false,
            autoplay: false,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: false,
            autoplay: false,
        },
    },
});

const swiper_blog = new Swiper("#swiper_blog", {
    direction: "horizontal",
    spaceBetween: 16,
    slidesPerView: 1,
    loop: true,
    autoplay: true,
    // slidesOffsetBefore: 20,
    // slidesOffsetAfter: 20,
    breakpoints: {
        640: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
    },
});

let $swiper_gallery_lgSwiper = document.getElementById(
    "swiper_gallery_lg-swipper"
);
const swiper_gallery = new Swiper("#swiper_gallery", {
    direction: "horizontal",
    spaceBetween: 16,
    slidesPerView: 2,
    loop: true,
    autoplay: true,
    grabCursor: true,
    // slidesOffsetBefore: 20,
    // slidesOffsetAfter: 20,
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
    },
    on: {
        init: function () {
            const lg = lightGallery($swiper_gallery_lgSwiper, {
                speed: 300,
                plugins: [lgZoom, lgShare, lgHash],
            });
            $swiper_gallery_lgSwiper.addEventListener("lgBeforeClose", () => {
                swiper_gallery.slideTo(lg.index, 0);
            });
        },
    },
});

const players = Array.from(document.querySelectorAll(".player")).map(
    (p) => new Plyr(p)
);
const plyrs = Array.from(document.querySelectorAll(".js-plyr")).map(
    (plyrs) => new Plyr(plyrs)
);

//const player = new Plyr(document.getElementById("player"));
// document.addEventListener("DOMContentLoaded", () => {
//     const controls = ["mute"];
//     const player = Plyr.setup(".video", { controls, muted: true });
// });

// $carousel = $('#galleryCarousel')
// let flickityPrevButton = $('#galleryCarousel .flickity-prev-next-button.previous')
// let flickityNextButton = $('#galleryCarousel .flickity-prev-next-button.next')
// let rightButton = $('#carouselRightButton')
// let leftButton = $('#carouselLeftButton')
// let flktyPrevNextButtons = $(window).width() > 991 ? true : true

// $carousel.flickity({
//   cellAlign: 'center',
//   contain: true,
//   pageDots: false,
//   imagesLoaded: true,
//   groupCells: false,
//   prevNextButtons: false
// })

// if ($(window).width() > 991) {
//   $('#galleryCarousel .flickity-viewport').css({
//     overflow: 'visible'
//   })
// }

// $carousel.on('change.flickity', function (event, index) {
//   let len = $('#galleryCarousel .flickity-slider').children().length
//   // console.log(len, index)

//   if (index === len - 1) {
//     leftButton.addClass('hidden')
//   }

//   if (index > 0) {
//     rightButton.removeClass('hidden')
//   } else {
//     rightButton.addClass('hidden')
//     leftButton.removeClass('hidden')
//   }
// });

// leftButton.on('click', function (e) {
//   $carousel.flickity('next')
// })

// rightButton.on('click', function (e) {
//   $carousel.flickity('previous')
// })

// Is Box Hidden?
var prevScrollpos = window.pageYOffset;
var isBoxHidden = false;
var boxTimeout;
var qos = document.querySelector("#waWidget");
// Window On Scroll
window.addEventListener(
    "scroll",
    function (e) {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            // Show
            $(qos).fadeIn("slow");
            isBoxHidden = false; // Box is not hidden
        } else {
            // Hide
            $(qos).fadeOut("slow");
            if (!isBoxHidden) isBoxHidden = true; // Box is hidden
        }
        prevScrollpos = currentScrollPos;

        if (isBoxHidden) {
            clearTimeout(boxTimeout); // Clear Timeout
            boxTimeout = setTimeout(function () {
                // Show Music Box Back
                $(qos).fadeIn("slow");
            }, 5000);
        } else {
            clearTimeout(boxTimeout); // Clear Timeout
        }
    },
    false
);
