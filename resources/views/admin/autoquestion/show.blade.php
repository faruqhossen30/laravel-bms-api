@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Auto Question</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h6>Question: {{ $question->title }} ?</h6>
                        <p>Game: Boxing</p>
                        <span>Status: @if ($question->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Deactive</span>
                            @endif
                        </span>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100 p-0">
                        <div class="table-responsive w-100">
                            <h5>Question Options</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Option</th>
                                        <th class="text-end">Rate</th>
                                        <th class="text-end">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $serial = 1;
                                    @endphp
                                    @foreach ($question->options as $option)
                                        <tr class="text-end">
                                            <td class="text-start">{{$serial++}}</td>
                                            <td class="text-start">{{ $option->title }}</td>
                                            <td>{{ $option->bet_rate }}</td>
                                            <td>
                                                @if ($option->status)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Deactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="py-2">
                        <a href="{{route('autoquestion.edit', $question->id)}}" type="button" class="btn btn-success btn-icon-text btn-sm">
                            <i class="btn-icon-prepend" data-feather="check-square"></i>
                            Edit
                        </a>
                        <a href="{{route('autoquestion.index')}}" class="btn btn-danger btn-icon-text btn-sm">
                            <i class="btn-icon-prepend" data-feather="arrow-left-circle"></i>
                            Back
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
