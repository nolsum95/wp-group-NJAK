/**
 * Group Portfolio — front-end behavior.
 */
(function () {
	const header = document.querySelector("[data-header]");
	const toggle = document.querySelector("[data-nav-toggle]");
	const nav = document.querySelector("[data-nav]");
	const progress = document.querySelector("[data-progress]");
	const navLabel = document.querySelector("[data-nav-label]");
	const openLabel = navLabel ? navLabel.textContent : "Open menu";
	const closeLabel = "Close menu";

	const setMenu = (open) => {
		if (!toggle || !nav) {
			return;
		}
		toggle.setAttribute("aria-expanded", open ? "true" : "false");
		nav.classList.toggle("is-open", open);
		document.body.classList.toggle("nav-open", open);
		if (navLabel) {
			navLabel.textContent = open ? closeLabel : openLabel;
		}
	};

	if (toggle && nav) {
		toggle.addEventListener("click", () => {
			setMenu(toggle.getAttribute("aria-expanded") !== "true");
		});

		nav.querySelectorAll("a").forEach((link) => {
			link.addEventListener("click", () => setMenu(false));
		});

		document.addEventListener("keydown", (event) => {
			if (event.key === "Escape") {
				setMenu(false);
			}
		});

		window.addEventListener("resize", () => {
			if (window.innerWidth > 1040) {
				setMenu(false);
			}
		});
	}

	const onScroll = () => {
		if (header) {
			header.classList.toggle("is-stuck", window.scrollY > 8);
		}
		if (progress) {
			const max = document.documentElement.scrollHeight - window.innerHeight;
			const amount = max > 0 ? (window.scrollY / max) * 100 : 0;
			progress.style.width = amount + "%";
		}
	};

	onScroll();
	window.addEventListener("scroll", onScroll, { passive: true });

	const links = Array.from(document.querySelectorAll(".site-nav a[href*='#']"));
	const pairs = links
		.map((link) => {
			const href = link.getAttribute("href") || "";
			const id = href.split("#")[1];
			const section = id ? document.getElementById(id) : null;
			return section ? { link, section } : null;
		})
		.filter(Boolean);

	if (pairs.length && "IntersectionObserver" in window) {
		const active = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (!entry.isIntersecting) {
						return;
					}
					pairs.forEach((pair) => {
						const match = pair.section === entry.target;
						pair.link.classList.toggle("is-active", match);
						if (match) {
							pair.link.setAttribute("aria-current", "true");
						} else {
							pair.link.removeAttribute("aria-current");
						}
					});
				});
			},
			{ rootMargin: "-45% 0px -45% 0px", threshold: 0 }
		);

		pairs.forEach((pair) => active.observe(pair.section));
	}

	const revealables = document.querySelectorAll(".reveal");
	if (revealables.length && "IntersectionObserver" in window) {
		const reveal = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (!entry.isIntersecting) {
						return;
					}
					entry.target.classList.add("is-in");
					reveal.unobserve(entry.target);
				});
			},
			{ threshold: 0.14, rootMargin: "0px 0px -8% 0px" }
		);

		revealables.forEach((el, index) => {
			el.style.setProperty("--delay", (index % 4) * 70 + "ms");
			reveal.observe(el);
		});
	} else {
		revealables.forEach((el) => el.classList.add("is-in"));
	}

	const status = document.querySelector("[data-contact-status]");
	if (status) {
		status.scrollIntoView({ block: "center" });
	}
})();
