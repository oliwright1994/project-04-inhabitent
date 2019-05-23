// document.querySelector(".search-button").addEventListener("click", e => {
//   event.preventDefault();
//   document.querySelector(".search-field").setAttribute("style", "width: 26px");
// });

jQuery(document).ready(e => {
  jQuery(".search-button").click(e => {
    jQuery(".search-field")
      .toggle("fast")
      .focus();
  });

  jQuery(".search-field").focusout(e => {
    jQuery(".search-field").toggle("fast");
  });
});
