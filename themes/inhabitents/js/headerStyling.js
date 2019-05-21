let header = document.querySelector("#masthead");
// window.onload = function() {
let contentDiv = document.getElementById("no-sidebar-page-layout");
if (
  contentDiv.classList.contains("single-adventure") ||
  contentDiv.classList.contains("about-us")
) {
  header.classList.add("site-header-static");
}
// };
