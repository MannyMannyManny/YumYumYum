@extends('admin.layouts.app')

@section('content')
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='warning'>
                {!! $error !!}
            </div>
        @endforeach
    @endif
    
        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{!! $user->id !!}</td>
                    <td>{!! $user->name !!}</td>
                    <td>{!! $user->username !!}</td>
                    <td>{!! $user->email !!}</td>
                    <td>{!! $user->created_at !!}</td>
                    <td>{!! $user->updated_at !!}</td>
                    <td>
                        <a class="btn" href="/admin/users/{!! $user->id !!}/edit">Edit</a>
                        {!! Form::open(['url' => '/admin/users/' . $user->id, 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <a class="btn" href="/admin/users/create">Create New</a>
@endsection