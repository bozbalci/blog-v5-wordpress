const html = document.querySelector("html");
html.classList.remove("no-js");
let debug = false;

function toggleDebug() {
  if (debug) {
    html.classList.remove("debug");
    debug = false;
  } else {
    html.classList.add("debug");
    debug = true;
  }
}

document.toggleDebug = toggleDebug;