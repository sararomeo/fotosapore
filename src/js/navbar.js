/**
 * Set the margin-top of the main content area to be the same as the height of the navbar.
 */
function setMainMarginTop() {
    var navHeight = $("#navbar-container").outerHeight(true);
    $('#main').attr('style', 'margin-top:' + navHeight + 'px !important');
}

/**
 * Set size when the page is ready.
 */
$(window).ready(function () {
    setMainMarginTop();
});

/**
 * Resize when the window is resized.
 */
$(window).resize(function () {
    setMainMarginTop();
});

/**
 * Switch class to animate search bar.
 */
$("#search-btn").on("click", function () {
    $(".search-input").toggleClass("inclicked");
    $("#search-btn").toggleClass("close");
});

/**
 * Remove the d-flex justify-content-end classes from the navbar when the screen is less than 768px at load.
 */
$(window).load(function () {
    if ($(window).width() < 768) {
        $("#navbarScroll").removeClass("justify-content-end");
    } else {
        $("#navbarScroll").addClass("justify-content-end");
    }
});

/**
 * Remove the d-flex justify-content-end classes from the navbar when the screen is less than 768px at resize.
 */
$(window).resize(function () {
    if ($(window).width() < 768) {
        $("#navbarScroll").removeClass("justify-content-end");
    } else {
        $("#navbarScroll").addClass("justify-content-end");
    }
});

/**
 * Set active page in navbar.
 */
$(window).load(function () {
    var current_page = $("#page-name").data("page");
    // Remove the "active" class from ALL the links first
    $("#nav-link").removeClass("active");

    // Add the "active" class to the link that matches the current page
    switch (current_page) {
        case "home-page":
            $("#home-nav-link").addClass("active");
            break;
        case "discovery-page":
            $("#discovery-nav-link").addClass("active");
            break;
        case "create-post-page":
            $("#create-post-nav-link").addClass("active");
            break;
        case "notification-page":
            $("#notification-nav-link").addClass("active");
            break;
        case "search-page":
            $("#discovery-nav-link").addClass("active");
            break;
        default:
            console.log("No existing page name found.");
    }

    if (current_page == "profile-page") {
        if ($("#profile-btn").val() == "Edit profile") {
            $("#profile-nav-link").addClass("active");;
        } else {
            $("#profile-nav-link").removeClass("active");
        }
    }
});

/**
 * Go back to previous page.
 */
$("#go-back-btn").on("click", function () {
    history.back();
});