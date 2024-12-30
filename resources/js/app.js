import Snippet from './parts/snippet';

class App {
    constructor() {
        document.querySelectorAll('.snippet').forEach(el => new Snippet(el));
    }
}

addEventListener('load', () => new App());
