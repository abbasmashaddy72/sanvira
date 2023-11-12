// CSS imports
import "../../css/backend/app.css";
import "./bootstrap";

// JavaScript libraries
import { createPopper } from "@popperjs/core";
import * as FilePond from "filepond";
import flatpickr from "flatpickr";

// Expose to global scope
window.flatpickr = flatpickr;
window.FilePond = FilePond;
window.createPopper = createPopper;

// 3rd Party Libraries
import "../../../vendor/power-components/livewire-powergrid/dist/powergrid";
import "../../../vendor/wire-elements/modal/resources/js/modal";

// Midone Built-in Components
import "@left4code/tw-starter/dist/js/dropdown";

// Components
import "./components/datepicker";
// import "./components/feather";
import "./components/mobile-menu";
import "./components/new-dark-mode-switcher";
import "./components/side-menu";
import "./components/side-menu-tooltip";

// Custom Components
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import lightbox from "lightbox2";
window.ClassicEditor = ClassicEditor;
window.lightbox = lightbox;
