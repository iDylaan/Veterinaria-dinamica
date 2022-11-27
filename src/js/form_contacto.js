document.querySelector("#telefono").addEventListener("input", enforce);
document.querySelector("#cp").addEventListener("input", enforce);

function enforce(event) {
  let target = event.target;
  if (target.hasAttribute("maxlength")) {
    target.value = target.value.slice(0, target.getAttribute("maxlength"));
  }
  this.value = this.value.replace(/[^0-9.]/g, '');
  this.value = this.value.replace(/(\..*)\./g, "$1");
}