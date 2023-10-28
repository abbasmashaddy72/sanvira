import "../../css/frontend/app.scss";
import "./bootstrap";
import "./custom";

import {
    Alpine,
    Livewire,
} from "../../../vendor/livewire/livewire/dist/livewire.esm";

Alpine.plugin(focus);

Livewire.start();

import "./components/feather.js";
import "./components/plugins.init";

import { tns } from "tiny-slider";
window.tns = tns;

import $ from "jquery";
window.$ = $;

import lightbox from "lightbox2";
window.lightbox = lightbox;
