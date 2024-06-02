document.addEventListener("DOMContentLoaded", function () {
	const toggleSidebarBtn = document.getElementById("toggleSidebar");
	const sidebar = document.querySelector(".sidebar");
	const mainContent = document.querySelector(".main-content");
	const links = document.querySelectorAll(".sidebar-link");
	const sections = document.querySelectorAll(".section-content");
	const logoutLink = document.getElementById("logoutLink");

	// Toggle sidebar visibility
	toggleSidebarBtn.addEventListener("click", function () {
		sidebar.classList.toggle("show-sidebar");
		mainContent.classList.toggle("show");
	});

	// Add click event to sidebar links
	links.forEach((link) => {
		link.addEventListener("click", function (event) {
			event.preventDefault();
			const sectionToShow = this.getAttribute("data-section");

			// Hide all sections
			sections.forEach((section) => {
				section.style.display = "none";
			});

			// Show the selected section
			const sectionElement = document.getElementById(
				`section-${sectionToShow}`
			);
			if (sectionElement) {
				sectionElement.style.display = "block";
			}

			// Add "active" class to the clicked link's parent <li> and remove from others
			links.forEach((l) => l.parentElement.classList.remove("active"));
			this.parentElement.classList.add("active");
		});
	});

	// Handle logout
	logoutLink.addEventListener("click", function (event) {
		event.preventDefault();
		window.location.href = "../controllers/logout.php";
	});
});
