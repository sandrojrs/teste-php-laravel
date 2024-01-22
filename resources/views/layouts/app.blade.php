<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importação de Documentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="mt-4 container">
            <div id="wrapper">
                <div id="content-wrapper" class="d-flex flex-column">
                    <div>
                        @include('layouts.nav-bar') 
                        @include('components.alert')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
