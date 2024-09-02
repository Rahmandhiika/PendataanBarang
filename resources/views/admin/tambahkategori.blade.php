<!-- Modal -->
<div
class="modal fade"
id="tambahkategori"
tabindex="-1"
role="dialog"
aria-hidden="true"
>
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header border-0">
      <h5 class="modal-title">
        <span class="fw-mediumbold">Tambahkan kategori</span>
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
      <form id="tambahkategori-form" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-sm-12">
              
            <div class="form-group">
              <label for="nama_kategori">Nama kategori</label>
              <input
                id="nama_kategori"
                name="nama_kategori"
                type="text"
                class="form-control"
                placeholder="cont: Makanan"
                required
              />
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
    $('#tambahkategori-form').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('kategori.store') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if(response.success) {
                    $('#tambahkategori').modal('hide');
                    $('#tambahkategori-form')[0].reset();
                    alert('kategori berhasil ditambahkan!');
                    location.reload();
                } else {
                    alert('Gagal menambahkan kategori, coba lagi.');
                }
            },
            error: function(response) {
                alert('Gagal menambahkan kategori, periksa kembali input Anda.');
            }
        });
    });
});
</script>
<script>
  $(document).ready(function() {
      let formChanged = false;
  
      $('#tambahkategori-form input, #tambahkategori-form select, #tambahkategori-form textarea').on('input change', function() {
          formChanged = true;
      });
  
      $('.close-modal').on('click', function(e) {
          if (formChanged) {
              e.preventDefault(); 
              let confirmation = confirm("Data yang Anda masukkan akan hilang. Apakah Anda yakin ingin menutup form?");
              
              if (confirmation) {
                  $('#tambahkategori').modal('hide'); 
                  $('#tambahkategori-form')[0].reset(); 
                  formChanged = false; 
              }
          } else {
              $('#tambahkategori').modal('hide'); 
          }
      });
  });
  </script>