import ajaxRequest from './request.js';

/**
 * Function that changes the like button.
 * @param {*} el 
 * @param {*} postID 
 */
function toggleLike(el, postID) {
    var operation;
    if (el.value == "like") {
        operation = 1;
    } else {
        operation = 0;
    }

    const args = {
        postID: postID,
        op: operation
    };

    ajaxRequest('./db/like-request.php', function () {
        if (el.value == "like") {
            el.value = "nolike";
        } else {
            el.value = "like";
        }
        el.classList.toggle("bi-heart");
        el.classList.toggle("bi-heart-fill");
        el.classList.toggle("text-danger");
    }, args);
}

export default toggleLike;
