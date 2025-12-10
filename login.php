<?php include 'header.php'; ?>

<section class="login section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-8" data-aos="fade-up">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center">Iniciar Sesión</h3>
            <form>
              <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" required>
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Recordarme</label>
              </div>
              <button type="submit" class="btn btn-primary w-100">Ingresar</button>
              <div class="text-center mt-3">
                <a href="recuperacion.php">¿Olvidaste tu contraseña?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>