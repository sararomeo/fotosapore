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
    let args = {"value":getPostIndex, "pageName":pageName};
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

    const div = Object.assign(document.createElement("div"),{className:"user-post"});
    const h1 = Object.assign(document.createElement("h1"),{className:"title",innerText:response.postArray.title});
    const p1 = Object.assign(document.createElement("p"),{className:"text1",innerText:response.postArray.timestamp});
    const p2 = Object.assign(document.createElement("p"),{className:"text2",innerText:response.postArray.caption});
    const p3 = Object.assign(document.createElement("p"),{className:"text3",innerText:response.postArray.recipe});
    const h2 = Object.assign(document.createElement("h2"),{className:"title2",innerText:response.postArray.username});


    div.appendChild(h1);
    div.appendChild(p1);
    div.appendChild(p2);    
    div.appendChild(p3);
    div.appendChild(h2);


    container.appendChild(div);
    addDataIndex = addDataIndex + 1;
}

// Main
getPost();
getPost();
getPost();
getPost();
getPost();
getPost();
