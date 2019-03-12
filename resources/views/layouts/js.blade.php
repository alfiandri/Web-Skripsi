<!-- cdn jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<!-- Materialize JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<!-- cdn data table -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- cdn data table button -->
<script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.print.min.js"></script>
<!-- Sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="{{ asset('js/script.js') }}"></script>
<!-- cursor -->
<script src="{{ asset('js/cursor.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){

		//Navbar
		$('.sidenav').sidenav();

		// carousel
		$('.carousel.carousel-slider').carousel({
	    	fullWidth: true,
			padding: 200,
			indicators: true
		}, setTimeout(autoplay, 7000));

		function autoplay() {
			$('.carousel').carousel('next');
			setTimeout(autoplay, 7000);
		}

		// Parallax
		$('.parallax').parallax();

		// modal
		$('.modal').modal();
		// $('#updateDataemas').modal();

		//dropdown navbar
		$(".dropdown-trigger").dropdown();

		//datatable rlb
		$('#rlb').DataTable();
	});

</script>
@stack('scripts')