/* Template Name: Techwind - Multipurpose Tailwind CSS Landing Page Template
   Author: Shreethemes
   Email: support@shreethemes.in
   Website: https://shreethemes.in
   Version: 1.4.0
   Created: May 2022
   File Description: Common JS file of the template(plugins.init.js)
*/

/*********************************/
/*         INDEX                 */
/*================================
 *     01.  Tiny Slider          *
 *     02.  Swiper slider        *
 *     03.  Countdown Js         * (For Comingsoon pages)
 *     04.  Maintenance js       * (For Maintenance page)
 *     05.  Data Counter         *
 *     06.  Datepicker js        *
 *     07.  Gallery filter js    * (For Portfolio pages)
 *     08.  Tobii lightbox       * (For Portfolio pages)
 *     09.  CK Editor            * (For Compose mail)
 *     10.  Fade Animation       *
 *     11.  Typed Text animation (animation) *
 *     12.  Validation Form      *
 *     13.  Switcher Pricing Plan*
 *     14.  Cookies Policy       *
 *     15.  Back Button          *
 *     16.  Particles            *
 *     17.  Components           *
 *          1. Navtabs           *
 *          2. Modal             *
 *          3. Carousel          *
 *          4. Accordions        *
 ================================*/

//=========================================//
/*            01) Tiny slider              */
//=========================================//

if (document.getElementsByClassName("tiny-three-item").length > 0) {
    var slider = tns({
        container: ".tiny-three-item",
        controls: false,
        mouseDrag: true,
        loop: true,
        rewind: true,
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 3000,
        navPosition: "bottom",
        speed: 400,
        gutter: 12,
        responsive: {
            992: {
                items: 3,
            },

            767: {
                items: 2,
            },

            320: {
                items: 1,
            },
        },
    });
}

//=========================================//
/*            02) Swiper slider            */
//=========================================//
try {
    var menu = [];
    var interleaveOffset = 0.5;
    var swiperOptions = {
        loop: true,
        speed: 1000,
        parallax: true,
        autoplay: {
            delay: 6500,
            disableOnInteraction: false,
        },
        watchSlidesProgress: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            renderBullet: function (index, className) {
                return (
                    '<span class="' +
                    className +
                    '">' +
                    0 +
                    (index + 1) +
                    "</span>"
                );
            },
        },

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        on: {
            progress: function () {
                var swiper = this;
                for (var i = 0; i < swiper.slides.length; i++) {
                    var slideProgress = swiper.slides[i].progress;
                    var innerOffset = swiper.width * interleaveOffset;
                    var innerTranslate = slideProgress * innerOffset;
                    swiper.slides[i].querySelector(
                        ".slide-inner"
                    ).style.transform =
                        "translate3d(" + innerTranslate + "px, 0, 0)";
                }
            },

            touchStart: function () {
                var swiper = this;
                for (var i = 0; i < swiper.slides.length; i++) {
                    swiper.slides[i].style.transition = "";
                }
            },

            setTransition: function (speed) {
                var swiper = this;
                for (var i = 0; i < swiper.slides.length; i++) {
                    swiper.slides[i].style.transition = speed + "ms";
                    swiper.slides[i].querySelector(
                        ".slide-inner"
                    ).style.transition = speed + "ms";
                }
            },
        },
    };

    // DATA BACKGROUND IMAGE
    var swiper = new Swiper(".swiper-container", swiperOptions);

    let data = document.querySelectorAll(".slide-bg-image");
    data.forEach((e) => {
        e.style.backgroundImage = `url(${e.getAttribute("data-background")})`;
    });
} catch (err) {}

//=========================================//
/*/*            10) Fade Animation         */
//=========================================//

try {
    AOS.init({
        easing: "ease-in-out-sine",
        duration: 1000,
    });
} catch (err) {}

//=========================================//
/*/*            15) Back Button            */
//=========================================//
document
    .getElementsByClassName("back-button")[0]
    ?.addEventListener("click", (e) => {
        if (document.referrer !== "") {
            e.preventDefault();
            window.location.href = document.referrer;
        }
    });
