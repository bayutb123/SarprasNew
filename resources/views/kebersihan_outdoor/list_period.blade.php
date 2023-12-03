@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('kebersihan_outdoor.create.period', ['id' => $period->id]) }}" class="btn btn-primary mb-3">New Data</a>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered table-stripped" id="dataTableAC">
        <thead>
            <tr>
                <th width="3%" rowspan="2">No</th>
                <th rowspan="2">Nama</th>
                <th colspan="2">Keadaan Terakhir</th>
            </tr>
            
            <tr>
                <th width="10%">Bersih</th>
                <th width="10%">Tidak Bersih</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                @if ($item->status == 'Bersih')
                    <td>
                        <i class="fas fa-check"> ({{ $item->date->format('d-M-Y') }})</i>
                    </td>
                    <td></td>
                @else
                    <td></td>
                    <td>
                        <i class="fas fa-check"> ({{ $item->date->format('d-M-Y') }})</i>
                    </td>
                @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- End of Main Content -->
@endsection

@push('notif')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning border-left-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endpush
