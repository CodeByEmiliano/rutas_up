document.addEventListener("DOMContentLoaded", function() {
    const errorSound = document.getElementById('errorSound');
    const successSound = document.getElementById('successSound');
    const clickSound = document.getElementById('clickSound');
    const focusSound = document.getElementById('focusSound');
    
    // Efecto de sonido al enfocar campos
    document.querySelectorAll("#contactForm input, #contactForm textarea").forEach(input => {
        input.addEventListener("focus", () => {
            focusSound.currentTime = 0;
            focusSound.play();
        });
    });
    
    // Validación del formulario
    document.getElementById("contactForm").addEventListener("submit", function(event) {
        event.preventDefault();
        clickSound.currentTime = 0;
        clickSound.play();
        
        const nombre = document.getElementById("name").value.trim();
        const correo = document.getElementById("email").value.trim();
        const numero = document.getElementById("phone").value.trim();
        const asunto = document.getElementById("subject").value.trim();
        
        // Validaciones
        if (nombre === "" || correo === "" || numero === "" || asunto === "") {
            errorSound.currentTime = 0;
            errorSound.play();
            mostrarModalError("Todos los campos son obligatorios.");
            return;
        }
        
        if (!/^[a-zA-Z\s]+$/.test(nombre)) {
            errorSound.play();
            mostrarModalError("El nombre solo puede contener letras.");
            return;
        }
        
        if (!/^\S+@\S+\.\S+$/.test(correo)) {
            errorSound.currentTime = 0;
            errorSound.play();
            mostrarModalError("Por favor ingresa un correo electrónico válido.");
            return;
        }
        
        if (!/^\d{10}$/.test(numero)) {
            errorSound.currentTime = 0;
            errorSound.play();
            mostrarModalError("El número de teléfono debe contener exactamente 10 dígitos.");
            return;
        }
        
        // Envío AJAX
        const formData = new FormData(this);
        
        fetch("procesa-contacto.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                successSound.currentTime = 0;
                successSound.play();
                mostrarModalExito("Tu mensaje ha sido enviado con éxito. Nos pondremos en contacto contigo pronto.");
                document.getElementById("contactForm").reset();
            } else {
                successSound.currentTime = 0;
                successSoundSound.play();
                mostrarModalError(data.message || "Ocurrió un error al enviar tu mensaje. Por favor intenta nuevamente.");
            }
        })
        .catch(error => {
            successSound.currentTime = 0;
            successSound.play();
            mostrarModalError("Error de conexión. Por favor verifica tu conexión a internet e intenta nuevamente.");
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
});