@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kebersihan_outdoor.store.period') }}" method="post">
                @csrf

                <input type="hidden" name="author" value="{{ Auth::user()->id }}">
                <input type="hidden" name="period_id" value="{{ $id }}">
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                        id="keterangan" placeholder="keterangan" autocomplete="off" value="{{ old('keterangan') }}" required>
                    @error('keterangan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="keadaan1">Minggu Ke-1</label>
                            <select class="form-control  @error('keadaan1') is-invalid @enderror" name="keadaan1"
                                id="keadaan1" value="{{ old('keadaan1') }}" required>
                                <option value="0">Belum Diperiksa</option>
                                <option value="Bersih">Bersih</option>
                                <option value="Tidak Bersih">Tidak Bersih</option>
                            </select>
                            @error('keadaan1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="keadaan2">Minggu Ke-2</label>
                            <select class="form-control  @error('keadaan2') is-invalid @enderror" name="keadaan2"
                                id="keadaan22" value="{{ old('keadaan2') }}" required>
                                <option value="0">Belum Diperiksa</option>
                                <option value="Bersih">Bersih</option>
                                <option value="Tidak Bersih">Tidak Bersih</option>
                            </select>
                            @error('keadaan2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="keadaan3">Minggu Ke-3</label>
                            <select class="form-control  @error('keadaan3') is-invalid @enderror" name="keadaan3"
                                id="keadaan3" value="{{ old('keadaan3') }}" required>
                                <option value="0">Belum Diperiksa</option>
                                <option value="Bersih">Bersih</option>
                                <option value="Tidak Bersih">Tidak Bersih</option>
                            </select>
                            @error('keadaan3')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="keadaan4">Minggu Ke-4</label>
                            <select class="form-control  @error('keadaan4') is-invalid @enderror" name="keadaan4"
                                id="keadaan4" value="{{ old('keadaan4') }}" required>
                                <option value="0">Belum Diperiksa</option>
                                <option value="Bersih">Bersih</option>
                                <option value="Tidak Bersih">Tidak Bersih</option>
                            </select>
                            @error('keadaan4')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tanggal1">Tanggal Pemeriksaan 1</label>
                            <input type="date" class="form-control @error('tanggal1') is-invalid @enderror"
                                name="tanggal1" id="tanggal1" placeholder="tanggal1">
                            @error('tanggal1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tanggal2">Tanggal Pemeriksaan 2</label>
                            <input type="date" class="form-control @error('tanggal2') is-invalid @enderror"
                                name="tanggal2" id="tanggal2" placeholder="tanggal2">
                            @error('tanggal2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tanggal3">Tanggal Pemeriksaan 3</label>
                            <input type="date" class="form-control @error('tanggal3') is-invalid @enderror"
                                name="tanggal3" id="tanggal3" placeholder="tanggal3">
                            @error('tanggal3')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tanggal4">Tanggal Pemeriksaan 4</label>
                            <input type="date" class="form-control @error('tanggal4') is-invalid @enderror"
                                name="tanggal4" id="tanggal4" placeholder="tanggal4">
                            @error('tanggal4')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
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
