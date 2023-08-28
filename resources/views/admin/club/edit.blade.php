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
                <div class="card-body p-3">

                    <form action="{{ route('club.update', $club->id) }}" method="POST" class="forms-sample">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <x-input-text label="Name" placeholder="Name" name="name" value="{{$club->name}}" />
                            </div>
                            <div class="col-sm-6">
                                <x-input-text label="Email" placeholder="Email" name="email" value="{{$club->email}}" />
                            </div>
                            <div class="col-sm-6">
                                <x-input-text label="Mobile" placeholder="Mobile" name="mobile" value="{{$club->mobile}}" />
                            </div>
                            <div class="col-sm-6">
                                <x-input-text label="Username" placeholder="Username" name="username" value="{{$club->username}}" />
                            </div>
                            <div class="col-sm-6">
                                <x-input-text label="Club Woner" placeholder="Club Woner" name="club_owner" value="{{$club->club_owner}}" />
                            </div>
                            <div class="col-sm-6">
                                <x-input-text label="Club Mobile" placeholder="Club Mobile" name="club_mobile" value="{{$club->club_mobile}}" />
                            </div>
                            <div class="col-sm-6">
                                <x-input-text label="Club Address" placeholder="Club Address" name="club_address" value="{{$club->club_address}}" />
                            </div>
                            <div class="col-sm-6">
                                <x-input-text label="Club Commission" type="number" placeholder="Club Commission" name="club_commission" value="{{$club->club_commission}}" />
                            </div>
                            <div class="col-sm-6">
                                <label for="labeForStatus" class="form-label">Status</label>
                                <select name="status" id="labeForStatus" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>

                        </div>


                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </form>

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
