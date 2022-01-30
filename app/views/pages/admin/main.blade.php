<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ getenv('APP_NAME') ?? 'Leaf MVC' }} | @yield('title')</title>
        <link rel="shortcut icon" href="https://leafphp.netlify.app/img/logo.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ PublicPath('./assets/css/styles.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,900;1,100;1,400;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script src="https://kit.fontawesome.com/e2eb6553b9.js" crossorigin="anonymous"></script>
        <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>
        <script src="{{ PublicPath('./assets/js/jquery-3.6.0.min.js') }}" type="text/javascript"></script>
        <script src="{{ PublicPath('./assets/js/main.js') }}" type="module"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

    <body style="background: #263238;">
        <nav class="navbar navbar-dark bg-dark navbar-expand-md">
            <div class="container">
                <a href="/" class="navbar-brand">Glint</a>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a href="/dashboard" class="nav-link active">Dashboard</a></li>
                        <li class="nav-item"><a href="/dashboard/content" class="nav-link">Content</a></li>
                        <li class="nav-item"><a href="/dashboard/account" class="nav-link">Account</a></li>
                    </ul>
                    <ul class="navbar-nav d-flex">
                        <li class="nav-item"><a href="/auth/logout" class="btn btn-primary">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </body>
</html>