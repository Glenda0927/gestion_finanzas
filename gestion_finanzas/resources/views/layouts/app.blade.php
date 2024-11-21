<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Finanzas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            transition: all 0.3s ease;
            z-index: 1000;
        }
        .sidebar.show {
            left: 0;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #000;
            display: block;
        }
        .sidebar ul li a:hover {
            background-color: #e9ecef;
            border-radius: 4px;
        }
        .content {
            margin-left: 0;
            transition: margin-left 0.3s ease;
        }
        .content.shift {
            margin-left: 250px;
        }
        .toggle-btn {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1100;
        }
    </style>
</head>
<body>
    <button class="btn btn-primary toggle-btn" onclick="toggleSidebar()">☰</button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <ul>
            <li><a href="#">Hola, Lorenzo!</a></li>
            <li><a href="{{ route('user.index') }}">Usuarios</a></li>
            <li><a href="#">Cuentas</a></li>
            <li><a href="#">Configuración</a></li>
            <li><a href="#">Categorías</a></li>
        </ul>
    </div>

    <div class="content" id="content">
        @yield('content')
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');

        function toggleSidebar() {
            sidebar.classList.toggle('show');
            content.classList.toggle('shift');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
