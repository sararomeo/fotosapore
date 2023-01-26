import toggleLike from './likeBtn.js';

// Variables
const container = document.getElementById('scroll-container');
const pageName = location.href.substring(location.href.lastIndexOf('/')+1);
var getPostIndex = 0;
var addDataIndex = 0;

/**
 * Event listener for the scrolling, if the user reach the end of the page.
 * If the user reach the end of the page, the event listener loads another post.
 */
window.addEventListener('scroll', () => {
    const { scrollTop, scrollHeight, clientHeight } = document.documentElement;
	
	if(clientHeight + scrollTop >= scrollHeight - 5) {
        getPost();
	}
});

/**
 * Load the next post in the index.
 */
function getPost() {
    let args = {"value":getPostIndex, 
                "pageName":pageName,
                "profileID":document.getElementById("profile-btn")?.getAttribute("data-target"),
                "searchTag":document.getElementById("search-tag")?.getAttribute("data-target")};
    let jsonArgs = JSON.stringify(args);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            addDataToFeed(JSON.parse(this.response));
        }
    };
    xmlhttp.open("POST", "db/feed-request.php", true);
    xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xmlhttp.send("args=" + jsonArgs);
    getPostIndex = getPostIndex + 1;
}

/**
 * Add the post in the feed.
 * @param {*} response The JSON to be loaded in the feed.
 */
function addDataToFeed(response) {
    if(response.postNum <= addDataIndex || response.postArray == null) return;
    const postElement = document.createElement('div');
    postElement.classList.add('user-post');

    const div = Object.assign(document.createElement("div"),{className:"scroll-post my-3 p-2 shadow border border-secondary"});

        const e1 = Object.assign(document.createElement("h2"),{className:"username-post nav-item my-2 fs-4"});
            const hr1 =  Object.assign(document.createElement("a"),{className:"user-link nav-link", innerText:response.postArray.username});
            hr1.href = "profile.php?profileID=" + response.postArray.userID;
            e1.appendChild(hr1);

        const e2 = Object.assign(document.createElement("img"),{className:"image-post rounded"});
            e2.src = "upload/" + response.postArray.imagePath.toString();
            e2.alt = "recipe: " + response.postArray.title;
            
        const e3 = Object.assign(document.createElement("p"),{className:"bottom-bar-post"});
            const b1 = Object.assign(document.createElement("button"),{className:"like-btn btn post-icon bi bi-heart fa-fw fa-2x"});
                b1.type = "button";
                b1.value = "nolike";
                if(response.isLiked > 0) {
                    b1.classList.toggle("bi-heart");
                    b1.classList.toggle("bi-heart-fill");
                    b1.classList.toggle("text-danger");
                    b1.value = "like";
                }
                b1.addEventListener("click", function(){
                    toggleLike(b1, response.postArray.postID);
                });

            const b2 = Object.assign(document.createElement("a"),{className:"btn post-icon bi bi-egg-fried fa-fw fa-2x"});
                b2.href = "single-post.php?postID=" + response.postArray.postID;

            e3.appendChild(b1);
            e3.appendChild(b2);

        const e4 = Object.assign(document.createElement("h3"),{className:"title-post my-2 fs-3 fst-italic",innerText:response.postArray.title});

        const e5 = Object.assign(document.createElement("p"),{className:"caption-post my-2",innerText:response.postArray.caption});

    div.appendChild(e1);
    div.appendChild(e2);
    div.appendChild(e3);    
    div.appendChild(e4);
    div.appendChild(e5);

    container.appendChild(div);
    addDataIndex = addDataIndex + 1;
}

// Main
getPost();
getPost();
getPost();
getPost();

