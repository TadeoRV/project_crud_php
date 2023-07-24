let newProject = document.querySelector("#newProject");

newProject.addEventListener("click", () => {
    console.log("Por lo menos ejecutas esto");
    toggle(".newproject-container");
})

function toggle(elementClass) {
    let element = document.querySelector(elementClass);
    let display = element.style.display;
    if (display == "none" || display == "") {
        element.style.display = "flex";
        newProject.innerHTML = "Cancel";
    } else {
        if (display = "flex") {
            element.style.display = "none";
            newProject.innerHTML = '<i class="fa - solid fa - square - plus fa - lg"></i>New Project';
        }
    }
}