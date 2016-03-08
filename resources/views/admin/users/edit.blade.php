@extends('admin.layouts.app')

@section('content')

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='warning'>
                {!! $error !!}
            </div>
        @endforeach
    @endif

    <h1>Edit User</h1>

    {!! Form::model($user, ['role' => 'form', 'url' => '/admin/users/' . $user->id, 'method' => 'PUT', 'class' => 'edit-form']) !!}

    <div class='form-input'>
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
    </div>

    <div class='form-input'>
        {!! Form::label('username', 'Username') !!}
        {!! Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control', 'disabled']) !!}
    </div>

    <div class='form-input'>
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
    </div>

    <div class='form-input'>
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
    </div>

    <div class='form-input'>
        {!! Form::label('password_confirmation', 'Confirm Password') !!}
        {!! Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
    </div>

    <div class='form-input'>
        {!! Form::submit('Save', ['class' => 'btn']) !!}
    </div>

    {!! Form::close() !!}

@endsection