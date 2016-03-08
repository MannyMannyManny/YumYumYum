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
    <?php
    if((isset(Auth::user()->name))||(isset(Auth::user()->email))) {
    ?>
    <div id="account_block">
        <span class="account_info">Logged in as: {!! isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email !!}</span>
        <span class="logout_link"><a href="/admin/logout">Logout</a></span>
    </div>
    <?php
    }
    ?>
    {!! HTML::image('image/logo.png', 'Semrush logo', array('class' => 'logo')); !!}
</div>
<div class="container">
    <div class="wrapper">
        <div class="horizontal-menu">
          <ul>
                <li><a href="/admin/" class="{{ Ekko::isActiveRoute('settings') }}">Dashboard</a></li>
                <li><a href="/admin/settings" class="{{ Ekko::isActiveRoute('settings') }}">Settings</a></li>
                <li><a href="/admin/users" class="{{ Ekko::areActiveRoutes(['admin.users.index', 'admin.users.store', 'admin.users.create', 'admin.users.update', 'admin.users.show', 'admin.users.destroy', 'admin.users.edit']) }}">Users</a></li>
            </ul>
        </div>
    @yield('content')
    </div>
</div>    
</body>
</html>
