@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb d-flex justify-content-between align-items-center">
        <ol class="breadcrumb pt-1">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Matches</li>
        </ol>
        <a href="{{ route('matche.create') }}" type="button" class="btn btn-xs btn-outline-success  btn-icon-tex">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Create Match</a>
    </nav>
    <div class="row">
        <div class="col-12">
            @foreach ($matches as $match)
                <div class="accordion mb-2 shadow-sm" id="accordionExample{{ $match->id }}">
                    <div class="accordion-item">
                        <div class="accordion-header align-items-center p-2 collapsed">
                            <div class="d-flex align-items-center" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $match->id }}" aria-expanded="false"
                                aria-controls="collapse{{ $match->id }}">
                                <div>
                                    <span class="btn btn-primary btn-icon rounded-circle"><i class="btn-icon-prepend"
                                            data-feather="grid"></i></span>
                                </div>
                                <div class="d-flex flex-column px-2">
                                    <span>
                                        <span>{{ $match->team_one }} Vs {{ $match->team_two }}</span>
                                        <span> -> {{ $match->statement }}</span>
                                        <span class="text-muted tx-13"> || Bet: <span
                                                class="badge bg-secondary">{{ $match->matchbets->count() }}</span> ||
                                            TK: {{ $match->matchbets->sum('bet_amount') }}</span>
                                        {{-- <span class="badge bg-secondary">5</span> --}}
                                    </span>
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

                                <a href="{{ route('matche.edit', $match->id) }}" type="button"
                                    class="btn btn-success btn-sm btn-icon-text my-1">
                                    <i class="btn-icon-prepend" data-feather="check-square"></i>
                                    Action
                                </a>
                                <a href="{{ route('matchequestion.create', $match->id) }}" type="button"
                                    class="btn btn-primary btn-sm btn-icon-text my-1" style="">
                                    <i class="btn-icon-prepend" data-feather="plus-circle"></i>
                                    Add Question
                                </a>
                                <button class="btn btn-primary btn-sm btn-icon-text my-1 hideQuestionButton"
                                    id="hideQuestionButton{{ $match->id }}" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $match->id }}" aria-expanded="false"
                                    aria-controls="collapse{{ $match->id }}">
                                    <i class="btn-icon-prepend" data-feather="eye"></i>
                                    Show Question
                                </button>

                                <a onclick="return confirm('Suer ?')" href="{{ route('matche.changestatus', $match->id) }}"
                                    type="button" class="btn btn-primary btn-sm btn-icon-text my-1">
                                    <i class="btn-icon-prepend" data-feather="check-circle"></i>
                                    Active
                                </a>
                                <a onclick="return confirm('Suer ?')" href="{{ route('matche.show', $match->id) }}"
                                    type="button"
                                    class="btn {{ $match->hide ? 'btn-success' : 'btn-danger' }} btn-sm btn-icon-text my-1">
                                    <i class="btn-icon-prepend" data-feather="eye"></i>
                                    {{ $match->hide ? 'Show' : 'Hide' }}
                                </a>
                                <a href="{{ route('matche.edit', $match->id) }}" type="button"
                                    class="btn btn-primary btn-sm btn-icon-text my-1">
                                    <i class="btn-icon-prepend" data-feather="check-square"></i>
                                    Hide Area
                                </a>

                                <form action="{{ route('matche.destroy', $match->id) }}" method="post"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Sure ! Delete label ?')"
                                        class="btn btn-danger btn-sm btn-icon-text my-2">
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
                                        <div class="d-flex align-items-center p-2"
                                            style="background-color: rgb(197, 197, 197)">
                                            <h5>{{ $question->title }}</h5>
                                            <button type="button" class="btn btn-secondary active p-1 mx-1"
                                                data-bs-toggle="modal" data-bs-target="#actionModal{{ $question->id }}">
                                                Action
                                            </button>

                                            <div class="modal fade" id="actionModal{{ $question->id }}" tabindex="-1"
                                                aria-labelledby="actionModal{{ $question->id }}Label" aria-hidden="true">
                                                <form action="{{ route('matchequestion.update', $question->id) }}"
                                                    class="modal-dialog">
                                                    @csrf
                                                    {{-- @method('PUT') --}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="actionModal{{ $question->id }}Label">Edit Question
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="matchQuestion{{ $question->id }}"
                                                                    class="form-label">Question Title</label>
                                                                <input type="text" name="title" class="form-control"
                                                                    value="{{ $question->title }}"
                                                                    id="matchQuestion{{ $question->id }}"
                                                                    autocomplete="off" placeholder="Question">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            {{-- matchequestion.stopStart --}}
                                            <a onclick="return confirm('Suer ?')"
                                                href="{{ route('matchequestion.stopStart', $question->id) }}"
                                                type="button"
                                                class="btn {{ $question->is_hide ? 'btn-success' : 'btn-danger' }} btn-sm btn-icon-text my-1">
                                                <i class="btn-icon-prepend" data-feather="eye"></i>
                                                {{ $question->is_hide ? 'Start' : 'Stop' }}
                                            </a>

                                            {{-- <button class="btn btn-secondary active p-1 mx-1" type="submit">Stop</button> --}}
                                            <button class="btn btn-secondary active p-1 mx-1" type="submit">Hide</button>
                                            <button class="btn btn-secondary active p-1 mx-1" type="submit">Area Hide
                                            </button>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#questionOptionModal{{ $question->id }}"
                                                class="btn btn-success btn-icon p-0 m-0 mx-1">
                                                <i data-feather="plus-circle"></i>
                                            </button>

                                            <div class="modal fade" id="questionOptionModal{{ $question->id }}"
                                                tabindex="-1"
                                                aria-labelledby="questionOptionModal{{ $question->id }}Label"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('questionoption.store') }}" method="POST"
                                                        class="modal-content">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="questionOptionModal{{ $question->id }}Label">Question
                                                                Option
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card-header">{{ $question->title }}</div>
                                                            <div class="row">
                                                                <input type="hidden" name="matche_id"
                                                                    value="{{ $match->id }}">
                                                                <input type="hidden" name="question_id"
                                                                    value="{{ $question->id }}">
                                                                <x-input-text label="Option" placeholder="option"
                                                                    name="option" />
                                                                <x-input-text label="Rate" type="number"
                                                                    placeholder="Rate" name="rate" />
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Add
                                                                Option</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <a onclick="return confirm('Sure ! Delete question ?')"
                                                href="{{ route('matchequestion.destroy', $question->id) }}"
                                                class="btn btn-danger btn-icon p-0 m-0 mx-1">
                                                <i data-feather="trash-2"></i>
                                            </a>

                                            <button type="button" class="btn btn-secondary active p-1 mx-1">
                                                Bid <span
                                                    class="badge bg-light text-dark">{{ $question->questionbet->count() }}</span>
                                            </button>
                                            <h6 class="text-muted">TK:{{ $question->questionbet->sum('bet_amount') }}</h6>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive pt-1">
                                                <table class="table table-bordered p-1">
                                                    <thead>
                                                        <tr>
                                                            <th>S.n </th>
                                                            <th>Option </th>
                                                            <th>Rate </th>
                                                            <th>Amount</th>
                                                            <th>Place</th>
                                                            <th>Return Amount</th>
                                                            <th>Limit</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $serial = 1;
                                                        @endphp
                                                        @foreach ($question->options as $option)
                                                            <tr>
                                                                <td>{{ $serial++ }}</td>
                                                                <td>{{ $option->title }}</td>
                                                                <td>
                                                                    <x-matche.matchquestionoptionedit :option="$option" />
                                                                </td>
                                                                <td>{{ $option->optionbet->count() }}</td>
                                                                <td>{{ $option->optionbet->sum('bet_amount') }}</td>
                                                                <td>{{ $option->bet_rate * $option->optionbet->sum('bet_amount') }}
                                                                </td>
                                                                <td> 0</td>
                                                                <td>
                                                                    @if ($option->is_win == false)
                                                                        <form class="d-inline-block"
                                                                            action="{{ route('admin.betwin', $option->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <button
                                                                                class="border border-0 bg-transparent"><span
                                                                                    class="badge bg-primary">Win</span></button>
                                                                        </form>
                                                                    @else
                                                                        <span class="badge bg-success">Wined</span>
                                                                    @endif

                                                                    <a href="{{route('admin.betlist',$option->id)}}"><span
                                                                            class="badge bg-primary">Bet</span></a>
                                                                    @if ($option->is_hide == false)
                                                                        <form class="d-inline-block"
                                                                            action="{{ route('admin.betstop', $option->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <button
                                                                                class="border border-0 bg-transparent"><span
                                                                                    class="badge bg-primary">Stop</span></button>
                                                                        </form>
                                                                    @else
                                                                        <form class="d-inline-block"
                                                                            action="{{ route('admin.betstart', $option->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <button
                                                                                class="border border-0 bg-transparent"><span
                                                                                    class="badge bg-primary">Start</span></button>
                                                                        </form>
                                                                    @endif
                                                                    <a href=""><span
                                                                            class="badge bg-primary">Hide</span></a>
                                                                    <form
                                                                        action="{{ route('questionoption.delete', $option->id) }}"
                                                                        method="post" style="display: inline">
                                                                        @csrf
                                                                        <button
                                                                            onclick="return confirm('want to delete option')"
                                                                            class="badge bg-danger"
                                                                            type="submit">Close</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td class="fw-bold text-muted" colspan="3"></td>
                                                            <td class="fw-bold text-muted">
                                                                <span>Total:</span>{{ $question->questionbet->count() }}
                                                            </td>
                                                            <td class="fw-bold text-muted">
                                                                TK:{{ $question->questionbet->sum('bet_amount') }}</td>
                                                            <td class="fw-bold text-muted">
                                                                TK:{{ $question->questionbet->sum('return_amount') }}</td>
                                                            <td class="fw-bold text-muted" colspan="2">
                                                                <button class="btn btn-danger btn-sm">Restart</button>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
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
    <script>
        $(document).ready(function() {
            var hideQuestionButton = $(".hideQuestionButton");
            var test = hideQuestionButton.attr("id");
            $(".hideQuestionButton").on('click', function() {
                // console.log( $(this).attr("id") );
                store.set($(this).attr("id"), store.get($(this).attr("id")) == 'show' ? 'none' : 'show');
                var thisId = $(this).attr("id");
                console.log(thisId);
                $(this).parent().parent().siblings().addClass(store.get($(this).attr("id")) == 'show' ?
                    'show' : '');
                store.get($(this).attr("id")) == 'show' ? $(this).text('Hide Question') : $(this).text(
                    'Show Question')
                // console.log($(this).parent().parent())
            });

            hideQuestionButton.each(function() {
                $(this).parent().parent().siblings().addClass(store.get($(this).attr("id")) == 'show' ?
                    'show' : '');
                store.get($(this).attr("id")) == 'show' ? $(this).text('Hide Question') : $(this).text(
                    'Show Question')
            });



        });
    </script>
@endpush
