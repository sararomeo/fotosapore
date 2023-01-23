// Variables
const container = document.getElementById('container');
index = 0;

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
	
	console.log( { scrollTop, scrollHeight, clientHeight });
	if(clientHeight + scrollTop >= scrollHeight - 5) {
        setTimeout(getPost, 1000)
	}
});

function getPost() {
    let args = {"value":index};
    let jsonArgs = JSON.stringify(args);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            addDataToFeed(JSON.parse(this.responseText));
        }
    };
    xmlhttp.open("POST", "db/feed-request.php", true);
    xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xmlhttp.send("args=" + jsonArgs);
    index = index + 1;
}

function addDataToFeed(postData) {
    const postElement = document.createElement('div');
    postElement.classList.add('user-post');
    postElement.innerHTML = `
		<h1 class="title">${postData.title}</h2>
		<p class="text">${postData.caption}</p>
        <p class="text2">${postData.timestamp}</p>
	`;
    container.appendChild(postElement);
}
