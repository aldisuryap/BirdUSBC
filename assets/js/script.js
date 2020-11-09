$(document).ready(function() {
	$(".modal").modal();
	$(".fixed-action-btn").floatingActionButton();

	$(".carousel.carousel-slider").carousel({
		fullWidth: true,
		indicators: true
	});

	$(".tabs").tabs();
	$(".parallax").parallax();
	$(".materialboxed").materialbox();
	$(".slider").slider({
		indicators: false,
		height: 540
	});
	$(".sidenav").sidenav();

	$(window).scroll(function() {
		if ($(this).scrollTop() > 100) {
			$("nav").addClass("solid");
		} else {
			$("nav").removeClass("solid");
		}
	});
});

// Start Tampil Form Admin
var divs = ["Menu1", "Menu2"];
var visibleDivId = null;

function toggleVisibility(divId) {
	param = document.getElementById(divId);
	div = document.getElementById("Menu1");
	div2 = document.getElementById("Menu2");
	if (divId == "Menu1") {
		if (param.style.display == "none") {
			param.style.display = "block";
			div2.style.display = "none";
		} else {
			param.style.display = "block";
			div2.style.display = "none";
		}
	} else {
		if (param.style.display == "none") {
			param.style.display = "block";
			div.style.display = "none";
		} else {
			param.style.display = "block";
			div.style.display = "none";
		}
	}
}
