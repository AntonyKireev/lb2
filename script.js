function SaveContent() {
    localStorage.setItem("saved", document.getElementById("content").innerHTML);
}

function ShowContent() {
    if("saved" in localStorage) {
        document.getElementById("saved").innerHTML = decodeURI(localStorage.getItem("saved"));
        localStorage.setItem("saved", document.getElementById("content").innerHTML);
    }
    else {
        document.getElementById("saved").innerHTML = "No saved content";
    }
}