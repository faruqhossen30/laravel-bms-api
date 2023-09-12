@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Club Create</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="col-6">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-start align-items-center">
                                <span><i data-feather="user"></i></span>
                                <span class="px-2"> Name : {{ $club->name }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-start align-items-center">
                                <span><i data-feather="user"></i></span>
                                <span class="px-2"> Username : {{ $club->username }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-start align-items-center">
                                <span><i data-feather="phone-call"></i></span>
                                <span class="px-2"> Mobile : {{ $club->mobile }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-start align-items-center">
                                <span><i data-feather="dollar-sign"></i></span>
                                <span class="px-2"> Balance : {{ $club->balance }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-start align-items-center">
                                <span><i data-feather="users"></i></span>
                                <span class="px-2"> Total User : {{ $totalusers }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-start align-items-center">
                                <span><i data-feather="user"></i></span>
                                <span class="px-2"> Club Woner : {{ $club->club_owner }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-start align-items-center">
                                <span><i data-feather="user"></i></span>
                                <span class="px-2"> Mobile : {{ $club->club_mobile }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-start align-items-center">
                                <span><i data-feather="user"></i></span>
                                <span class="px-2"> Commission : {{ $club->club_commission }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-start align-items-center">
                                <span><i data-feather="user"></i></span>
                                <span class="px-2"> Status : {{ $club->status }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-start align-items-center">
                                <span><i data-feather="user"></i></span>
                                <span class="px-2"> Created : {{ $club->created_at->format('d M Y, h:i:s A') }}</span>
                            </li>
                        </ul>
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
