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
                    <div>
                        <a href="{{route('deposit.create')}}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="plus-circle"></i>
                            Add Payment Gateway
                        </a>
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
                                        Debit
                                    </th>
                                    <th>
                                        Credit
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Balance
                                    </th>
                                    <th>
                                        Time
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $item)
                                    <tr>
                                        <td>
                                            {{$transactions->firstItem() + $loop->index}}
                                        </td>
                                        <td>{{$item->user->username}}</td>
                                        <td>{{$item->debit}}</td>
                                        <td>{{$item->credit}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>{{$item->balance}}</td>
                                        <td>{{$item->created_at}}</td>
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
