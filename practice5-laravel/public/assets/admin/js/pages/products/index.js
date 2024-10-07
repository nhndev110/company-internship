let statusToggleFilter = false;

$(function () {
  toggleFilterForm();
});

function toggleFilterForm() {
  $("#btn-toggle-filter").on("click", function () {
    statusToggleFilter = !statusToggleFilter;
    statusToggleFilter ? $("#filter-form").fadeIn(350) : $("#filter-form").fadeOut(350);
  });
}