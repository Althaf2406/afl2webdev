@extends('template.layout')

@section('title', 'Profile Page')

@section('content')
    <div class="container-fluid">
        <h1>My Profile</h1>
        <br>
        <br>
        <br>
        <form action="/company-partner" method="GET" class="form-inline w-25 d-flex gap-2">
            <input type="search" name="search" class="form-control" placeholder="Search">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <br>
        <button class="btn btn-primary" id="addCompanyPartner">
            Add Company Partners
        </button>
        <br>
        <br>
        {{-- add company partner --}}
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Email address</label>
                <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Input Company Name.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $partnerList->links('pagination::bootstrap-5') }}
    </div>
@endsection
