document.querySelector("#NS").addEventListener("input", enforce_maxlength);
function enforce_maxlength(event) {
  let target = event.target;
  if (target.hasAttribute("maxlength")) {
    target.value = target.value.slice(0, target.getAttribute("maxlength"));
  }
}

