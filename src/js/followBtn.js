import ajaxRequest from './request.js';

function toggleFollow(followValue, target, num) {
    const args={
        follow: target,
        followValue: followValue
    };

    ajaxRequest('./db/follow-request.php', function () {
        $("#profile-btn").val(followValue);
        $('.change-followers-count').html(parseInt($('.change-followers-count').html(), 10)+parseInt(num));
    }, args);
}

$("#profile-btn").click(function () {
    if ($(this).val() == "Edit profile") {
        location.href = 'edit-profile.php';
    } else if ($(this).val() == "Unfollow") {
        toggleFollow("Follow", $(this).attr('data-target'), -1);
    } else if ($(this).val() == "Follow") {
        toggleFollow("Unfollow", $(this).attr('data-target'), 1);
    }
});
