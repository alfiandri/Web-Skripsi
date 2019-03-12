@extends('layouts.default')

@section('title', '')

@section('contents')
  <!-- carousel -->
  <div class="carousel carousel-slider center">
    <div class="carousel-item white-text" style="background-image: url({{ asset('img/gold.jpg') }})">
      <h1 class="panel">Logam Mulia Emas</h1>
      <p class="white-text">Merupakan salah satu produk investasi yang cukup menjanjikan</p>
    </div>
    <div class="carousel-item white-text" style="background-image: url({{ asset('img/stmik.jpg') }})">
      <h1 class="panel">STMIK Triguna Dharma</h1>
    </div>
    <div class="carousel-item white-text" style="background-image: url({{ asset('img/skripsi.png') }})">
    </div>
	</div>
	<!-- end carousel -->

	<!-- title -->
	<section class="valign-wrapper">
		<div class="container">
			<div class="light title center">
				<h4>
					implementasi data mining untuk memprediksi <br>harga logam mulia emas menggunakan <br>metode regresi linear berganda
				</h4>
			</div>
		</div>
	</section>
	<!-- end title -->

	<!-- parallax 1 -->
	<section>
		<div class="parallax-container valign-wrapper">
	    <div class="section no-pad-bot">
	      <div class="container">
	        <div class="row center">
	          <h5 class="header col s12 light">Variabel yang mempengaruhi harga logam mulia emas antara lain : Laju inflasi, nilai tukar Rupiah terhadap Dollar, dan suku bunga.</h5>
	        </div>
	      </div>
	    </div>
	    <div class="parallax"><img src="{{ asset('img/paralax1.jpg') }}"></div>
	  </div>
	</section>
	<!-- end parallax 1 -->

	<!-- variabel bebas -->
	<section>
		<div class="container">
	    <div class="section">

	      <!--   Icon Section   -->
	      <div class="row">
	        <div class="col s12 m4">
	          <div class="icon-block">
	            <h2 class="center black-text"><i class="material-icons">insert_chart</i></h2>
	            <h5 class="center">Laju Inflasi</h5>

	            <p class="light justify">Inflasi adalah proses kenaikan harga-harga umum secara terus menerus. Kejadian inflasi akan mengakibatkan menurunnya daya beli masyarakat. Hal ini terjadi dikarenakan dalam inflasi akan terjadi penurunan tingkat pendapatan (Bambang dan Aristanti, 2007)</p>
	          </div>
	        </div>

	        <div class="col s12 m4">
	          <div class="icon-block">
	            <h2 class="center black-text"><i class="material-icons">monetization_on</i></h2>
	            <h5 class="center">Kurs Dollar</h5>

	            <p class="light justify">Menurut Triyono (2008) : 'Kurs <i>exchange rate)</i> adalah pertukaran antara dua mata uang yang berbeda, yaitu merupakan perbandingan nilai atau harga antara kedua mata uang tersebut.</p>
	          </div>
	        </div>

	        <div class="col s12 m4">
	          <div class="icon-block">
	            <h2 class="center black-text"><i class="material-icons">local_florist</i></h2>
	            <h5 class="center">Suku Bunga</h5>

	            <p class="light justify">Menurut Boediono (1985 : 75) : 'Tingkat bunga yaitu sebagai harga dari penggunaan uang untuk jangka waktu tertentu. Pengertian tingkat bunga sebagai harga ini bisa juga dinyatakan sebagai harga yang harus dibayar apabila terjadi pertukaran antara satu rupiah sekarang dan satu rupiah nanti.</p>
	          </div>
	        </div>
	      </div>

	    </div>
	  </div>
	</section>
	<!-- end variabel bebas -->

	<!-- parallax 2 -->
	<section>
		<div class="parallax-container valign-wrapper">
	    <div class="section no-pad-bot">
	      <div class="container">
	        <div class="row center">
	          <h2 class="header col s12 light title">Pengertian Data Mining</h2>
	        </div>
	      </div>
	    </div>
	    <div class="parallax"><img src="{{ asset('img/paralax2.jpg') }}"></div>
	  </div>
	</section>
	<!-- end parallax 2 -->

	<!-- pengertian -->
	<section class="valign-wrapper">
		<div class="container">
	    <div class="section">
	      <div class="row">
	        <div class="col s12 center">
	          <h3><i class="mdi-content-send brown-text"></i></h3>
	          <h4>Menurut Tan (dalam Eko Prasetyo, 2012 : 2)</h4>
	          <p class="left-align light justify">'<i>Data mining</i> merupakan sebuah proses untuk menggali informasi yang berguna dari bongkahan basis data yang besar. Pengertian <i>data mining</i> juga dapat didefinisikan sebagai pengekstrakan informasi baru yang diambil dari bongkahan data dalam jumlah besar yang membantu dalam pengambilan keputusan. <i>Data mining</i>/ kadang disebut juga sebagai <i>knowledge discovery</i>.'</p>
	        </div>
	      </div>
	    </div>
	  </div>	
	</section>
	<!-- end pengertian -->
@endsection