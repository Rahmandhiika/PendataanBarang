<!DOCTYPE HTML>
<html>
	@include('user.head')
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-xs-2">
						<div id="fh5co-logo"><a href="index.html">PT Meksiko</a></div>
					</div>
					<div class="col-md-6 col-xs-6 text-center menu-2">
						
					</div>
					<div class="col-md-3 col-xs-4 text-right d-none d-md-block menu-2">
						<ul>
							<li class="shopping-cart">
								<a class="cart icon-view-cart" data-bs-toggle="modal" data-bs-target="#cartModal"><span><small>0</small><i class="icon-shopping-cart"></i></span></a></li>
							<li class="user">
								@guest
									<a href="{{ route('login') }}">Log In</a>
								@else
									<a href="{{ route('logout') }}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
										<i class="icon-user"></i> Log Out
									</a>
		
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								@endguest
							</li>
						</ul>
					</div>
				</div>
				
			</div>
		</nav>
		@if ($errors->any())
			<script>
				window.onload = function() {
					var errorMessages = "";
					@foreach ($errors->all() as $error)
						errorMessages += "{{ $error }}\n";
					@endforeach
					alert(errorMessages);
				};
			</script>
		@endif
			<!-- Modal -->
			<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="cartModalLabel">Keranjang Belanja</h5>
					
					</div>
					<div class="modal-body">
					<div id="cartContent">
					</div>
					<div class="form-group">
						<label for="address">Alamat</label>
						<input type="text" class="form-control" id="address" placeholder="Masukkan alamat">
						@error('address')
							<div class="text-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="postalCode">Kode Pos</label>
						<input type="text" class="form-control" id="postalCode" placeholder="Masukkan kode pos">
						@error('postalCode')
							<div class="text-danger">{{ $message }}</div>
						@enderror
					</div>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="cetakFraktur">Cetak Fraktur</button>
					<button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal">Close</button>
					</div>
				</div>
				</div>
			</div>
	<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>Daftar Barang</span>
					<h2>Products</h2>
				</div>
			</div>
			<div class="row">
				@foreach($barangs as $barang)
				<div class="col-md-4 text-center animate-box">
					<div class="product">
						<div class="product-grid" style="background-image:url('{{ asset('storage/' . $barang->foto_barang) }}');">
							<div class="inner">
								<p>
									<a href="#" class="icon icon-shopping" data-id="{{ $barang->id }}"><i class="icon-shopping-cart"></i></a>
								</p>
							</div>
						</div>
						<div class="desc">
							<h3><a href="#">{{ $barang->nama_barang }}</a></h3>
							<span class="price">Rp {{ number_format($barang->harga_barang, 0, ',', '.') }}</span><br>
							<span>Kategori: {{ $barang->kategori->nama_kategori }}</span><br>
							<span>Stok: {{ $barang->jumlah_barang }}</span>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="assets/user/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="assets/user/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="assets/user/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="assets/user/js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="assets/user/js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="assets/user/js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="assets/user/js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="assets/user/js/main.js"></script>

	<script>
		$(document).ready(function() {
			$('.icon-shopping').on('click', function(e) {
				e.preventDefault();

				var barang_id = $(this).data('id'); 
				
				$.ajax({
					url: "{{ route('fraktur.tambah') }}",
					method: "POST",
					data: {
						_token: "{{ csrf_token() }}",
						barang_id: barang_id,
						quantity: 1 
					},
					success: function(response) {
						alert(response.message);
					},
					error: function(xhr) {
						if (xhr.status === 401) {
							alert('Please login to add items to the cart');
						} else if (xhr.status === 400) {
							alert('Error: ' + xhr.responseJSON.message);}
						else {
							alert('Error: ' + xhr.responseText);
						}
					}
			});
    });
});

</script>
<script>
	$(document).ready(function() {
	 $('.icon-view-cart').on('click', function(e) {
		 e.preventDefault();
 
		 $.ajax({
			 url: "{{ route('fraktur.content') }}",
			 method: "GET",
			 success: function(response) {
				 console.log(response); 
				 console.log('AJAX success'); 
				 $('#cartContent').html(response); 
				 console.log('Memuat modal...');
				 $('#cartModal').modal('show');
				 console.log('Modal dipanggil...');
			 },
			 error: function(xhr) {
				 console.log('AJAX error'); 
				 $('#cartContent').html('<p>Terjadi kesalahan dalam memuat keranjang belanja.</p>');
			 }
		 });
	 });
 });
 </script>
<script>
	$(document).on('change', '.item-quantity', function() {
    var itemId = $(this).data('id');
    var newQuantity = $(this).val();

    if (newQuantity == 0) {
        removeItemFromCart(itemId);
    } else {
        updateCartQuantity(itemId, newQuantity);
    }
});

$(document).on('click', '.btn-remove-item', function() {
    var itemId = $(this).data('id');
    removeItemFromCart(itemId);
});

function updateCartQuantity(itemId, quantity) {
    $.ajax({
        url: "{{ route('fraktur.update') }}",  
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',  
            id: itemId,
            quantity: quantity
        },
        success: function(response) {
            if (response.html) {
                $('#cartContent').html(response.html);
            }
        },
        // error: function() {
        //     $('#cartModal').modal('hide'); 
        //         setTimeout(function() {
        //             $('#cartModal').modal('show'); 
        //         }, 500); 
        // }
    });
}

function removeItemFromCart(itemId) {
    $.ajax({
        url: "{{ route('fraktur.remove') }}",  
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            id: itemId
        },
        success: function(response) {
            if (response.html) {
                $('#cartContent').html(response.html);
            }
        },
        error: function() {
            alert('Error updating item.');
        }
    });
}
</script>
<script>
	$(document).ready(function() {
		$('.btn-close').on('click', function(e) {
			$('#cartModal').modal('hide');
		});
	});
</script>
<script>
	$(document).on('click', '#cetakFraktur', function() {
		var address = $('#address').val();
		var postalCode = $('#postalCode').val();

		var url = "{{ route('cart.print') }}?address=" + encodeURIComponent(address) + "&postalCode=" + encodeURIComponent(postalCode);

		window.location.href = url;
	});

</script>

	</body>
</html>
