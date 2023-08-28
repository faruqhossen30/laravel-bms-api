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
                    <div class="d-flex justify-content-between">
                        <form action="" method="get" class="d-flex">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                            <input type="text" class="form-control" name="username" placeholder="Mobile">
                            <select name="" id="" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            <div>
                                <button type="button" class="btn btn-primary btn-icon-text">
                                    Filter
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Mobile</th>
                                    <th>Balance</th>
                                    <th>Status</th>
                                    <th>Join Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td> {{ $users->firstItem() + $loop->index }} </td>
                                        <td> {{ $item->name }} </td>
                                        <td> {{ $item->username }} </td>
                                        <td> {{ $item->mobile }} </td>
                                        <td> {{ $item->balance }} </td>
                                        <td> {{ $item->status }} </td>
                                        <td> {{ $item->created_at->format('d M Y') }} </td>
                                        <td>
                                            <form action="{{ route('user.destroy', $item->id) }}" method="post"
                                                style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Sure ! Delete user ?')"
                                                    class="btn btn-danger btn-xs btn-icon">
                                                    <i data-feather="trash"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('user.edit', $item->id) }}" type="button"
                                                class="btn btn-warning btn-xs btn-icon">
                                                <i data-feather="check-square"></i>
                                            </a>
                                            <a href="{{ route('user.show', $item->id) }}" type="button"
                                                class="btn btn-success btn-xs btn-icon">
                                                <i data-feather="eye"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
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
