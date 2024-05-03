const handleResize = () => {
	const burger = document.getElementById('burger');
	const expanded = burger.getAttribute('aria-expanded');

	if (expanded === 'true') {
		burger.click();
	}
};

const handleBurgerClick = (e) => {
	const el = e.currentTarget;
	const id = el.getAttribute('data-controls');
	const nav = document.getElementById(id);

	const current = nav.getAttribute('aria-expanded');
	const next = current === 'true' ? 'false' : 'true';
	el.setAttribute('aria-expanded', next);
	nav.setAttribute('aria-expanded', next);
};

window.addEventListener('resize', handleResize, false);

const burger = document.getElementById('burger');
burger.addEventListener('click', handleBurgerClick);
