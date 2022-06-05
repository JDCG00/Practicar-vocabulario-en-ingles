const fill = document.querySelector('.fill');
const empties = document.querySelectorAll('.empty');
const locked = document.querySelectorAll('.locked');

// Fill listeners
fill.addEventListener('dragstart', dragStart);
fill.addEventListener('dragend', dragEnd);

// Loop through empty boxes and add listeners
for (const empty of empties) {
  empty.addEventListener('dragover', dragOver);
  empty.addEventListener('dragenter', dragEnter);
  empty.addEventListener('dragleave', dragLeaveEmpty);
  empty.addEventListener('drop', dragDropEmpty);
}

for (const lock of locked) {
  lock.addEventListener('dragover', dragOver);
  lock.addEventListener('dragenter', dragEnter);
  lock.addEventListener('dragleave', dragLeaveLocked);
  lock.addEventListener('drop', dragDropLocked);
}

// Drag Functions

function dragStart() {
  this.className += ' hold';
  setTimeout(() => (this.className = 'invisible'), 0);
}

function dragEnd() {
  this.className = 'fill';
}

function dragOver(e) {
  e.preventDefault();
}

function dragEnter(e) {
  e.preventDefault();
  this.className += ' hovered';
}

function dragLeaveEmpty() {
  this.className = 'empty';
}
function dragLeaveLocked() {
  this.className = 'locked';
}

function dragDropEmpty() {
  this.className = 'empty';
  this.append(fill);
}
function dragDropLocked() {
  this.className = 'locked';
  this.append(fill);
}
