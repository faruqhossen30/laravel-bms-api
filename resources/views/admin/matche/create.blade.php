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

                    <form action="{{ route('matche.store') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <x-input-text label="Team One" placeholder="Team One" name="team_one" />
                            </div>
                            <div class="col-sm-6">
                                <x-input-text label="Team Two" placeholder="Team Two" name="team_two" />
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="fornumber" class="form-label">Team One Flag</label>
                                    <select name="team_one_flag" id=""
                                        class="form-control @error('team_one_flag') is-invalid @enderror">
                                        <option value="">select</option>
                                        @foreach ($countries as $item)
                                            <option value="{{ $item->flag_url }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('team_one_flag')
                                        <span class="text-danger">{{ $message }}</span> <br>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="fornumber" class="form-label">Team Two Flag</label>
                                    <select name="team_two_flag" id=""
                                        class="form-control @error('team_two_flag') is-invalid @enderror">
                                        <option value="">select</option>
                                        @foreach ($countries as $item)
                                            <option value="{{ $item->flag_url }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('team_two_flag')
                                        <span class="text-danger">{{ $message }}</span> <br>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <x-input-text label="Statement" placeholder="Statement" name="statement" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Date & Time</label>
                                {{-- <x-input-text label="Date & Time" placeholder="Date & Time" name="date_time"
                                    type="datetime-local" /> --}}
                                    <input class="form-control" type="datetime-local" name="date_time" id="">
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="formatchtype" class="form-label">Match Type</label>
                                    <select name="game_id" id="formatchtype"
                                        class="form-control @error('game_id') is-invalid @enderror">
                                        <option value="">select</option>
                                        @foreach ($games as $game)
                                            <option value="{{$game->id}}">{{$game->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('game_id')
                                        <span class="text-danger">{{ $message }}</span> <br>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="auto_question" class="form-label">Auto Question</label>
                                    <select name="auto_question" id="auto_question"
                                        class="form-control @error('auto_question') is-invalid @enderror">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    @error('auto_question')
                                        <span class="text-danger">{{ $message }}</span> <br>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <x-input-text label="Note" placeholder="Note" name="note" />
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option value="live">Live</option>
                                        <option value="upcoming">Upcoming</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span> <br>
                                    @enderror
                                </div>
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
