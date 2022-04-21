<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="{{asset('assets/md.bootstrap.timepicker/jquery.md.bootstrap.datetimepicker.style.css')}}" rel="stylesheet"/>
    @stack('css')
</head>
<body>
<div class="topmenu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">



    <div class="col-md-6 link">

        @auth()
            <a href="{{ route('index') }}" class="login">نمایش لیست</a>
            <a href="{{route('home')}}" class="btn btn-primary" > رزرو</a>

            <button type="submit" onclick="logout()" class="logout">
                خروج</button>

            @else
            <a href="{{ route('login') }}" class="login">ورود به سایت</a>
            <a href="{{route('home')}}" class="btn btn-primary" > رزرو</a>
            @endauth
            <form method="post" type="hidden"  class="ok" action="{{route('logout')}}" >
                @csrf

            </form>
    </div>


            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="admin-container">
        <div class="row">

            <div class="col-md-10">
                @yield('content')
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/jquery3.6.js')}}"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('assets/md.bootstrap.timepicker/jquery.md.bootstrap.datetimepicker.js')}}"></script>
@stack('js')
<script>
    function logout(){
        $(".ok").submit();
    }
</script>
</body>
</html>
