<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Web Site da Comunidade PHP Maringá">
    <meta name="author" content="Comunidade PHP Maringá">

    <title>Comunidade PHP Maringá</title>

    <link href='http://fonts.googleapis.com/css?family=Lato:100,400,700' rel='stylesheet' type='text/css'>

    <link href='{{ elixir('css/vendor.css') }}' rel='stylesheet' type='text/css'>
    <link href='{{ elixir('css/main.css') }}' rel='stylesheet' type='text/css'>
</head>
<body>


<div class="ui container">
    <div class="ui secondary  menu">
        <a href="/#/" class="active item">Home</a>
        <a href="/#/about" class="item">Sobre</a>
        <div class="right menu">
            <div class="item">
                <div class="ui icon input">
                    <input type="text" placeholder="Localizar...">
                    <i class="search link icon"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div ng-view>

</div>

<script src="{{ elixir('js/vendor.js') }}"></script>
<script src="{{ elixir('js/main.js') }}"></script>

<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/app.controllers.js') }}"></script>

</body>
</html>