import "../../css/backend/app.css";

import focus from "@alpinejs/focus";
import { createPopper } from "@popperjs/core";
import * as FilePond from "filepond";
import flatpickr from "flatpickr";
import {
    Alpine,
    Livewire,
} from "../../../vendor/livewire/livewire/dist/livewire.esm";

window.flatpickr = flatpickr;
window.FilePond = FilePond;
window.createPopper = createPopper;

Alpine.plugin(focus);

Livewire.start();
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
import "../../../vendor/power-components/livewire-powergrid/dist/powergrid";
import "./components/mobile-menu";
import "./components/new-dark-mode-switcher";
import "./components/side-menu";
import "./components/side-menu-tooltip";

import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
window.ClassicEditor = ClassicEditor;

import lightbox from "lightbox2";
window.lightbox = lightbox;
