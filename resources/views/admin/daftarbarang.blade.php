@extends('admin.dashboard')

@section('content')
<div class="container">
    <div class="page-inner">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Daftar Barang</h4>
                <button
                  class="btn btn-primary btn-round ms-auto"
                  data-bs-toggle="modal"
                  data-bs-target="#tambahbarang"
                >
                  <i class="fa fa-plus"></i>
                  Tambahkan Barang
                </button>
              </div>
            </div>
            <div class="card-body">
              @include('admin.tambahbarang')
            </div>
            <div class="card-body">
              @include('admin.editbarang')
            </div>
            <div class="card-body">
              @include('admin.tambahkategori')
            </div>

              <div class="table-responsive">
                <table
                  id="add-row"
                  class="display table table-striped table-hover"
                >
                  <thead>
                    <tr>
                      <th>Foto Barang</th>
                      <th>Nama Barang</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th>Jumlah Stok</th>
                      <th style="width: 10%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($barangs as $barang)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $barang->foto_barang) }}" alt="{{ $barang->nama_barang }}" width="100">
                        </td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->kategori->nama_kategori }}</td>
                        <td>Rp. {{ number_format($barang->harga_barang, 0, ',', '.') }}</td>
                        <td>{{ $barang->jumlah_barang }}</td>
                        <td>
                        <div class="form-button-action">
                            <button
                              type="button"
                              data-bs-toggle="modal"
                              title=""
                              class="btn btn-link btn-primary btn-lg edit-btn"
                              data-original-title="Edit Task"
                              data-bs-target="#editbarang"
                              data-id="{{ $barang->id }}"
                              data-nama="{{ $barang->nama_barang }}"
                              data-harga="{{ $barang->harga_barang }}"
                              data-jumlah="{{ $barang->jumlah_barang }}"
                              data-kategori="{{ $barang->kategori_id }}"
                            >
                              <i class="fa fa-edit"></i>
                            </button>
                            <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                              @csrf
                              @method('DELETE')
                              <button
                                type="submit"
                                data-bs-toggle="tooltip"
                                title=""
                                class="btn btn-link btn-danger"
                                data-original-title="Remove" 
                              >
                                <i class="fa fa-times"></i>
                              </button>
                            </form>
                          </div>
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
    </div>
  </div>

@endsection
