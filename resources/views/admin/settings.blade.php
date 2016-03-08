@extends('admin.layouts.app')

@section('content')

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='warning'>{!! $error !!}</div>
        @endforeach
    @endif

    <h1>Settings</h1>

    {!! Form::open(['role' => 'form', 'url' => '/admin/settings', 'class' => 'edit-form']) !!}
    
    <div class='form-input'>
        {!! Form::label('fbkey', 'Facebook API App key') !!}
        {!! Form::text('fbkey', $fbapi['value'], ['placeholder' => 'Facebook API App key', 'class' => 'form-control']) !!}
    </div>

    <div class='form-input'>
        {!! Form::submit('Save', ['class' => 'btn']) !!}
    </div>

    {!! Form::close() !!}
    
@endsection
