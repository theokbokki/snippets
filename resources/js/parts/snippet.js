export default class Snippet {
    constructor(el) {
        this.el = el;

        this.getElements();
        this.setEvents();
    }

    getElements() {
        this.button = this.el.querySelector(".button--copy");
        this.code = this.el.querySelector(".snippet__code");
    }

    setEvents() {
        this.el.addEventListener("click", async () => await this.copyCode());
    }

    async copyCode() {
        const copiedCode = this.code.cloneNode(true);
        const html = copiedCode.outerHTML.replace(/<[^>]*>?/gm, "");
        const parsedHTML = this.htmlDecode(html);

        await navigator.clipboard.writeText(parsedHTML);
    }

    htmlDecode(html) {
        const doc = new DOMParser().parseFromString(html, "text/html");

        return doc.documentElement.textContent;
    }
}
