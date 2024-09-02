<!-- Modal -->
<div
class="modal fade"
id="tambahbarang"
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
      <form id="tambahbarang-form" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-sm-12">
              <div class="form-group form-group-">
                <label for="foto_barang">Foto Barang</label>
                <input
                  type="file"
                  class="form-control"
                  id="foto_barang"
                  name="foto_barang"
                  required
                />
              </div>
            <div class="form-group">
              <label for="nama_barang">Nama Barang</label>
              <input
                id="nama_barang"
                name="nama_barang"
                type="text"
                class="form-control"
                placeholder="cont: Kursi Kayu Premium"
                required
              />
            </div>
            <div class="form-group">
              <label for="harga_barang">Harga Barang</label>
              <div class="input-group mb-3">
                <span class="input-group-text">Rp</span>
                <input
                  class="form-control"
                  name="harga_barang"
                  id="harga_barang"
                  type="number"
                  placeholder="cont: 40000"
                  required
                />
              </div>
            </div>
            <div class="form-group">
              <label for="jumlah_barang">Jumlah Stock</label>
              <input
                id="jumlah_barang"
                name="jumlah_barang"
                type="number"
                class="form-control"
                placeholder="cont: 17"
                required
              />
            </div>
            <div class="form-group">
              <label for="kategori_barang">Kategori Barang</label>
              <select
                class="form-select form-control"
                id="kategori_id"
                name="kategori_id"
              >
              <option value="">-- Pilih Kategori --</option> <!-- Opsi kosong -->
              @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
              @endforeach
              </select>
            </div>
          </div>
        </div>
        <button
        type="submit"
        class="btn btn-primary"
      >
        Add
      </button>
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
    $(document).ready(function() {
    $('#tambahbarang-form').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('barangs.store') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if(response.success) {
                    $('#tambahbarang').modal('hide');
                    $('#tambahbarang-form')[0].reset();
                    alert('Barang berhasil ditambahkan!');
                    location.reload();
                } else {
                    alert('Gagal menambahkan barang, coba lagi.');
                }
            },
            error: function(response) {
                alert('Gagal menambahkan barang, periksa kembali input Anda.');
            }
        });
    });
});
</script>
<script>
  $(document).ready(function() {
      let formChanged = false;
  
      $('#tambahbarang-form input, #tambahbarang-form select, #tambahbarang-form textarea').on('input change', function() {
          formChanged = true;
      });
  
      $('.close-modal').on('click', function(e) {
          if (formChanged) {
              e.preventDefault(); 
              let confirmation = confirm("Data yang Anda masukkan akan hilang. Apakah Anda yakin ingin menutup form?");
              
              if (confirmation) {
                  $('#tambahbarang').modal('hide'); 
                  $('#tambahbarang-form')[0].reset();
                  formChanged = false; 
              }
          } else {
              $('#tambahbarang').modal('hide');
          }
      });
  });
  </script>