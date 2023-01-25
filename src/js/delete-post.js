import ajaxRequest from './request.js';

$("#delete-post-btn").click(function () {
    const args={
        postID: $(this).attr('data-target')
    };
    
    ajaxRequest('./db/delete-post-request.php', function () {
        $("#delete-post-btn").val("Delete post");
    }, args);
    
    location.href = 'profile.php';
});
