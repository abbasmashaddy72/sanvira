// Alpine.js component
Alpine.data("themeToggle", () => ({
    darkTheme:
        localStorage.getItem("color-theme") === "dark" ||
        (!("color-theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches),
    lightTheme:
        localStorage.getItem("color-theme") === "light" ||
        (!("color-theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: light)").matches),

    toggleTheme() {
        this.darkTheme = !this.darkTheme;
        this.lightTheme = !this.lightTheme;

        // Handle theme changes and store preferences in local storage
        if (this.darkTheme) {
            document.documentElement.classList.add("dark");
            localStorage.setItem("color-theme", "dark");
        } else {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("color-theme", "light");
        }
    },
}));
