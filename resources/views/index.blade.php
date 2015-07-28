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

<!-- Following Menu -->
<div class="ui large top fixed hidden menu phpmga-menu-hidden">
    <div class="ui container">
        <a class="active item">Home</a>
        <a class="item">Sobre</a>
        <a class="item">Staff</a>
        <a class="item">Contato</a>
    </div>
</div>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar labeled icon menu phpmga-sidebar">
    <a class="item">
        <i class="home icon"></i>
        Home
    </a>
    <a class="item">
        <i class="block layout icon"></i>
        Sobre
    </a>
    <a class="item">
        <i class="users icon"></i>
        Staff
    </a>
    <a class="item">
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
                <a class="active item">Home</a>
                <a class="item">Sobre</a>
                <a class="item">Staff</a>
                <a class="item">Contato</a>
            </div>
        </div>
    </div>

    <div ng-view>

    </div>

    <div class="ui inverted vertical footer segment">
        <div class="ui container">
            <div class="ui stackable inverted divided equal height stackable grid">
                <div class="three wide column">
                    <h4 class="ui inverted header">About</h4>

                    <div class="ui inverted link list">
                        <a href="#" class="item">Sitemap</a>
                        <a href="#" class="item">Contact Us</a>
                        <a href="#" class="item">Religious Ceremonies</a>
                        <a href="#" class="item">Gazebo Plans</a>
                    </div>
                </div>
                <div class="three wide column">
                    <h4 class="ui inverted header">Services</h4>

                    <div class="ui inverted link list">
                        <a href="#" class="item">Banana Pre-Order</a>
                        <a href="#" class="item">DNA FAQ</a>
                        <a href="#" class="item">How To Access</a>
                        <a href="#" class="item">Favorite X-Men</a>
                    </div>
                </div>
                <div class="seven wide column">
                    <h4 class="ui inverted header">Footer Header</h4>
                    <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
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