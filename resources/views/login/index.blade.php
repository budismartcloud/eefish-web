<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EEFISH</title>

    <!-- Bootstrap -->
    <link href="{{asset('public/assets/template/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('public/assets/template/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('public/assets/template/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('public/assets/template/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('public/assets/template/build/css/custom.min.css')}}" rel="stylesheet">

    <!-- External Lib -->
    <script src="{{asset('public/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('public/assets/core/core.js')}}"></script>
    <link a href="{{asset('public/assets/core/ajax.css')}}" rel="stylesheet" type="text/css">
    <link a href="{{asset('public/assets/core/style.css')}}" rel="stylesheet" type="text/css">

    <style type="text/css">
        body {
            background: #0D3349;
        }

        .login {
            background: #0D3349;
            color: #f0f0f0;
        }
    </style>

</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">

                <img src="{{asset('public/img/logo.png')}}" width="200" height="200">

                <form action="" method="POST" onsubmit="return false" id="form-konten">
                    <h1>EEFISH Login</h1>

                    <div id="messages"></div>

                    <div>
                        <input type="text" class="form-control" name="username" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                    </div>
                    <div>
                        <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                        <button class="btn btn-success form-control" type="submit" style="color: #0D3349">Login</button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <p>© EEFISH Developer Team 2017</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

<script>
    $('#form-konten').submit(function () {
        var data = getFormData('form-konten');
        ajaxTransfer('{{url('/login/validate')}}', data, '#messages');
    });


    function movePage()
    {
        redirect(1000, "{{url('/')}}");
    }
</script>
</body>
</html>
