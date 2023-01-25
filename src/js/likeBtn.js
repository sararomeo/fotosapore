import ajaxRequest from './request.js';

function toggleLike(likeValue, target) {
    const args={
        like: target,
        likeValue: likeValue
    };

    ajaxRequest('./db/follow-request.php', function () {
        $("#profile-btn").val(followValue);
    }, args);
}

$("#like-btn").click(function () {
    console.log($(this).attr('value'));
    if ($(this).attr('value') == "like") {
        //toggleFollow("unlike", $(this).attr('data-target'));

    } else {
        //toggleFollow("like", $(this).attr('data-target'));
        
    }
    this.classList.toggle("bi-heart");
    this.classList.toggle("bi-heart-fill");
    this.classList.toggle("text-danger")
});
