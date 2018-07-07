<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/app.css">

</head>
<body>
<div class="container-fluid" id="app">
    <div class="row">
        <div class="col-md">
            {{--<youtube-dash></youtube-dash>--}}
            <router-view></router-view>
        </div>
    </div>
</div>

<script src="js/app.js"></script>
</body>
</html>
