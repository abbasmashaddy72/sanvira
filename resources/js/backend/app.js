import "../../css/backend/app.css";

import focus from "@alpinejs/focus";
import { createPopper } from "@popperjs/core";
import Alpine from "alpinejs";
import * as FilePond from "filepond";
import flatpickr from "flatpickr";

window.flatpickr = flatpickr;
window.FilePond = FilePond;
window.createPopper = createPopper;

window.Alpine = Alpine;
Alpine.start();
Alpine.plugin(focus);

/*
 |--------------------------------------------------------------------------
 | Midone Built-in Components
 |--------------------------------------------------------------------------
 |
 | Import Midone built-in components.
 |
 */
import "@left4code/tw-starter/dist/js/dropdown";
import "./bootstrap";

/*
 |--------------------------------------------------------------------------
 | 3rd Party Libraries
 |--------------------------------------------------------------------------
 |
 | Import 3rd party library JS files.
 |
 */
import "./components/datepicker";
import "./components/feather";

/*
 |--------------------------------------------------------------------------
 | Custom Components
 |--------------------------------------------------------------------------
 |
 | Import JS custom components.
 |
 */
import "./components/mobile-menu";
import "./components/new-dark-mode-switcher";
import "./components/side-menu";
import "./components/side-menu-tooltip";

import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
window.ClassicEditor = ClassicEditor;

import lightbox from "lightbox2";
window.lightbox = lightbox;
