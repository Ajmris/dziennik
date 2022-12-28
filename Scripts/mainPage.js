
var showContent = false;
function myFunction() {
    var content = document.getElementById("content");
    if(!showContent){
        content.style.visibility = "hidden";
        showContent = !showContent;
    } else {
        content.style.visibility = "visible";
        showContent = !showContent;
    }
}