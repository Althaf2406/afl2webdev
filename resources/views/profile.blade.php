@extends('template.layout')

@section('title', 'Profile Page')

@section('content')
    <div class="container-fluid">
        <h1>My Profile</h1>
        <table class="table table-borderless">
            <tr>
                <td>Name</td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td>Password</td>
                <td>{{ $user->password }}</td>
            </tr>
        </table>
    </div>
@endsection
