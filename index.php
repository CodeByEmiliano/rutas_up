<?php include 'header.php'; ?>

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <img src="assets/img/hero-bg-2.jpg" alt="" class="hero-bg">

      <div class="container">
        <div class="row gy-4 justify-content-between">
          <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
            <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
          </div>

          <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
            <h1>La innovación llego al transporte publico con Rutas Up</h1>
            <p>"En camino hacia el futuro"</p>
          </div>

        </div>
      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>

    </section><!-- /Hero Section -->
<!-- Añadir después de la sección Hero -->
<section id="project" class="project section light-background">
  <div class="container" data-aos="fade-up">
    <div class="project-content">
      <div class="project-image" data-aos="fade-right">
        <img src="assets/img/RutasUpLOGO.png" alt="App RutasUp" class="img-fluid rounded">
      </div>
      <div class="project-description" data-aos="fade-left">
        <h3>Transformando tu experiencia de transporte---Eric Estuvo aqui</h3>
        <p>RutasUp es un sistema de navegación diseñado para revolucionar el transporte público en Chetumal, ofreciendo:</p>
        <ul>
          <li><i class="bi bi-check-circle"></i> Ubicación en tiempo real de combis</li>
          <li><i class="bi bi-check-circle"></i> Planificación de rutas inteligente</li>
          <li><i class="bi bi-check-circle"></i> Notificaciones de cambios en el servicio</li>
          <li><i class="bi bi-check-circle"></i> Acceso rápido a emergencias</li>
        </ul>
        <a href="proyecto.php" class="btn btn-primary">Conoce más</a>
      </div>
    </div>
  </div>
</section>
  <!-- About Section -->
  <section id="about" class="about section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row align-items-xl-center gy-5">
        
        <!-- Texto de la izquierda -->
        <div class="col-xl-5 content">
          <h3>¿Cómo funcionará Rutas Up?</h3>
          <p>
            Un sistema de navegación diseñado para usuarios del transporte público (específicamente combis) que ofrecerá 
            funcionalidades como la visualización en tiempo real de la ubicación de los vehículos, el despliegue de rutas existentes 
            en la ciudad, y la asistencia para encontrar la ruta más adecuada hacia un destino determinado. Los usuarios podrán 
            almacenar rutas y ubicaciones favoritas, recibir notificaciones sobre eventos que afecten las rutas, y acceder a números 
            de emergencia de manera rápida.
          </p>
          <p>
            El sistema estará disponible para su uso dentro de la ciudad donde se desee implementar, con un enfoque en las rutas y 
            vehículos de transporte público local (combis). La plataforma será accesible a través de dispositivos móviles para los usuarios.
          </p>
        </div>
        
        <!-- Imagen de la derecha -->
        <div class="col-xl-7">
          <div class="image-container text-center">
            <img src="assets/img/69bb2cae-3032-4a3a-b7c8-2530e59e50f2.jpeg" alt="Vista previa del sistema Rutas Up" class="img-fluid rounded">
          </div>
        </div>
        
      </div>
    </div>
  </section>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/67943f793a8427326074a99a/1iidhft3d';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>

<?php include 'footer.php'; ?>