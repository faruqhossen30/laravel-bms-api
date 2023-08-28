@extends('admin.layout.master')

@push('plugin-styles')
    <link href="{{ asset('admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group date datepicker wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                <span class="input-group-text input-group-addon bg-transparent border-primary"><i data-feather="calendar"
                        class=" text-primary"></i></span>
                <input type="text" class="form-control border-primary bg-transparent">
            </div>
            <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="printer"></i>
                Print
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                Download Report
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <x-admin.dashboardcard icon='users' label='All Users' value='500' class="bg-success"/>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/assets/js/datepicker.js') }}"></script>
@endpush
