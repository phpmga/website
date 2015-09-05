<!doctype html>
<html lang="{{app('translator')->locale()}}">

<head>
    <meta charset="UTF-8">
    <title>@if($team['name']){{$team['name']}}@else{{'Lumen Slackin'}}@endif</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if($team['icon'])
        <link rel="icon" href="{{$team['icon']['image_132']}}"/>
    @endif

    <script type="text/javascript">
        var app = app||{};
        app.config = app.config||{};
        app.config.debug = Number.parseInt("{{env('APP_DEBUG')}}");
    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2" >
            <div id="logo">
                <img src="{{$team['icon']['image_132']}}" />
            </div>

            <div id="message">
                {!! trans('slackin.join', ['team' => $team['name']]) !!}
            </div>

            @if(isset($totals, $totals['active'], $totals['total']))
                <div id="status" >
                    {!! trans_choice('slackin.users_online', $totals['active'], $totals) !!}
                </div>
            @endif

            <div id="form-invite" class="col-sm-6 col-sm-offset-3">
                <div id="validation-message"></div>

                <form action="{{ URL::to('slack/invite') }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field()  }}

                    <div class="form-group">
                        <input class="form-control input-sm" type="text" name="username" placeholder="{{trans('slackin.placeholders.username')}}" autofocus="true"/>
                        <div class="help-block">

                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control input-sm" type="text" name="email" placeholder="{{trans('slackin.placeholders.email')}}"/>
                        <div class="help-block">

                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control input-sm btn btn-default" value="{{trans('slackin.submit')}}"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>