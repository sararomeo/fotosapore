import ajaxRequest from './request.js';

async function asyncLikeMail(postID) {
    const args={
        postID: postID,
    };
    await sendMail(args);
}

function sendMail(args) {
    return new Promise(resolve => {
        ajaxRequest('./db/like-mail-request.php', function () {}, args);
    });
}
  

export default asyncLikeMail;
