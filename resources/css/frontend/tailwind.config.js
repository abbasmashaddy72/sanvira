const colors = require("tailwindcss/colors");
const plugin = require("tailwindcss/plugin");

/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: "jit",
    presets: [require("../../../vendor/wireui/wireui/tailwind.config.js")],
    content: [
        "./app/Http/Livewire/Frontend/**/*.php",
        "./resources/views/components/frontend/**/*.blade.php",
        "./resources/views/auth/**/*.blade.php",
        "./resources/views/layouts/guest.blade.php",
        "./resources/views/layouts/fePartials/**/*.blade.php",
        "./resources/views/layouts/fePartials/**/*.blade.php",
        "./resources/views/livewire/frontend/**/*.blade.php",
        "./resources/views/pages/frontend/**/*.blade.php",
        "./resources/views/vendor/wireui/**/*.blade.php",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/wire-elements/modal/resources/views/*.blade.php",
        "./vendor/wireui/wireui/resources/**/*.blade.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/View/**/*.php",
    ],
    darkMode: "class",
    important: true,
    theme: {
        screens: {
            xs: "540px",
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
            "2xl": "1536px",
        },
        fontFamily: {
            nunito: ['"Nunito", sans-serif'],
        },
        container: {
            center: true,
        },
        extend: {
            colors: {
                dark: "#3c4858",
                black: "#161c2d",
                "dark-footer": "#192132",
            },
            boxShadow: {
                sm: "0 2px 4px 0 rgb(60 72 88 / 0.15)",
                DEFAULT: "0 0 3px rgb(60 72 88 / 0.15)",
                md: "0 5px 13px rgb(60 72 88 / 0.20)",
                lg: "0 10px 25px -3px rgb(60 72 88 / 0.15)",
                xl: "0 20px 25px -5px rgb(60 72 88 / 0.1), 0 8px 10px -6px rgb(60 72 88 / 0.1)",
                "2xl": "0 25px 50px -12px rgb(60 72 88 / 0.25)",
                inner: "inset 0 2px 4px 0 rgb(60 72 88 / 0.05)",
                testi: "2px 2px 2px -1px rgb(60 72 88 / 0.15)",
            },
            spacing: {
                0.75: "0.1875rem",
                3.25: "0.8125rem",
            },

            maxWidth: ({ theme, breakpoints }) => ({
                1200: "71.25rem",
                992: "60rem",
                768: "45rem",
            }),

            zIndex: {
                1: "1",
                2: "2",
                3: "3",
                999: "999",
            },
        },
    },
};
