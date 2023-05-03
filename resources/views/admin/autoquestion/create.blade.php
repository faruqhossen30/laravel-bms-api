@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Autoquestion</li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body p-3">
                    <div>
                        <a href="{{ route('autoquestion.index') }}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="list"></i>
                            Autoquestion List
                        </a>
                    </div>
                    <hr>

                    <form action="{{ route('autoquestion.store') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="row">
                            <x-input-text label="Question" placeholder="Question" name="title" />
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="formatchtype" class="form-label">Game</label>
                                    <select name="game_id" id="formatchtype"
                                        class="form-control @error('game_id') is-invalid @enderror">
                                        <option value="">select</option>
                                        @foreach ($games as $game)
                                            <option value="{{ $game->id }}">{{ $game->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('game_id')
                                        <span class="text-danger">{{ $message }}</span> <br>
                                    @enderror
                                </div>
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
                        <div class="row">
                            <div>
                                <button id="add_option_more" type="button" class="btn btn-sm btn-primary btn-icon-text">
                                    <i class="btn-icon-prepend" data-feather="plus-circle"></i>
                                    Add Option
                                </button>
                            </div>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered"  id="question-options">
                                    <thead>
                                        <tr>
                                            <th>
                                                Number
                                            </th>
                                            <th>
                                                Bank
                                            </th>
                                            <th>
                                                Type
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td><input type="text" name="option[0][name]" value="Team-1"
                                                    placeholder="Enter Option" class="form-control" required /></td>
                                            <td><input type="number" step="any" name="option[0][bet_rate]"
                                                    placeholder="Enter Bet Rate" class="form-control" required /></td>
                                            <td><select name="option[0][status]" class="form-control">
                                                    <option value="1" selected>Active</option>
                                                    <option value="0">Deactive</option>
                                                </select></td>
                                            <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="option[1][name]" value="Team-2"
                                                    placeholder="Enter Option" class="form-control" required /></td>
                                            <td><input type="number" step="any" name="option[1][bet_rate]"
                                                    placeholder="Enter Bet Rate" class="form-control" required /></td>
                                            <td><select name="option[1][status]" class="form-control">
                                                    <option value="1" selected>Active</option>
                                                    <option value="0">Deactive</option>
                                                </select></td>
                                            <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <input type="hidden" value="1" id="option-last-id">
                        <div class="py-2">
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
                        </div>
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
    <script>
        $(document).ready(function() {
            //Auto Question
            var i = $('#option-last-id').val();
            $("#add_option_more").click(function() {
                ++i;
                $("#question-options").append('<tr><td><input type="text" name="option[' + i +
                    '][name]" placeholder="Enter Option" class="form-control" required/></td><td><input type="number" step="any" name="option[' +
                    i +
                    '][bet_rate]" placeholder="Enter Bet Rate" class="form-control" required/></td><td><select name="option[' +
                    i +
                    '][status]" class="form-control"><option value="1" selected>Active</option><option value="0">Deactive</option></select></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
                );
            });

            $(document).on('click', '.remove-tr', function(event) {
                $(this).parents('tr').remove();
            });
        });
    </script>
@endpush
