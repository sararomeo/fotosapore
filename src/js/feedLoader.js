// Variables
const container = document.getElementById('container');
var index = 0;
var maxIndex;

// Main
getPost();
getPost();
getPost();
getPost();
getPost();
getPost();

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
    if(index >= maxIndex) return;

    let args = {"value":index};
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
    index = index + 1;
}

/**
 * Add the post in the feed.
 * @param {*} response The JSON to be loaded in the feed.
 */
function addDataToFeed(response) {
    maxIndex = response.postNum;
    postContent = response.postArray;
    const postElement = document.createElement('div');
    postElement.classList.add('user-post');
    postElement.innerHTML = `
		<h1 class="title">${postContent.title}</h2>
		<p class="text">${postContent.caption}</p>
        <p class="text2">${postContent.timestamp}</p>
	`;
    container.appendChild(postElement);
}
