<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <!--Bootstrap-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!--enlace pdf-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--enlaceckeditor-->
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
     <!--Tailwind CSS-->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">


</head>
<body class="bg-sky-800-100">
    <nav class="bg-blue-800 text-center text-white py-4 px-8 text-6xl">Mi Pequeño Blog</nav>

    @yield('content')

    <footer class="bg-blue-800 text-center text-white py-4 text-4xl">© Jose Manuel Ortiz - DWES Tarea Online 06</footer>
</body>
</html>
