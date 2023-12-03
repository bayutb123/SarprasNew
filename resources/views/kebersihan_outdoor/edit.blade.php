@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('inventory_ac.update', $item->id) }}" method="post">
                @csrf
                @method('put')

                <div class="form-group">
                  <label for="ruangan">Ruangan</label>
                  <input type="text" class="form-control @error('ruangan') is-invalid @enderror" name="ruangan"
                      id="ruangan" placeholder="Ruangan" autocomplete="off" required value="{{ $item->ruangan }}">
                  @error('ruangan')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>

              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="status">Air Conditioner</label>
                          <select class="custom-select  @error('status') is-invalid @enderror" name="status"
                              id="status" required>
                              <option value="ada" @if ($item->status == 'ada')
                                  selected
                              @endif>Ada</option>
                              <option value="tidak" @if ($item->status == 'tidak')
                                  selected
                              @endif>Tidak ada</option>
                          </select>
                          @error('status')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="pk">Jenis</label>
                          <input type="text" class="form-control @error('jenis') is-invalid @enderror" name="jenis"
                              id="jenis" placeholder="jenis" required value="{{ $item->type }}">
                          @error('jenis')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-md-2">
                      <div class="form-group">
                          <label for="pk">Total PK</label>
                          <input type="number" class="form-control @error('pk') is-invalid @enderror" name="pk"
                              id="pk" placeholder="pk" required value="{{ $item->pk }}">
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
                              name="produksi" id="produksi" placeholder="produksi" value="{{ \Carbon\Carbon::parse($item->production_year)->format('Y-m-d') }}" required>
                          @error('produksi')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-md-6">

                      <div class="form-group">
                          <label for="pengadaan">Tahun Pengadaan  </label>
                          <input type="date" class="form-control @error('pengadaan') is-invalid @enderror"
                              name="pengadaan" id="pengadaan" placeholder="pengadaan" value="{{ \Carbon\Carbon::parse($item->bought_year)->format('Y-m-d') }}" required>
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
