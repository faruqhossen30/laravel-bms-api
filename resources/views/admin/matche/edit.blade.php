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
                                <x-input-text label="Team One" placeholder="Team One" name="team_one" value="{{$match->team_one}}" />
                            </div>
                            <div class="col-sm-6">
                                <x-input-text label="Team Two" placeholder="Team Two" name="team_two" value="{{$match->team_two}}" />
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="fornumber" class="form-label">Team One Flag</label>
                                    <select name="team_one_flag" id=""
                                        class="form-control @error('team_one_flag') is-invalid @enderror">
                                        <option value="">select</option>
                                        @foreach ($countries as $item)
                                            <option value="{{ $item->flag_url }}" @if ($item->flag_url == $match->team_one_flag) selected @endif >{{ $item->name }}</option>
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
                                            <option value="{{ $item->flag_url }}" @if ($item->flag_url == $match->team_two_flag) selected @endif >{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('team_two_flag')
                                        <span class="text-danger">{{ $message }}</span> <br>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <x-input-text label="Statement" placeholder="Statement" name="statement" value="{{$match->statement}}" />
                            </div>
                            <div class="col-sm-6">
                                <x-input-text label="Date & Time" placeholder="Date & Time" name="date_time"
                                    type="datetime-local" />
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="formatchtype" class="form-label">Match Type</label>
                                    <select name="match_type" id="formatchtype"
                                        class="form-control @error('match_type') is-invalid @enderror">
                                        <option value="">select</option>
                                        @foreach ($games as $game)
                                            <option value="{{$game->id}}" @if ($game->id == $match->game_id) selected @endif >{{$game->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('match_type')
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
                                <x-input-text label="Note" placeholder="Note" name="note" value="{{$match->note}}" />
                            </div>
                            <div class="col-sm-6">
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
