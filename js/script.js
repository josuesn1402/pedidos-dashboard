document.addEventListener("DOMContentLoaded", function () {
	const toggleSidebarBtn = document.getElementById("toggleSidebar");
	const sidebar = document.querySelector(".sidebar");
	const mainContent = document.querySelector(".main-content");
	const links = document.querySelectorAll(".sidebar-link");
	const sections = document.querySelectorAll(".section-content");
	const logoutLink = document.getElementById("logoutLink");
	const registrarBtn = document.getElementById("registrar-btn");
	const editButtons = document.querySelectorAll(".edit-btn");

	// Alternar la visibilidad de la barra lateral
	toggleSidebarBtn.addEventListener("click", function () {
		sidebar.classList.toggle("show-sidebar");
		mainContent.classList.toggle("show");
	});

	// Agregar evento de clic a los enlaces de la barra lateral
	links.forEach((link) => {
		link.addEventListener("click", function (event) {
			event.preventDefault();
			const sectionToShow = this.parentElement.getAttribute("data-section");

			// Ocultar todas las secciones
			sections.forEach((section) => {
				section.style.display = "none";
			});

			// Mostrar la sección seleccionada
			const sectionElement = document.getElementById(
				`section-${sectionToShow}`
			);
			if (sectionElement) {
				sectionElement.style.display = "block";
			}

			// Agregar la clase "active" al elemento <li> del enlace clicado y eliminarla de otros
			links.forEach((l) => l.parentElement.classList.remove("active"));
			this.parentElement.classList.add("active");
		});
	});

	// Manejar el cierre de sesión
	logoutLink.addEventListener("click", function (event) {
		event.preventDefault();
		window.location.href = "../controllers/logout.php";
	});

	// Agregar evento de clic al botón "Registrar"
	registrarBtn.addEventListener("click", function () {
		// Ocultar todas las secciones
		sections.forEach((section) => {
			section.style.display = "none";
		});

		// Mostrar la sección "Registrar"
		const sectionElement = document.getElementById("section-registrar");
		if (sectionElement) {
			sectionElement.style.display = "block";
		}

		// Actualizar la clase activa en la barra lateral
		links.forEach((l) => l.parentElement.classList.remove("active"));
		sidebar.querySelector('[data-section="registrar"]').classList.add("active");
	});

	// Cargar contenido de sección dinámicamente al hacer clic en el botón "Editar" en la tabla
	editButtons.forEach((button) => {
		button.addEventListener("click", function () {
			const dataPedido = JSON.parse(this.getAttribute("data-pedido"));
			const sectionElement = document.getElementById("section-modificar");
			const formulario = document.getElementById("formulario-modificar");

			// Mostrar la sección de modificar
			sections.forEach((section) => {
				section.style.display = "none";
			});
			sectionElement.style.display = "block";

			// Llenar el formulario con los datos del pedido
			formulario.querySelector('[name="eIdPedido"]').value =
				dataPedido.IdPedido;
			formulario.querySelector('[name="eTipoDocumento"]').value =
				dataPedido.IdDocumento;
			formulario.querySelector('[name="eCodigoEmpleado"]').value =
				dataPedido.IdEmpleado;
			formulario.querySelector('[name="eCliente"]').value =
				dataPedido.IdCliente;
			formulario.querySelector('[name="eFecha"]').value =
				dataPedido.Fecha.split(" ")[0];
			formulario.querySelector('[name="eNumeroDocumento"]').value =
				dataPedido.NumDocumento;
			formulario.querySelector('[name="eImporte"]').value = dataPedido.Importe;
			formulario.querySelector('[name="eDescuento"]').value =
				dataPedido.Descuento;
			formulario.querySelector('[name="eSubtotal"]').value =
				dataPedido.Subtotal;
			formulario.querySelector('[name="eTotal"]').value = dataPedido.Total;
			formulario.querySelector('[name="eIgv"]').value = dataPedido.IGV;
			const deliveryRadio = formulario.querySelector(
				`[name="eDelivery"][value="${dataPedido.DeliveryValue}"]`
			);
			if (deliveryRadio) {
				deliveryRadio.checked = true;
			}

			// Mostrar la sección de modificar
			sections.forEach((section) => {
				section.style.display = "none";
			});
			document.getElementById("section-modificar").style.display = "block";
		});
	});
});
