<?php include 'header.php'; ?>
<section id="team" class="team section dark-background">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h1 class="main-title">Rutas Up</h1>
      <h2 class="section-title">Nuestro Equipo</h2>
      <p class="section-subtitle">Conoce al talento detrás de esta innovación</p>
    </div>
    <div class="team-grid" id="team-grid">
    </div>
  </div>
</section>
<script>
fetch('/rutasup/backend_rutasup/api/equipo.php')
  .then(res => res.json())
  .then(equipo => {
    const grid = document.getElementById('team-grid');
    grid.innerHTML = equipo.map(miembro => `
      <div class="team-card" data-aos="fade-up" data-aos-delay="${miembro.delay}">
        <div class="member-image">
          <img src="assets/img/team/${miembro.imagen}" alt="${miembro.nombre}" class="img-fluid">
        </div>
        <div class="member-info">
          <div class="info-header">
            <i class="${miembro.icono} icon"></i>
            <h3>${miembro.nombre}</h3>
          </div>
          <p class="position">${miembro.cargo}</p>
          <div class="social-links">
            <a href="${miembro.linkedin}"><i class="bi bi-linkedin"></i></a>
            <a href="${miembro.github}"><i class="bi bi-github"></i></a>
            <a href="mailto:${miembro.email}"><i class="bi bi-envelope"></i></a>
          </div>
        </div>
      </div>
    `).join('');
  });
</script>
<?php include 'footer.php'; ?>