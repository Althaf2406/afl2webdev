@extends('template.layout')

@section('title', 'Beranda - Tambang Pasir Jambi')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Welcome to the Index Page</h1>
        <p>This is the main view for your Laravel application.</p>
        <a href="{{ url('/create') }}" class="btn btn-primary">Create New</a>
    </div>

@endsection