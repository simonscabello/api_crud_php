<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('shortcuticon')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


    <title>@yield('title')</title>

    <style>
        body {
            background-color: whitesmoke;
        }

        .container {
            max-width: 760px;
        }

        form {
            max-width: 760px;
            padding: 16px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: white;
            margin-top: 15px;
            box-shadow: 1px 2px 5px black;
        }

        header {
            color: black;
            text-align: center;
            margin: 20px;
        }

        header h1 {
            font-family: 'Roboto', sans-serif;
        }

        .btn-primary {
            display: flex;
            margin-left: calc(100% - 93px);
            margin-top: 30px;
        }


        ul {
            list-style-type: none;
        }

        .alert {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

    </style>
</head>

<body>
        @yield('read')
    <div class="container">
        @yield('header')
        @yield('formulario')
    </div>
</body>

</html>