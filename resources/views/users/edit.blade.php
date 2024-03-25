@extends('layouts.layout')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/user">Users</a></li>
            <li class="breadcrumb-item active">Edit Users</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('put')
                    <input type="text" value="{{ $user->name }}" name="name" placeholder="Enter Name" class="form-control mb-4"/>
                    <input type="email" value="{{ $user->email }}" name="email" placeholder="Enter Email" class="form-control mb-4"/>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection