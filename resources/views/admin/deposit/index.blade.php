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
                        <a href="{{route('deposit.create')}}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="plus-circle"></i>
                            Add Payment Gateway
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
                                        Name
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                    <th>
                                        Method
                                    </th>
                                    <th>
                                        From
                                    </th>
                                    <th>
                                        To
                                    </th>
                                    <th>
                                        Transctions
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial = 1;
                                @endphp
                                @foreach ($deposits as $item)
                                    <tr>
                                        <td>
                                            {{$deposits->firstItem() + $loop->index}}
                                            {{-- {{$serial++}} --}}
                                        </td>
                                        <td>
                                            {{ $item->user->name }}
                                        </td>
                                        <td>
                                            {{ $item->amount }}TK
                                        </td>
                                        <td>
                                            {{ $item->method }}
                                        </td>
                                        <td>
                                            {{ $item->from_account }}
                                        </td>
                                        <td>
                                            {{ $item->to_account }}
                                        </td>
                                        <td>
                                            {{ $item->transaction_id }}
                                        </td>
                                        <td>
                                            @if ($item->status == false)
                                            <a href="{{route('deposit.edit', $item->id)}}" type="button" class="btn btn-primary btn-icon btn-xs">
                                                <i data-feather="check-square"></i>
                                            </a>
                                            <form action="{{route('deposit.destroy', $item->id)}}" method="post" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Sure ! Delete label ?')" class="btn btn-danger btn-xs btn-icon">
                                                    <i data-feather="trash"></i>
                                                </button>
                                            </form>
                                            @else
                                            <span><i data-feather="check-circle" class="text-success"></i></span>
                                            @endif

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
