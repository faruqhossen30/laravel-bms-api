@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Match List</li>
        </ol>
    </nav>
    <div class="mb-2">
        <a href="{{ route('matche.create') }}" type="button" class="btn btn-sm btn-primary btn-icon-text">
            <i class="btn-icon-prepend" data-feather="plus-circle"></i>
            Create Match
        </a>
    </div>

    <div class="row">
        <div class="col-12">
            @foreach ($matches as $match)
                <div class="accordion mb-2" id="accordionExample{{ $match->id }}">
                    <div class="accordion-item">
                        <div class="accordion-header d-flex justify-content-between align-items-center p-2 collapsed">
                            <div class="d-flex align-items-center" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $match->id }}" aria-expanded="false"
                                aria-controls="collapse{{ $match->id }}">
                                <div>
                                    <span class="btn btn-primary btn-icon rounded-circle"><i class="btn-icon-prepend"
                                            data-feather="grid"></i></span>
                                </div>
                                <div class="d-flex flex-column px-2">
                                    <span>{{ $match->team_one }} Vs {{ $match->team_two }}</span>
                                    <span class="text-muted tx-13">{{ $match->statement }}</span>
                                    <span class="d-flex align-items-center text-muted tx-13">
                                        <span class="d-flex align-items-center"> <i class="btn-icon-prepend"
                                                data-feather="calendar" style="width:16px"></i>
                                            {{ $match->date_time->format('d M Y') }}</span>
                                        <span class="d-flex align-items-center px-1"> <i class="btn-icon-prepend"
                                                data-feather="clock" style="width:16px"></i>
                                            {{ $match->date_time->format('g:i A') }}</span>
                                    </span>
                                </div>
                            </div>
                            <div class="">
                                {{-- <x-a-button text='Primary' /> --}}
                                <a href="{{ route('matchequestion.create', $match->id) }}" type="button"
                                    class="btn btn-primary btn-sm btn-icon-text" style="">
                                    <i class="btn-icon-prepend" data-feather="plus-circle"></i>
                                    Add Question
                                </a>
                                <a href="{{ route('matche.edit', $match->id) }}" type="button"
                                    class="btn btn-success btn-sm btn-icon-text">
                                    <i class="btn-icon-prepend" data-feather="check-square"></i>
                                    Edit
                                </a>

                                <form action="{{ route('matche.destroy', $match->id) }}" method="post"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <button type="submit" onclick="return confirm('Sure ! Delete label ?')" class="btn btn-danger btn-xs btn-icon">
                                        <i data-feather="trash"></i>
                                    </button> --}}
                                    <button type="submit" onclick="return confirm('Sure ! Delete label ?')"
                                        class="btn btn-danger btn-sm btn-icon-text">
                                        <i class="btn-icon-prepend" data-feather="trash-2"></i>
                                        Delete
                                    </button>
                                </form>




                            </div>
                        </div>
                        <div id="collapse{{ $match->id }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample{{ $match->id }}">
                            <div class="accordion-body p-0">
                                @foreach ($match->questions as $question)
                                    <div class="mb-2">
                                        <div class="d-flex justify-content-between p-2"
                                            style="background-color: rgb(197, 197, 197)">
                                            <span>{{ $question->title }}</span>
                                            <div class="">
                                                {{-- <x-a-button text='Primary' /> --}}
                                                {{-- <a href="{{ route('questionoption.create', ['matche_id' => $match->id, 'question_id' => $question->id]) }}"
                                                    type="button" class="btn btn-primary btn-sm btn-icon-text"
                                                    style="">
                                                    <i class="btn-icon-prepend" data-feather="plus-circle"></i>
                                                    Add Option
                                                </a> --}}
                                                <a href="#" type="button"
                                                    class="btn btn-success btn-sm btn-icon-text">
                                                    <i class="btn-icon-prepend" data-feather="check-square"></i>
                                                    Edit
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                    <i class="btn-icon-prepend" data-feather="trash-2"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive pt-1">
                                                <table class="table table-bordered p-1">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                S.n
                                                            </th>
                                                            <th>
                                                                Option
                                                            </th>
                                                            <th>
                                                                Rate
                                                            </th>
                                                            <th>
                                                                Place
                                                            </th>
                                                            <th>
                                                                Amount
                                                            </th>
                                                            <th>
                                                                Limit
                                                            </th>
                                                            <th>
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($question->options as $option)
                                                            <tr>
                                                                <td>
                                                                    1
                                                                </td>
                                                                <td>
                                                                    {{ $option->title }}
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="badge bg-primary">{{ $option->bet_rate }}</a>

                                                                </td>
                                                                <td>
                                                                   0
                                                                </td>
                                                                <td>
                                                                    00
                                                                </td>
                                                                <td>
                                                                    0
                                                                </td>
                                                                <td>
                                                                    <a href=""><span class="badge bg-primary">Win</span></a>
                                                                    <a href=""><span class="badge bg-primary">Bet</span></a>
                                                                    <a href=""><span class="badge bg-primary">Stop</span></a>
                                                                    <a href=""><span class="badge bg-primary">Hide</span></a>
                                                                    <a href=""><span class="badge bg-primary">Close</span></a>
                                                                    {{-- <button type="button" class="btn btn-sm btn-primary btn-icon">
                                                                        <i data-feather="check-square"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-sm btn-danger btn-icon">
                                                                        <i data-feather="trash"></i>
                                                                    </button> --}}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
@push('plugin-styles')
@endpush

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush
