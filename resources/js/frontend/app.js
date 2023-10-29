import "../../css/frontend/app.scss";
import "./bootstrap";
import "./custom";

// JavaScript libraries
import focus from "@alpinejs/focus";
import $ from "jquery";
import lightbox from "lightbox2";
import { tns } from "tiny-slider";
import {
    Alpine,
    Livewire,
} from "../../../vendor/livewire/livewire/dist/livewire.esm";

// Expose to global scope
window.tns = tns;
window.$ = $;
window.lightbox = lightbox;

// Alpine.js setup
Alpine.plugin(focus);
Livewire.start();

// Components and plugins initialization
import "../../../vendor/wire-elements/modal/resources/js/modal";
import "./components/feather";
import "./components/plugins.init";
