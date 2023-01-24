function ajaxRequest(fileName, method, data) {
    let args = JSON.stringify(data);
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            method(this.responseText);
        }
    };
    xmlhttp.open("POST", fileName, true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send("args="+args);
}

export default ajaxRequest;