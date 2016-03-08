@extends('/admin/layouts.app')

@section('content')
<div class="login-form">
    <form role="form" method="POST" action="{!! url('/admin/login') !!}">
        {!! csrf_field() !!}
        <div class="form-input">
            <label for="username">Username</label>
            <input type="text" name="username" value="{!! old('username') !!}">
        </div>

        <div class="form-input">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>

        @if ($errors->has())
            @foreach ($errors->all() as $error)
                <div class='warning'>{!! $error !!}</div>
            @endforeach
        @endif

        <div class="form-input">
            <button type="submit">Login</button>
        </div>

    </form>
</div>
@endsection
