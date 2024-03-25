@extends('layouts.layout')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/user">Users</a></li>
            <li class="breadcrumb-item active">Create Users</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <input type="text" name="name" placeholder="Enter Name" class="form-control mb-4"/>
                    <input type="email" name="email" placeholder="Enter Email" class="form-control mb-4"/>
                    <input type="password" name="password" placeholder="Enter Password" class="form-control mb-4"/>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection