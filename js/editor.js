function checkTitle(event) {
    var title= document.querySelector("input[name='title']");
    var warning = document.querySelector("form #title-warning");

    if (title.value === ""){
        event.preventDefault();
        warning.innerHTML= "You must write a title for the entry";
    }
}

function init() {
    var editorForm= document.querySelector("form#editor");
    console.log('Your browser understands DOMContentLoaded');
}
document.addEventListener("DOMContentLoaded", init, false);