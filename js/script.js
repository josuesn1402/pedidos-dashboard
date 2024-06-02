document.addEventListener("DOMContentLoaded", function () {
	const toggleSidebarBtn = document.getElementById("toggleSidebar");
	const sidebar = document.querySelector(".sidebar");
	const mainContent = document.querySelector(".main-content");
	const links = document.querySelectorAll(".sidebar-link");
	const contentArea = document.getElementById("main-content-right");
	const logoutLink = document.getElementById("logoutLink");

	// Toggle sidebar visibility
	toggleSidebarBtn.addEventListener("click", function () {
		sidebar.classList.toggle("show-sidebar");
		mainContent.classList.toggle("show");
	});

	// Load section content dynamically
	links.forEach((link) => {
		link.addEventListener("click", function (event) {
			event.preventDefault();
			const section = this.getAttribute("data-section");
			if (section) {
				loadSection(section);
				// Add "active" class to the clicked link's parent <li> and remove from others
				links.forEach((l) => l.parentElement.classList.remove("active"));
				this.parentElement.classList.add("active");
			}
		});
	});

	function loadSection(section) {
		fetch(`${section}.php`)
			.then((response) => response.text())
			.then((data) => {
				contentArea.innerHTML = data;
			})
			.catch((error) => console.error("Error al cargar los datos:", error));
	}

	// Handle logout
	logoutLink.addEventListener("click", function (event) {
		event.preventDefault();
		window.location.href = "../controllers/logout.php";
	});

	loadSection("listar");
});
