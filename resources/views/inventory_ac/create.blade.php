@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('inventory_ac.store') }}" method="post">
                @csrf

                <input type="hidden" name="author" value="{{ Auth::user()->name }}">

                <div class="form-group">
                    <label for="ruangan">Ruangan</label>
                    <input type="text" class="form-control @error('ruangan') is-invalid @enderror" name="ruangan"
                        id="ruangan" placeholder="Ruangan" autocomplete="off" value="{{ old('ruangan') }}" required>
                    @error('ruangan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Air Conditioner</label>
                            <select class="custom-select  @error('status') is-invalid @enderror" name="status"
                                id="status" value="{{ old('status') }}" required>
                                <option value="ada">Ada</option>
                                <option value="tidak">Tidak ada</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pk">Jenis</label>
                            <input type="number" class="form-control @error('jenis') is-invalid @enderror" name="jenis"
                                id="jenis" placeholder="jenis" required>
                            @error('jenis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="pk">Total PK</label>
                            <input type="text" class="form-control @error('pk') is-invalid @enderror" name="pk"
                                id="pk" placeholder="pk" required>
                            @error('pk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="produksi">Tahun Produksi</label>
                            <input type="date" class="form-control @error('produksi') is-invalid @enderror"
                                name="produksi" id="produksi" placeholder="produksi" required>
                            @error('produksi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="pengadaan">Tahun Pengadaan</label>
                            <input type="date" class="form-control @error('pengadaan') is-invalid @enderror"
                                name="pengadaan" id="pengadaan" placeholder="pengadaan" required>
                            @error('pengadaan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('inventory_ac.index') }}" class="btn btn-default">Back to list</a>

            </form>
        </div>
    </div>

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
