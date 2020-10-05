var click_01 = document.getElementById("crotch_sea");
var click_02 = document.getElementById("anchovy_sea");
var click_03 = document.getElementsById("menu__fish_02");

function show_hide_01() {
  if (click_01.style.display === "none") {
    (click_01.style.display = "block"), (click_02.style.display = "none");
  } else {
    click_01.style.display = "none";
  }
}

function show_hide_02() {
  if (click_02.style.display === "none") {
    (click_02.style.display = "block"), (click_01.style.display = "none");
  } else {
    click_02.style.display = "none";
  }
}
