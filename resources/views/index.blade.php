<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Web Site da Comunidade PHP Maringá">
    <meta name="author" content="Comunidade PHP Maringá">

    <title>Comunidade PHP Maringá</title>

    <link href='http://fonts.googleapis.com/css?family=Lato:100,400,700' rel='stylesheet' type='text/css'>

    <link href='{{ elixir('css/vendor.css') }}' rel='stylesheet' type='text/css'>
    <link href='{{ elixir('css/main.css') }}' rel='stylesheet' type='text/css'>
</head>
<body>

<!-- Following Menu -->
<div class="ui large top fixed hidden menu phpmga-menu-hidden">
    <div class="ui container">
        <a href="#phpmga_background" du-smooth-scroll du-scrollspy class="item">Home</a>
        <a href="#container-about" du-smooth-scroll du-scrollspy class="item">Sobre</a>
        <a href="#container-staff" du-smooth-scroll du-scrollspy class="item">Staff</a>
        <a href="#container-contact" du-smooth-scroll du-scrollspy class="item">Contato</a>
    </div>
</div>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar labeled icon menu phpmga-sidebar">
    <a href="#phpmga_background" du-smooth-scroll du-scrollspy class="item">
        <i class="home icon"></i>
        Home
    </a>
    <a href="#container-about" du-smooth-scroll du-scrollspy class="item">
        <i class="block layout icon"></i>
        Sobre
    </a>
    <a href="#container-staff" du-smooth-scroll du-scrollspy class="item">
        <i class="users icon"></i>
        Staff
    </a>
    <a href="#container-contact" du-smooth-scroll du-scrollspy class="item">
        <i class="mail icon"></i>
        Contato
    </a>
</div>

<!-- Page Contents -->
<div class="pusher">
    <div id="phpmga_background" class="ui inverted vertical masthead center aligned">
        <div class="ui container">
            <div class="ui large secondary inverted pointing menu phpmga-menu">
                <a class="toc item">
                    <i class="sidebar icon"></i>
                </a>
                <a href="#phpmga_background" du-smooth-scroll du-scrollspy class="active item">Home</a>
                <a href="#container-about" du-smooth-scroll du-scrollspy class="item">Sobre</a>
                <a href="#container-staff" du-smooth-scroll du-scrollspy class="item">Staff</a>
                <a href="#container-contact" du-smooth-scroll du-scrollspy class="item">Contato</a>
            </div>
        </div>
        <div class="start-menu"></div>
    </div>

    <div ng-view>

    </div>

    <div class="ui inverted vertical footer segment">
        <div class="ui container">
            <div class="ui stackable inverted divided equal height grid">
                <div class="three wide column"></div>
                <div class="six wide column">
                    <p>Feito por artesãos da cidade verde.</p>
                    <div class="ui inverted link list">
                        <a href="https://github.com/phpmga" class="item" target="_blank"><i class="big github icon"></i></a>
                    </div>
                </div>
                <div class="four wide column">
                    <h4 class="ui inverted header">Fique por dentro!</h4>

                    <div class="ui action input">
                        <input type="text" placeholder="$email = ">
                        <button class="ui button">Assinar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ elixir('js/vendor.js') }}"></script>
<script src="{{ elixir('js/main.js') }}"></script>

<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/app.controllers.js') }}"></script>

</body>
</html>