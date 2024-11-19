<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['correo'];
if ($varsesion== null || $varsesion= ''){
    header("location:../index.html");
    die();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos Disponibles - EducaOnline</title>
    <link rel="stylesheet" href="../Estilos/cursos.css"> <!-- Cambia la ruta según sea necesario -->
</head>
<body>
   
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="../index.html" class="logo">
                <img src="../Imagenes/cc649ed0-1ced-4788-aa96-0be1084cc928.jpg" alt="Logo EducaOnline" width="100">
            </a>
            <nav class="navigation">
                <ul>
                    <li><a href="../index.html">Menú Principal</a></li>
                    <li><a href="../cerrar_sesion.php">Salir</a></li> <!-- Botón de Salir -->
                </ul>
            </nav>
        </div>
    </header>

    <!-- Sección de Cursos Disponibles -->
    <section id="curso" class="courses">
        <h2>Nuestros Cursos</h2>
        <div class="course-list">
            <div class="course-item" onclick="location.href='desarrollo-web.html'"> <!-- Redirección al hacer clic -->
                <img class="img1" src="https://ivorysoluciones.com/wp-content/uploads/2018/03/gafas-ordenador.jpg" alt="Desarrollo Web" />
                <h3>Desarrollo Web</h3>
                <p>Aprende HTML, CSS, JavaScript y más para crear sitios web increíbles.</p>
            </div>
            <div class="course-item" onclick="location.href='diseno-grafico.html'">
                <img class="img1" src="https://cdn.udax.edu.mx/blog/2024-05-03/la-influencia-de-la-inteligencia-de-negocios-en-el-diseno-grafico-moderno_1.jpg" alt="Diseño Gráfico" />
                <h3>Diseño Gráfico</h3>
                <p>Domina herramientas como Photoshop, Illustrator y mucho más.</p>
            </div>
            <div class="course-item" onclick="location.href='marketing-digital.html'">
                <img class="img1" src="https://www.mdmarketingdigital.com/blog/wp-content/uploads/2024/01/que-es-el-marketing-digital-1-1200x900.jpg" alt="Marketing Digital" />
                <h3>Marketing Digital</h3>
                <p>Conviértete en un experto en SEO, SEM, redes sociales y publicidad online.</p>
            </div>
        </div>
    </section>

    <!-- Sección de Cursos Futuros -->
    <section id="cursos-futuros" class="upcoming-courses">
        <h2>Cursos Futuros...</h2>
        <div class="future-course-list">
            <div class="future-course-item">
                <h3>Inteligencia Artificial Avanzada</h3>
                <img class="img2" src="../Imagenes/ia-avanzada.webp" alt="Inteligencia Artificial" />
                <p>Explora el futuro de la IA y su impacto en las industrias globales.</p>
                <span class="start-date">Fecha de inicio: 10 de noviembre 2024</span>
            </div>
            <div class="future-course-item">
                <h3>Blockchain y Criptomonedas</h3>
                <img class="img2" src="../Imagenes/block-chain.jpg" alt="Blockchain" />
                <p>Descubre la tecnología detrás de las criptomonedas y sus aplicaciones.</p>
                <span class="start-date">Fecha de inicio: 15 de diciembre 2024</span>
            </div>
            <div class="future-course-item">
                <h3>Realidad Virtual y Aumentada</h3>
                <img class="img2" src="../Imagenes/realidad-virtual.webp" alt="Realidad Virtual" />
                <p>Sumérgete en el mundo de la realidad extendida y crea experiencias inmersivas.</p>
                <span class="start-date">Fecha de inicio: 5 de enero 2025</span>
            </div>
        </div>
    </section>
</body>
</html>
