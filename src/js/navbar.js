/**
 * Set the margin-top of the main content area to be the same as the height of the navbar.
 */
function setSize() {
    var navHeight = $("#navbar-container").outerHeight(true);
    $('#main').attr('style', 'margin-top:'+navHeight+'px !important');
}

/**
 * Set size when the page is ready.
 */
$(window).ready (function () {
    setSize();
});

/**
 * Resize when the window is resized.
 */
$(window).resize (function () {
    setSize();
});