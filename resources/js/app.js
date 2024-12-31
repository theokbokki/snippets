import Snippet from './parts/snippet';
import.meta.glob([
    '../img/**',
    '../icons/**',
    '../favicons/**.svg',
    '../favicons/**.png',
    '../favicons/**.ico',
    '../favicons/**.webmanifest',
]);

class App {
    constructor() {
        document.querySelectorAll('.snippet').forEach(el => new Snippet(el));
    }
}

addEventListener('load', () => new App());
