<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/sanitaize.css">
    <link rel="stylesheet" href="css/common.css">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__logo">
            <a href="/" class="header__logo-link">Todo</a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>
