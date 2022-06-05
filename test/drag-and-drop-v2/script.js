function onDragStart(event) {
    event
        .dataTransfer
        .setData('text/plain', event.target.id);
    event
        .currentTarget
        .style
        .backgroundColor = 'yellow';
    const id = event
        .dataTransfer
        .getData('text');
    const draggableElement = document.getElementById(id);
    console.log(draggableElement);
    const dropzone = event.target;
    console.log(dropzone);
    console.log(event);

}
function onDragOver(event) {
    event.preventDefault();
}
function onDrop(event) {
    const id = event
        .dataTransfer
        .getData('text');
    const draggableElement = document.getElementById(id);
    console.log(draggableElement);
    const dropzone = event.target;
    console.log(dropzone);
    dropzone.appendChild(draggableElement);
    event
        .dataTransfer
        .clearData();
    draggableElement.removeAttribute("draggable")
    draggableElement.removeAttribute("ondragstart")
    console.log(event);
}