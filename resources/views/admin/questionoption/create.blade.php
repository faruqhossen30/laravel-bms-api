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
                <div class="card-body p-3">
                    <div>
                        <a href="{{ route('matche.index') }}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="list"></i>
                            Match List
                        </a>
                    </div>
                    <hr>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <p><strong>Opps Something went wrong</strong></p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form
                        action="{{ route('questionoption.store', ['matche_id' => $matche_id, 'question_id' => $question_id]) }}"
                        method="POST" class="forms-sample">
                        @csrf
                        <input type="hidden" name="matche_id" value="{{ $matche_id }}">
                        <input type="hidden" name="matche_question_id" value="{{ $question_id }}">
                        <div class="row">
                            <x-input-text label="Qusetion Title" placeholder="Qusetion Title" name="title" />
                            {{-- <x-input-text label="Bet Rate" placeholder="1.5" name="bet_rate" type='number' /> --}}
                            <div class="mb-3">
                                <label for="bet_rate" class="form-label">Bet Rate</label>
                                <input type="number" class="form-control" id="bet_rate" autocomplete="off"
                                    placeholder=".15" name="bet_rate" step="0.01">

                                @error('bet_rate')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror
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
