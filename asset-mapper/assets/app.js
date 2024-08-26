/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import Vinyl from "./lib/vinyl.js";
import _ from 'lodash'
const mix = new Vinyl('Awesome Mix', 2014)
console.log(_.camelCase(mix.describe()));

