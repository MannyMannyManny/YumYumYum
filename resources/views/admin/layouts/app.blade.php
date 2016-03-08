<!DOCTYPE html>
<html lang="en">
<head>
    {!! HTML::style('css/main.css'); !!}
    {!! HTML::style('css/admin.css'); !!}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin panel</title>

</head>
<body id="app-layout">
<div id="head" class="col-0 header">
    <div id="account_block">
        <span class="account_info">Logged in as: {!! isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email !!}</span>
        <span class="logout_link"><a href="#">Logout</a></span>
    </div>
    {!! HTML::image('image/logo.png', 'Semrush logo', array('class' => 'logo')); !!}
</div>
    @yield('content')
</body>
</html>
