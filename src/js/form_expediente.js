document.querySelector("#NS").addEventListener("input", enforce_maxlength);

function enforce_number(event) {
  let target = event.target;
  if (notContainNumbers(target.value)) {
    target.value = target.value.slice(0, -1);
  }
}

function enforce_maxlength(event) {
  let target = event.target;
  if (target.hasAttribute("maxlength")) {
    target.value = target.value.slice(0, target.getAttribute("maxlength"));
  }
}

function notContainNumbers(str) {
  return !/[0-9]/.test(str);
}