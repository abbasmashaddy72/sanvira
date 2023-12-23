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

if (document.getElementsByClassName("tiny-single-item").length > 0) {
    var slider = tns({
        container: ".tiny-single-item",
        items: 1,
        controls: false,
        mouseDrag: true,
        loop: true,
        rewind: true,
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 3000,
        navPosition: "bottom",
        speed: 400,
        gutter: 16,
    });
}


if (document.getElementsByClassName('tiny-two-item').length > 0) {
    var slider = tns({
        container: '.tiny-two-item',
        controls: true,
        mouseDrag: true,
        loop: true,
        rewind: true,
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 3000,
        navPosition: "bottom",
        controlsText: ['<i class="ri-arrow-drop-left-line "></i>', '<i class="ri-arrow-drop-right-line"></i>'],
        nav: false,
        speed: 400,
        gutter: 0,
        responsive: {
            768: {
                items: 2
            },
        },
    });
};

if (document.getElementsByClassName("tiny-single-item-products").length > 0) {
    var slider = tns({
        container: ".tiny-single-item-products",
        items: 1,
        controls: false,
        mouseDrag: true,
        loop: true,
        rewind: true,
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 3000,
        navPosition: "bottom",
        speed: 400,
        fixedWidth: 400,
        center: true,
    });
}

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
} catch (err) { }

//=========================================//
/*/*            10) Fade Animation         */
//=========================================//

try {
    AOS.init({
        easing: "ease-in-out-sine",
        duration: 1000,
    });
} catch (err) { }

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


//********4) Accordions********/
try {
    const Default = {
        alwaysOpen: false,
        activeClasses: 'bg-gray-50 dark:bg-slate-800 text-indigo-600',
        inactiveClasses: 'text-dark dark:text-white',
        onOpen: () => { },
        onClose: () => { },
        onToggle: () => { }
    }

    class Accordion {
        constructor(items = [], options = {}) {
            this._items = items
            this._options = { ...Default, ...options }
            this._init()
        }

        _init() {
            if (this._items.length) {
                // show accordion item based on click
                this._items.map(item => {

                    if (item.active) {
                        this.open(item.id)
                    }

                    item.triggerEl.addEventListener('click', () => {
                        this.toggle(item.id)
                    })
                })
            }
        }

        getItem(id) {
            return this._items.filter(item => item.id === id)[0]
        }

        open(id) {
            const item = this.getItem(id)

            // don't hide other accordions if always open
            if (!this._options.alwaysOpen) {
                this._items.map(i => {
                    if (i !== item) {
                        i.triggerEl.classList.remove(...this._options.activeClasses.split(" "))
                        i.triggerEl.classList.add(...this._options.inactiveClasses.split(" "))
                        i.targetEl.classList.add('hidden')
                        i.triggerEl.setAttribute('aria-expanded', false)
                        i.active = false

                        // rotate icon if set
                        if (i.iconEl) {
                            i.iconEl.classList.remove('rotate-180')
                        }
                    }
                })
            }

            // show active item
            item.triggerEl.classList.add(...this._options.activeClasses.split(" "))
            item.triggerEl.classList.remove(...this._options.inactiveClasses.split(" "))
            item.triggerEl.setAttribute('aria-expanded', true)
            item.targetEl.classList.remove('hidden')
            item.active = true

            // rotate icon if set
            if (item.iconEl) {
                item.iconEl.classList.add('rotate-180')
            }

            // callback function
            this._options.onOpen(this, item)
        }

        toggle(id) {
            const item = this.getItem(id)

            if (item.active) {
                this.close(id)
            } else {
                this.open(id)
            }

            // callback function
            this._options.onToggle(this, item)
        }

        close(id) {
            const item = this.getItem(id)

            item.triggerEl.classList.remove(...this._options.activeClasses.split(" "))
            item.triggerEl.classList.add(...this._options.inactiveClasses.split(" "))
            item.targetEl.classList.add('hidden')
            item.triggerEl.setAttribute('aria-expanded', false)
            item.active = false

            // rotate icon if set
            if (item.iconEl) {
                item.iconEl.classList.remove('rotate-180')
            }

            // callback function
            this._options.onClose(this, item)
        }

    }

    window.Accordion = Accordion;

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[data-accordion]').forEach(accordionEl => {

            const alwaysOpen = accordionEl.getAttribute('data-accordion')
            const activeClasses = accordionEl.getAttribute('data-active-classes')
            const inactiveClasses = accordionEl.getAttribute('data-inactive-classes')

            const items = []
            accordionEl.querySelectorAll('[data-accordion-target]').forEach(el => {
                const item = {
                    id: el.getAttribute('data-accordion-target'),
                    triggerEl: el,
                    targetEl: document.querySelector(el.getAttribute('data-accordion-target')),
                    iconEl: el.querySelector('[data-accordion-icon]'),
                    active: el.getAttribute('aria-expanded') === 'true' ? true : false
                }
                items.push(item)
            })

            new Accordion(items, {
                alwaysOpen: alwaysOpen === 'open' ? true : false,
                activeClasses: activeClasses ? activeClasses : Default.activeClasses,
                inactiveClasses: inactiveClasses ? inactiveClasses : Default.inactiveClasses
            })
        })
    })
} catch (error) {

}
