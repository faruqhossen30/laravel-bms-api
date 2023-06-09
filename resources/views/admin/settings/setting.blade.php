@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Settings</a></li>
            <li class="breadcrumb-item active" aria-current="page">updata</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-5 col-md-3 pe-0">
            <div class="nav nav-tabs nav-tabs-vertical" id="v-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active " id="v-website-tab" data-bs-toggle="tab" href="#v-website" role="tab"
                    aria-controls="v-home" aria-selected="true"><span class="input-group"><i data-feather="chrome"
                            class="me-2"></i>Website Title</span></a>
                <a class="nav-link" id="v-footernotice-tab" data-bs-toggle="tab" href="#v-footernotice" role="tab"
                    aria-controls="v-home" aria-selected="true"><span class="input-group"><i data-feather="chrome"
                            class="me-2"></i>Footer Notice</span></a>


                <a class="nav-link " id="v-contact-tab" data-bs-toggle="tab" href="#v-contact" role="tab"
                    aria-controls="v-contact" aria-selected="false"><span class="input-group"><i data-feather="home"
                            class="me-2"></i>contact</a>

                <a class="nav-link " id="v-headernotice-tab" data-bs-toggle="tab" href="#v-headernotice" role="tab"
                    aria-controls="v-headernotice" aria-selected="false"><span class="input-group"><i data-feather="gift"
                            class="me-2"></i>Header Notice</a>

                <a class="nav-link " id="v-deposit-tab" data-bs-toggle="tab" href="#v-deposit" role="tab"
                    aria-controls="v-deposit" aria-selected="false"><span class="input-group"><i data-feather="dollar-sign"
                            class="me-2"></i>Minimum Deposit</a>

                <a class="nav-link " id="v-withdrawrate-tab" data-bs-toggle="tab" href="#v-withdrawrate" role="tab"
                    aria-controls="v-withdrawrate" aria-selected="false"><span class="input-group"><i
                            data-feather="dollar-sign" class="me-2"></i>Withdraw Limit</a>

                <a class="nav-link " id="v-clubcommission-tab" data-bs-toggle="tab" href="#v-clubcommission" role="tab"
                    aria-controls="v-clubcommission" aria-selected="false"><span class="input-group"><i data-feather="dollar-sign"
                            class="me-2"></i>Club Commission</a>
                <a class="nav-link " id="v-sponsercommission-tab" data-bs-toggle="tab" href="#v-sponsercommission" role="tab"
                    aria-controls="v-sponsercommission" aria-selected="false"><span class="input-group"><i data-feather="dollar-sign"
                            class="me-2"></i>Sponser Commission</a>


            </div>
        </div>
        <div class="col-7 col-md-9 ps-0">
            <div class="tab-content tab-content-vertical border p-3" id="v-tabContent">
                <div class="tab-pane fade show active" id="v-website" role="tabpanel" aria-labelledby="v-website-tab">
                    @include('admin.settings.inc.website-title')
                </div>
                <div class="tab-pane fade show" id="v-footernotice" role="tabpanel" aria-labelledby="v-footernotice-tab">
                    @include('admin.settings.inc.footernotice')
                </div>
                <div class="tab-pane fade" id="v-contact" role="tabpanel" aria-labelledby="v-contact-tab">
                    @include('admin.settings.inc.contact')
                </div>

                <div class="tab-pane fade" id="v-headernotice" role="tabpanel" aria-labelledby="v-headernotice-tab">
                    @include('admin.settings.inc.headernotice')
                </div>
                <div class="tab-pane fade" id="v-deposit" role="tabpanel" aria-labelledby="v-deposit-tab">
                    @include('admin.settings.inc.deposit')
                </div>
                <div class="tab-pane fade" id="v-withdrawrate" role="tabpanel" aria-labelledby="v-withdrawrate-tab">
                    @include('admin.settings.inc.withdrawrate')
                </div>
                <div class="tab-pane fade" id="v-clubcommission" role="tabpanel" aria-labelledby="v-clubcommission-tab">
                    @include('admin.settings.inc.clubcommission')
                </div>
                <div class="tab-pane fade" id="v-sponsercommission" role="tabpanel" aria-labelledby="v-sponsercommission-tab">
                    @include('admin.settings.inc.sponsercommission')
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
