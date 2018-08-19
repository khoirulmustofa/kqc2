<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Blank page <small>it all starts here</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Examples</a></li>
			<li class="active">Blank page</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Title</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool"
						data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"
						data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i>
					</button>
				</div>
			</div>
			<div class="box-body">
				Start creating your amazing application! <br>
          <?php
			// tentukan waktu tujuan
			$waktu_tujuan = mktime ( 14, 0, 0, 8, 22, 2018 );
			
			// tentukan waktu saat ini
			$waktu_sekarang = mktime ( date ( "H" ), date ( "i" ), date ( "s" ), date ( "m" ), date ( "d" ), date ( "Y" ) );
			
			// hitung selisih kedua waktu
			$selisih_waktu = $waktu_tujuan - $waktu_sekarang;
			
			// Untuk menghitung jumlah dalam satuan hari:
			$jumlah_hari = floor ( $selisih_waktu / 86400 );
			
			// Untuk menghitung jumlah dalam satuan jam:
			$sisa = $selisih_waktu % 86400;
			$jumlah_jam = floor ( $sisa / 3600 );
			
			// Untuk menghitung jumlah dalam satuan menit:
			$sisa = $sisa % 3600;
			$jumlah_menit = floor ( $sisa / 60 );
			
			// Untuk menghitung jumlah dalam satuan detik:
			$sisa = $sisa % 60;
			$jumlah_detik = floor ( $sisa / 1 );
			
			echo "Tanggal saat ini: " . date ( "d-m-Y H:i:s" ) . "<br>";
			echo "Tanggal pelaksanaan: " . date ( "20-9-2012 08:00:00" ) . "<br>";
			echo "<b>Waktu menjelang pelaksanaan tinggal: " . $jumlah_hari . " hari " . $jumlah_jam . " jam " . $jumlah_menit . " menit " . $jumlah_detik . " detik lagi</b>";
			?>
        </div>
			<!-- /.box-body -->
			<div class="box-footer">Footer</div>
			<!-- /.box-footer-->
		</div>
		<!-- /.box -->

	</section>
	<!-- /.content -->
</div>