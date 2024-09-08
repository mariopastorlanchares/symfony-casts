<?php

/**
 * Returns the import map for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "preload" set to true for any modules that are loaded on the initial
 *     page load to help the browser download them earlier.
 *
 * The "importmap:require" command can be used to add new entries to this file.
 *
 * This file has been auto-generated by the importmap commands.
 */
return [
    'app' => [
        'path' => 'app.js',
        'preload' => true,
    ],
    'lodash' => [
        'downloaded_to' => 'vendor/lodash.js',
        'url' => 'https://cdn.jsdelivr.net/npm/lodash@4.17.21/+esm',
    ],
    '@hotwired/stimulus' => [
        'url' => 'https://cdn.jsdelivr.net/npm/@hotwired/stimulus@3.2.2/+esm',
    ],
    '@symfony/stimulus-bundle' => [
        'path' => '@symfony/stimulus-bundle/loader.js',
    ],
    '@hotwired/turbo' => [
        'url' => 'https://cdn.jsdelivr.net/npm/@hotwired/turbo@7.3.0/+esm',
    ],
];
