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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e2eb6553b9.js" crossorigin="anonymous"></script>
    <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>
    <script src="{{ PublicPath('./assets/js/jquery-3.6.0.min.js') }}" type="text/javascript"></script>
    <script src="{{ PublicPath('./assets/js/main.js') }}" type="module"></script>
</head>

<body>
    <div class="container welcome">
        <div class="row">
            <div class="col s12 m4">
                <h1><a href="/">Glint</a></h1>
                <h5><small class="text-muted">Bite-sized intel delivered</small></h5>
            </div>
            <div class="col m8 d-sm-none d-md-block">
                <ul class="float-end nav">
                    <li><a href="/china">China <img src="{{ PublicPath('flags/china_flag.png') }}"></img></a></li>
                    <li><a href="/dprk">DPRK <img src="{{ PublicPath('flags/dprk_flag.png') }}"></img></a></li>
                    <li><a href="/countries">All</a></li>
                </ul>
            </div>
        </div>
    </div>
	@yield('content')
</body>

</html>
