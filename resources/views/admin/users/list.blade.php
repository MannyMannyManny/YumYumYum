@extends('admin.layouts.app')

@section('title') Users @stop

@section('content')

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
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
                    <td>{!! $user->created_at !!}</td>
                    <td>{!! $user->updated_at !!}</td>
                </tr>
                @endforeach
            </tbody>

        </table>

@stop