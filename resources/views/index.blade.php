<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="Anderson Costa">

    <title>Laravel & Angular</title>

    <link href='{{ elixir('css/vendor.css') }}' rel='stylesheet' type='text/css'>
    <link href='{{ elixir('css/main.css') }}' rel='stylesheet' type='text/css'>
</head>
<body>

<div ng-view>

</div>

<script src="{{ elixir('js/vendor.js') }}"></script>
<script src="{{ elixir('js/main.js') }}"></script>

<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/app.controllers.js') }}"></script>

</body>
</html>