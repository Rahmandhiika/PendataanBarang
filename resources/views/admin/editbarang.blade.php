<!-- Modal -->
<div
class="modal fade"
id="editbarang"
tabindex="-1"
role="dialog"
aria-hidden="true"
>
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header border-0">
      <h5 class="modal-title">
        <span class="fw-mediumbold">Tambahkan Barang</span>
      </h5>
      
      <button
        type="button"
        class="close close-modal"
        data-dismiss="modal"
        aria-label="Close"
      >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      {{-- <p class="small">
        Create a new row using this form, make sure you
        fill them all
      </p> --}}
      <form id="editbarang-form" method="POST" enctype="multipart/form-data" action="{{ route('barang.update', ['id' => 0]) }}">
        @csrf
        <input type="hidden" id="barang_id" name="barang_id"> 
     
        <div class="row">
           <div class="col-sm-12">
              <div class="form-group">
                 <label for="edit_foto_barang">Foto Barang</label>
                 <input type="file" class="form-control" id="edit_foto_barang" name="foto_barang">
              </div>
              <div class="form-group">
                 <label for="edit_nama_barang">Nama Barang</label>
                 <input id="edit_nama_barang" name="nama_barang" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                 <label for="edit_harga_barang">Harga Barang</label>
                 <div class="input-group mb-3">
                    <span class="input-group-text">Rp</span>
                    <input class="form-control" name="harga_barang" id="edit_harga_barang" type="number" required>
                 </div>
              </div>
              <div class="form-group">
                 <label for="edit_jumlah_barang">Jumlah Stock</label>
                 <input id="edit_jumlah_barang" name="jumlah_barang" type="number" class="form-control" required>
              </div>
              <div class="form-group">
                 <label for="edit_kategori_barang">Kategori Barang</label>
                 <select class="form-select form-control" id="edit_kategori_id" name="kategori_id">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                 </select>
              </div>
           </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <button
        type="button"
        class="btn btn-danger close-modal"
          >
            Close
          </button>
     </form>     
    </div>
    <div class="modal-footer border-0">
      
    </div>
  </div>
</div>

<script>
   $(document).on('click', '.edit-btn', function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var harga = $(this).data('harga');
    var jumlah = $(this).data('jumlah');
    var kategori = $(this).data('kategori');

    $('#barang_id').val(id);
    $('#edit_nama_barang').val(nama);
    $('#edit_harga_barang').val(harga);
    $('#edit_jumlah_barang').val(jumlah);
    $('#edit_kategori_id').val(kategori);

    $('#editbarang').modal('show');
});
</script>

<script>
    $('#editbarang-form').on('submit', function(e) {
    e.preventDefault(); 
    var id = $('#barang_id').val();
    
    var formData = new FormData(this);

    $.ajax({
        url: "/admin/daftarbarang/" + id + "/update",
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.success) {
                alert('Barang berhasil diupdate!');
                location.reload(); 
            }
        },
        error: function(xhr) {
            alert('Terjadi kesalahan saat mengupdate barang.');
            console.log(xhr.responseText);
        }
    });
});

</script>
<script>
  $(document).ready(function() {
    let formChanged = false;

    $('#editbarang-form input, #editbarang-form select, #editbarang-form textarea').on('input change', function() {
        formChanged = true;
    });

    $('.close-modal').on('click', function(e) {
        if (formChanged) {
            e.preventDefault();
            let confirmation = confirm("Data yang Anda masukkan akan hilang. Apakah Anda yakin ingin menutup form?");
            if (confirmation) {
                $('#editbarang').modal('hide');
                $('#editbarang-form')[0].reset();
                formChanged = false;
            }
        } else {
            $('#editbarang').modal('hide');
        }
    });
});
  </script>
