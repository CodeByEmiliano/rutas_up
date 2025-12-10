<?php include 'header.php'; ?>

<style>
  .sitemap {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 40px;
    background: #000;
    color: #fff;
  }
  .sitemap-hierarchy {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
  }
  .hierarchy-level {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
  }
  .hierarchy-item {
    background: #222;
    color: #fff;
    padding: 15px 25px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(255, 255, 255, 0.1);
    position: relative;
    margin: 10px;
    min-width: 180px;
  }
  .hierarchy-item h3, .hierarchy-item div {
    color: #ffcc00;
  }
  .hierarchy-item h3 {
    font-size: 20px;
  }
  .sub-items {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
  }
  .hierarchy-item::before {
    content: '';
    position: absolute;
    top: -20px;
    left: 50%;
    width: 2px;
    height: 20px;
    background: #fff;
    transform: translateX(-50%);
  }
  .hierarchy-item:first-child::before {
    display: none;
  }
  @media (max-width: 768px) {
    .sitemap-hierarchy {
      flex-direction: column;
    }
  }
</style>

<section id="sitemap" class="sitemap section">
  <div class="container" data-aos="fade-up">
    
    <div class="sitemap-hierarchy">
      <div class="hierarchy-level">
        <a href="inicio.php" class="hierarchy-item main-item" data-aos="fade-up" data-aos-delay="100">
          <i class="bi bi-house"></i>
          <h3 style="color: #3399ff;">Inicio</h3>
        </a>
      </div>

      <div class="hierarchy-level">
        <a href="nosotros.php" class="hierarchy-item" data-aos="fade-up" data-aos-delay="150">
          <i class="bi bi-people"></i>
          <h3 style="color: #ff33cc;">Nosotros</h3>
        </a>
        <div class="sub-items">
          <a href="quienes-somos.php" class="hierarchy-item" style="color: #ffcc00;">Quiénes somos</a>
          <a href="mision-vision.php" class="hierarchy-item" style="color: #00ccff;">Misión, Visión y Valores</a>
          <a href="nuestro-equipo.php" class="hierarchy-item" style="color: #ff6600;">Nuestro equipo</a>
        </div>
      </div>

      <div class="hierarchy-level">
        <a href="ayuda.php" class="hierarchy-item" data-aos="fade-up" data-aos-delay="200">
          <i class="bi bi-question-circle"></i>
          <h3 style="color: #ff0000;">Ayuda</h3>
        </a>
        <div class="sub-items">
          <a href="preguntas-frecuentes.php" class="hierarchy-item" style="color: #00ff99;">Preguntas frecuentes</a>
          <a href="mapa-sitio.php" class="hierarchy-item" style="color: #ff9900;">Mapa de sitio</a>
        </div>
      </div>

      <div class="hierarchy-level">
        <a href="contacto.php" class="hierarchy-item" data-aos="fade-up" data-aos-delay="250">
          <i class="bi bi-envelope"></i>
          <h3 style="color: #6600ff;">Contacto</h3>
        </a>
      </div>

      <div class="hierarchy-level">
        <a href="iniciar-sesion.php" class="hierarchy-item" data-aos="fade-up" data-aos-delay="300">
          <i class="bi bi-person"></i>
          <h3 style="color: #ff3399;">Ingresar</h3>
        </a>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
