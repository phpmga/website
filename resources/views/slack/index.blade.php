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

    <link href='http://fonts.googleapis.com/css?family=Lato:100,400,700' rel='stylesheet' type='text/css'>

    <link href='{{ elixir('css/vendor.css') }}' rel='stylesheet' type='text/css'>
    <link href='{{ elixir('css/main.css') }}' rel='stylesheet' type='text/css'>

    <script type="text/javascript">
        var app = app || {};
        app.config = app.config || {};
        app.config.debug = Number.parseInt("{{env('APP_DEBUG')}}");
    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .splash {
            width: 300px;
            margin: 200px auto;
            text-align: center;
            font-family: "Helvetica Neue", Helvetica, Arial
        }

        @media (max-width: 500px) {
            .splash {
                margin-top: 100px
            }
        }

        p {
            font-size: 15px;
            margin: 5px 0
        }

        button, input {
            font-size: 12px;
            height: 32px;
            line-height: 32px;
            vertical-align: middle;
            display: block;
            text-align: center;
            box-sizing: border-box;
            width: 100%
        }

        button {
            color: #fff;
            margin-top: 10px;
            font-weight: bold;
            border-width: 0;
            background: #37d376;
            text-transform: uppercase;
            cursor: pointer;
            appearence: none;
            -webkit-appearence: none;
            padding: 0;
            outline: 0;
            transition: background-color 150ms ease-in, color 150ms ease-in
        }

        button.loading {
            pointer-events: none
        }

        button:disabled {
            color: #9B9B9B;
            background-color: #D6D6D6;
            cursor: default;
            pointer-events: none
        }

        button.error {
            background-color: #F4001E
        }

        button.success:disabled {
            color: #fff;
            background-color: #68C200
        }

        button:not(.disabled):active {
            background-color: #7A002F
        }

        b {
            transition: transform 150ms ease-in
        }

        b.users-total {
            transform: scale(1.3)
        }

        form {
            margin-top: 20px;
            margin-bottom: 0
        }

        input {
            color: #9B9B9B;
            border: 1px solid #D6D6D6
        }

        input:focus {
            color: #666;
            border-color: #999;
            outline: 0
        }

        .users-online {
            color: #37d376
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="splash">
                <div id="logo">
                    <img src="{{$team['icon']['image_132']}}"/>
                </div>
                <p>{!! trans('slackin.join', ['team' => $team['name']]) !!}</p>

                @if(isset($totals, $totals['active'], $totals['total']))
                    <p class="status">
                        {!! trans_choice('slackin.users_online', $totals['active'], $totals) !!}
                    </p>
                @endif

                <form action="{{ URL::to('slack/invite') }}" method="post" class="form-horizontal" role="form">
                    <div id="validation-message"></div>
                    {{ csrf_field()  }}
                    <div class="form-group">
                        <input class="form-control input-sm" type="text" name="username"
                               placeholder="{{trans('slackin.placeholders.username')}}" autofocus="true" required/>

                        <div class="help-block">

                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control input-sm" type="text" name="email"
                               placeholder="{{trans('slackin.placeholders.email')}}" required/>

                        <div class="help-block">

                        </div>
                    </div>

                    <button type="submit">{{trans('slackin.submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ elixir('js/vendor.js') }}"></script>
<script>
    $('form').submit(function(e) {
        e.preventDefault ? e.preventDefault() : e.returnValue = false;

        var $form = $(this);
        var $button = $(this).find('button[type="submit"]');
        var $username = $form.find('input[name="username"]');
        var $email = $form.find('input[name="email"]');
        var $token = $form.find('input[name="_token"]');

        $email.parent().removeClass('error');

        $form.find('#validation-message').text('');

        $button.prop('disabled', true);

        $.post('/slack/invite', {
            'username': $username.val(),
            'email': $email.val(),
            '_token': $token.val()
        },
        function(data) {
            $email.val('');
            $button.prop('disabled', false);

            if(!!data.message) {
                $form.find('#validation-message').text(data.message);
            } else {
                if(!!data.email) {
                    $form.find('#validation-message').text(data.email.join(''));
                }
            }
        })
    });
</script>
</body>
</html>