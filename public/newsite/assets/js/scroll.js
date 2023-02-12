window.addEventListener('scroll', function () {
	if (window.scrollY > 50) {
		document.getElementById('navbar_top').classList.add('nav-background');
	} else {
		document.getElementById('navbar_top').classList.remove('nav-background');
	}
});