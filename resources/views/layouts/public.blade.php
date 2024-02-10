<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Titulo')</title>

    <!-- Estilos -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    <div class="sidebarContainer">        
        <div class="content">
            <button id="toggleSidebar"><i class="fas fa-bars"></i></button>
            <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            </div>
            @yield('content')
            
        </div>
    </div>
    <!-- scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebarContainer').classList.toggle('sidebarHidden');
        });
    </script>    
</body>
</html>
