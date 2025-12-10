<?php include 'header.php'; ?>

<section id="contact" class="contact section dark-background">
  <div class="container" data-aos="fade-up">
    
    <div class="section-header">
      <h1 class="main-title">Rutas Up</h1>
      <h2 class="section-title">Contacto</h2>
      <p class="section-subtitle">Estamos aquí para ayudarte</p>
    </div>

    <div class="contact-content">
      <div class="contact-info" data-aos="fade-right">
        <div class="info-box">
          <i class="bi bi-geo-alt"></i>
          <h3>Dirección</h3>
          <p>Chetumal, Quintana Roo, México</p>
        </div>

        <div class="info-box">
          <i class="bi bi-envelope"></i>
          <h3>Email</h3>
          <p>contacto@rutasup.com</p>
        </div>

        <div class="info-box">
          <i class="bi bi-phone"></i>
          <h3>Teléfono</h3>
          <p>+52 983 123 4567</p>
        </div>
      </div>

      <div class="contact-form" data-aos="fade-left">
        <form id="contactForm" class="php-email-form">
          <div class="form-group">
            <input type="text" id="name" name="nombre" class="form-control" placeholder="Nombre completo" required>
          </div>
          <div class="form-group">
            <input type="email" id="email" name="correo" class="form-control" placeholder="Correo electrónico" required>
          </div>
          <div class="form-group">
            <input type="text" id="phone" name="numero" class="form-control" placeholder="Número de teléfono" required>
          </div>
          <div class="form-group">
            <textarea id="subject" name="asunto" rows="5" class="form-control" placeholder="Asunto del mensaje" required></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="btn-submit">Enviar Mensaje</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Modal de Error -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header border-0">
        <h5 class="modal-title text-danger"><i class="bi bi-exclamation-triangle-fill"></i> Error</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="modalMensaje"></p>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Entendido</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Éxito -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header border-0">
        <h5 class="modal-title text-success"><i class="bi bi-check-circle-fill"></i> Éxito</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="modalMensajeExito"></p>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<audio id="errorSound" src="sounds/error.mp3" preload="auto"></audio>
<audio id="successSound" src="sounds/success.mp3" preload="auto"></audio>
<audio id="clickSound" src="sounds/click.mp3" preload="auto"></audio>
<audio id="focusSound" src="sounds/focus.mp3" preload="auto"></audio>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const errorSound = document.getElementById('errorSound');
    const successSound = document.getElementById('successSound');
    const clickSound = document.getElementById('clickSound');
    const focusSound = document.getElementById('focusSound');
    
    // Efecto de sonido al enfocar campos
    document.querySelectorAll("#contactForm input, #contactForm textarea").forEach(input => {
        input.addEventListener("focus", () => {
            focusSound.currentTime = 0;
            focusSound.play().catch(e => console.log("Error audio focus:", e));
        });
    });
    
    // Validación del formulario
    document.getElementById("contactForm").addEventListener("submit", function(event) {
        event.preventDefault();
        
        // Sonido de clic
        clickSound.currentTime = 0;
        clickSound.play().catch(e => console.log("Error audio click:", e));
        
        const nombre = document.getElementById("name").value.trim();
        const correo = document.getElementById("email").value.trim();
        const numero = document.getElementById("phone").value.trim();
        const asunto = document.getElementById("subject").value.trim();
        
        // Validaciones básicas (las detalladas las hace PHP)
        if (nombre === "" || correo === "" || numero === "" || asunto === "") {
            errorSound.currentTime = 0;
            errorSound.play().catch(e => console.log("Error audio error:", e));
            mostrarModalError("Todos los campos son obligatorios.");
            return;
        }
        
        // Deshabilitar botón para evitar múltiples envíos
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando...';
        
        // Envío AJAX
        const formData = new FormData(this);
        
        fetch("procesa-contacto.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error de red');
            }
            return response.json();
        })
        .then(data => {
            console.log("Respuesta servidor:", data); // Para depuración
            
            if (data.success) {
                successSound.currentTime = 0;
                successSound.play().catch(e => console.log("Error audio success:", e));
                mostrarModalExito(data.message);
                document.getElementById("contactForm").reset();
            } else {
                errorSound.currentTime = 0;
                errorSound.play().catch(e => console.log("Error audio error:", e));
                mostrarModalError(data.message || "Ocurrió un error al enviar tu mensaje.");
            }
        })
        .catch(error => {
            console.error("Error en fetch:", error);
            errorSound.currentTime = 0;
            errorSound.play().catch(e => console.log("Error audio error:", e));
            mostrarModalError("Error de conexión. Por favor, intenta nuevamente.");
        })
        .finally(() => {
            // Rehabilitar botón
            submitBtn.disabled = false;
            submitBtn.textContent = "Enviar Mensaje";
        });
    });
    
    function mostrarModalError(mensaje) {
        document.getElementById("modalMensaje").textContent = mensaje;
        const modal = new bootstrap.Modal(document.getElementById('errorModal'));
        modal.show();
    }
    
    function mostrarModalExito(mensaje) {
        document.getElementById("modalMensajeExito").textContent = mensaje;
        const modal = new bootstrap.Modal(document.getElementById('successModal'));
        modal.show();
    }
    
    // Agregar console.log para depuración
    console.log("Formulario de contacto cargado correctamente");
});
</script>

<?php include 'footer.php'; ?>