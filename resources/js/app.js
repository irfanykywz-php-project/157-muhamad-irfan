// Default Laravel bootstrapper, installs axios
import './bootstrap';

// Added: Actual Bootstrap JavaScript dependency
import 'bootstrap';

// Added: Popper.js dependency for popover support in Bootstrap
import '@popperjs/core';

// Turbo hotwired
import * as Turbo from '@hotwired/turbo'

/* show loading bar when click or submit */
['turbo:click', 'turbo:submit-start'].forEach(function(e) {
    window.addEventListener(e, function(){
        Turbo.navigator.delegate.adapter.showProgressBar();
    });
});
