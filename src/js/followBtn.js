import ajaxRequest from './request.js';

function toggleFollow(followValue, target) {
    const args={
        follow: target,
        followValue: followValue
    };

    ajaxRequest('./utils/request-follow.php', function () {
        $("#profile-btn").val(followValue);
    }, args);
}

$("#profile-btn").click(function () {
    if ($(this).val() == "Edit profile") {
        location.href = 'edit-profile.php';
    } else if ($(this).val() == "Unfollow") {
        toggleFollow("Follow", $(this).attr('data-target'));
    } else if ($(this).val() == "Follow") {
        toggleFollow("Unfollow", $(this).attr('data-target'));
    }
});
