@extends('admin.layouts.app')

@section('content')

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
                    <td><a class="btn" href="/admin/users/{!! $user->id !!}/edit">Edit</a><a class="btn" href="/admin/users/{!! $user->id !!}/delete">Delete</a></td>
                </tr>
                @endforeach
            </tbody>

        </table>

@endsection