const header = document.querySelector("#masthead");
const contentDiv = document.getElementById("content").firstElementChild;
let differentTopBarRequired = false;

if (
  contentDiv.classList.contains("single-adventure") ||
  contentDiv.classList.contains("home") ||
  contentDiv.classList.contains("about-us")
) {
  differentTopBarRequired = true;
  header.classList.add("site-header-static");
}

window.addEventListener("scroll", function() {
  if (differentTopBarRequired === true) {
    if (pageYOffset >= window.innerHeight) {
      header.classList.remove("site-header-static");
    } else if (pageYOffset < window.innerHeight) {
      header.classList.add("site-header-static");
    }
  }
});
