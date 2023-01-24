function goToSearchPage() {
    var x = document.getElementById("myInput");
    document.getElementById("demo").innerHTML = "You are searching for: " + x.value;
}