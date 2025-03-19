<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Painel Administrativo')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Estilos personalizados -->

    @yield('css')
</head>

<body>

    <!-- Área de Conteúdo -->
    <main>
        @yield('content')
    </main>

    <!-- Bootstrap JS + jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script de interatividade -->
    <script>
        $(document).ready(function () {
            $("#toggle-menu").click(function () {
                $("body").toggleClass("sidebar-collapsed");
            });
        });
    </script>

    @yield('js')

</body>

</html>