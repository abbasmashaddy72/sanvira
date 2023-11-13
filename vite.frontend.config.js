import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";

export default defineConfig({
    build: {
        outDir: "public/build/frontend",
    },
    plugins: [
        laravel({
            input: ["resources/js/frontend/app.js"],
            refresh: true,
        }),
        {
            name: "blade",
            handleHotUpdate({ file, server }) {
                if (file.endsWith(".blade.php")) {
                    server.ws.send({
                        type: "full-reload",
                        path: "*",
                    });
                }
            },
        },
    ],
    css: {
        postcss: {
            plugins: [
                require("postcss-import"),
                require("postcss-advanced-variables"),
                require("@tailwindcss/nesting"),
                require("tailwindcss")({
                    config: "./tailwind.frontend.config.js",
                }),
                require("autoprefixer"),
            ],
        },
    },
});
