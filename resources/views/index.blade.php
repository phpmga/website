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

<!-- Google Analytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-66920404-1', 'auto');
    ga('send', 'pageview');

</script>

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
                    <div class="ui inverted horizontal link list">
                        <a href="https://www.facebook.com/pages/PhpMga/492166247613145" class="item" target="_blank"><i class="big facebook icon"></i></a>
                        <a href="https://github.com/phpmga" class="item" target="_blank"><i class="big github icon"></i></a>
                        <a href="http://php.net/manual/pt_BR/install.php" class="item" target="_blank">
                            <img src="images/php-logo.png" width="32px" class="ui image"/>
                        </a>
                    </div>
                </div>
                <div class="four wide column">
                    <form id="newsletter" class="ui form" method="post" action="/email/news">
                        <h4 class="ui inverted header">Fique por dentro!</h4>

                        <div class="ui error message">
                            <div class="header">Ocorreu um erro!</div>
                            <p>Não foi possível assinar a newsletter, tente novamente mais tarde.</p>
                        </div>
                        <div class="ui success message">
                            <div class="header">Sucesso!</div>
                            <p>Obrigado por assinar nossa newsletter, aguarde novidades!</p>
                        </div>

                        <div class="ui action input">
                            <input type="text" name="email" placeholder="$email = ">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="ui button" type="submit">Assinar</button>
                        </div>
                    </form>
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