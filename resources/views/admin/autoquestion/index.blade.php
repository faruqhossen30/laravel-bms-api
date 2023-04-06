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
                <div class="card-body">
                    <div>
                        <a href="{{route('autoquestion.create')}}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="plus-circle"></i>
                            Create Auto Question
                        </a>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Question
                                    </th>
                                    <th>
                                        Game
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial = 1;
                                @endphp
                                @foreach ($questions as $item)
                                    <tr>
                                        <td>
                                            {{ $serial++ }}
                                        </td>
                                        <td>
                                            {{ $item->title }}
                                        </td>
                                        <td>
                                            {{ $item->game_name }}
                                        </td>
                                        <td>
                                            @if ($item->status)
                                            <span class="badge bg-success">Active</span>
                                            @else
                                            <span class="badge bg-danger">Deactive</span>
                                            @endif
                                            {{-- {{ $item->status }} --}}
                                        </td>
                                        <td>
                                            <a href="{{route('autoquestion.show', $item->id)}}" type="button" class="btn btn-success btn-icon btn-xs">
                                                <i data-feather="eye"></i>
                                            </a>
                                            <a href="{{route('autoquestion.edit', $item->id)}}" type="button" class="btn btn-primary btn-icon btn-xs">
                                                <i data-feather="check-square"></i>
                                            </a>
                                            <form action="{{route('autoquestion.destroy', $item->id)}}" method="post" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Sure ! Delete label ?')" class="btn btn-danger btn-xs btn-icon">
                                                    <i data-feather="trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
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
