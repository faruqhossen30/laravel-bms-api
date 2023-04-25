@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">updata</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <form action="" method="get" class="d-flex">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                            <input type="text" class="form-control mx-1" name="username" placeholder="Mobile">
                            <select name="" id="" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            <div>
                                <button type="button" class="btn btn-primary btn-icon-text mx-1">
                                    Filter
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        User
                                    </th>
                                    <th>
                                        Method
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                    <th>
                                        Account
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($withdraws as $item)
                                    <!-- Small modal -->

                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('withdraw.update', $item->id) }}" method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="btn-close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            @csrf
                                                            @method('PUT')
                                                            <ul class="list-group">
                                                                <li class="list-group-item">User:
                                                                    {{ $item->user->username }}</li>
                                                                <li class="list-group-item">Method: {{ $item->method }}</li>
                                                                <li class="list-group-item">Number: {{ $item->account }}
                                                                </li>
                                                                <li class="list-group-item">Amount: {{ $item->amount }}</li>
                                                            </ul>
                                                            <label for="" class="py-2">Status</label>
                                                            <Select class="form-control" name="status">
                                                                <option value="">Select</option>
                                                                <option value="pending"
                                                                    @if ($item->status == 'pending') selected @endif>
                                                                    Pending</option>
                                                                <option value="complete"
                                                                    @if ($item->status == 'complete') selected @endif>
                                                                    Complete</option>
                                                                <option value="cancel"
                                                                    @if ($item->status == 'cancel') selected @endif>Cancel
                                                                </option>
                                                            </Select>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <tr>
                                        <td>
                                            {{ $withdraws->firstItem() + $loop->index }}
                                            {{-- {{$serial++}} --}}
                                        </td>
                                        <td>
                                            {{ $item->user->username }}
                                        </td>
                                        <td>
                                            {{ $item->method }}
                                        </td>
                                        <td>
                                            {{ $item->amount }}TK
                                        </td>
                                        <td>
                                            {{ $item->account }}
                                        </td>
                                        <td>
                                            {{ $item->status }}
                                        </td>
                                        <td>
                                            @if ($item->status == 'pending')
                                                {{-- <a href="{{ route('withdraw.edit', $item->id) }}" type="button"
                                                    class="btn btn-primary btn-icon btn-xs">
                                                    <i data-feather="check-square"></i>
                                                </a> --}}

                                                <button type="button" class="btn btn-primary btn-icon btn-xs"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i data-feather="check-square"></i>
                                                </button>
                                                <form action="{{ route('withdraw.destroy', $item->id) }}" method="post"
                                                    style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Sure ! Delete label ?')"
                                                        class="btn btn-danger btn-xs btn-icon">
                                                        <i data-feather="trash"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <span><i data-feather="check-circle" class="text-success"></i></span>
                                            @endif

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
