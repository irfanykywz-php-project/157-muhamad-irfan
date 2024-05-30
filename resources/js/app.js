// Default Laravel bootstrapper, installs axios
// import './bootstrap';

// Added: Actual Bootstrap JavaScript dependency
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

// Added: Popper.js dependency for popover support in Bootstrap
import '@popperjs/core';

// jquery
import jQuery from "jquery";
window.$ = jQuery;
window.jQuery = jQuery;

// Turbo hotwired
import * as Turbo from '@hotwired/turbo'

/* show loading bar when click or submit */
['turbo:click', 'turbo:submit-start'].forEach(function(e) {
    window.addEventListener(e, function(){
        Turbo.navigator.delegate.adapter.showProgressBar();
    });
});

/* disable form input & button when submitted */
document.addEventListener("turbo:submit-start", ({ target }) => {
    Turbo.navigator.delegate.adapter.showProgressBar();
    for (const field of target.elements) {
        field.disabled = true
    }
});

document.addEventListener("turbo:render", function() {
    var statusCode = Turbo.navigator.currentVisit.response.statusCode;

    /* reload if page is 404 (prevent glithc bug in turbo) */
    if (statusCode == 404) {
        window.location.href = window.location.href;
    }
});
