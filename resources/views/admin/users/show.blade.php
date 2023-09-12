@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb d-flex justify-content-between align-items-center">
        <ol class="breadcrumb pt-1">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users / List</li>
        </ol>
        <a href="" type="button" class="btn btn-xs btn-outline-primary  btn-icon-tex">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Create User</a>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid d-flex justify-content-center w-100 p-0">
                        <div class="table-responsive w-100">
                            <h5>User Information</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Title</th>
                                        <th class="text-start">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-start">
                                        <td>1</td>
                                        <td>Name</td>
                                        <td>:{{$user->name}}</td>
                                    </tr>
                                    <tr class="text-start">
                                        <td>2</td>
                                        <td>Username</td>
                                        <td>:{{$user->username}}</td>
                                    </tr>
                                    <tr class="text-start">
                                        <td>3</td>
                                        <td>Mobile</td>
                                        <td>:{{$user->mobile}}</td>
                                    </tr>
                                    <tr class="text-start">
                                        <td>4</td>
                                        <td>Blance</td>
                                        <td>:৳ {{$user->balance}}</td>
                                    </tr>
                                    <tr class="text-start">
                                        <td>5</td>
                                        <td>Club</td>
                                        <td>:{{$user->club->name}}</td>
                                    </tr>
                                    <tr class="text-start">
                                        <td>6</td>
                                        <td>Sponser</td>
                                        <td>:{{$user->sponser_id}}</td>
                                    </tr>
                                    <tr class="text-start">
                                        <td>7</td>
                                        <td>Created At</td>
                                        <td class="text-muted">
                                            <span class="d-flex align-items-center"> <i class="btn-icon-prepend"
                                                data-feather="calendar" style="width:16px"></i>
                                            {{ $user->created_at->format('d M Y') }}</span>
                                        <span class="d-flex align-items-center px-1"> <i class="btn-icon-prepend"
                                                data-feather="clock" style="width:16px"></i>
                                            {{ $user->created_at->format('g:i A') }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="py-2">
                        <a href="{{route('user.edit', $user->id)}}" type="button" class="btn btn-success btn-icon-text btn-sm">
                            <i class="btn-icon-prepend" data-feather="check-square"></i>
                            Edit
                        </a>
                        <a href="{{route('user.index')}}" class="btn btn-danger btn-icon-text btn-sm">
                            <i class="btn-icon-prepend" data-feather="trash"></i>
                            Delete
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('plugin-styles')
@endpush

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush
