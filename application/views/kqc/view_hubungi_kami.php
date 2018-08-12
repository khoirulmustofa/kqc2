<!--breadcum start -->
<section class="breadcumb-section breadcumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>HUBUNGI KAMI</h1>
				<p>
					<a href="<?php echo base_url()?>">Beranda</a>/<?php echo ucwords($title)?>
				</p>
			</div>
		</div>
	</div>
</section>
<!--breadcum end-->

<div class="map">
	<iframe
		src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.841712200711!2d107.18096431437289!3d-6.284528095451405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6984b262b2811d%3A0xb058c7865b252a35!2sKampung+Qur&#39;an+Cikarang!5e0!3m2!1sen!2sid!4v1532490457365"
		width="600" height="450" frameborder="0" style="border: 0"
		allowfullscreen></iframe>
</div>

<!-- contact info start-->

<div class="contact-info">
	<div class="container">
		<div class="row text-center">
			<div class="col-md-4 col-sm-4">
				<div class="single-contact-box">
					<div class="contact-icon">
						<i class="icofont icofont-location-pin"></i>
					</div>
					<h4>Alamat Kami</h4>
					<p>Jl. Cipaganti Raya No.27, Jatireja, Cikarang Tim., Bekasi, Jawa
						Barat 17530</p>

				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="single-contact-box">
					<div class="contact-icon">
						<i class="icofont icofont-phone"></i>
					</div>
					<h4>TelePhone</h4>
					<p>
						No HP / WA : 0812 - 8454 - 7175 <br />Phone Office: 000 - 948 -
						202 - 000
					</p>

				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="single-contact-box">
					<div class="contact-icon">
						<i class="icofont icofont-email"></i>
					</div>
					<h4>E-mail Kami</h4>
					<br>
					<p>
						<a href="mailto:layanan@kampungqurancikarang.com">layanan@kampungqurancikarang.com</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- contact info end-->

<div class="contact-form">
	<!--contact form start-->
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="section-title text-center">
					<h2>
						Pesan Untuk <span>KQC</span>
					</h2>
					<span class="title-separetor"> <img
						src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/separetor-icon.png"
						alt="separetor image">
					</span>
				</div>
				<?php
				
if ($this->session->userdata ( 'message' ) != '') {
					?>
							<code> ** <?php echo $this->session->userdata ( 'message' ) ?></code>
							
				<?php } ?>
				<form action="<?php echo $action; ?>" method="post">
					<div class="row">
						<div class="col-md-6">
							<input type="text" id="nama_pengirim" name="nama_pengirim"
								placeholder="Masukan Nama"> <input type="text"
								id="email_pengirim" name="email_pengirim"
								placeholder="Masukan E-mail">
						</div>
						<div class="col-md-6">
							<input type="text" id="tlp_pengirim" name="tlp_pengirim"
								placeholder="Masukan No HP"> <input type="text"
								id="subjek_pengirim" name="subjek_pengirim"
								placeholder="Subjek Pesan">
						</div>
					</div>
					<textarea cols="30" rows="10" name="isi_pesan" id="isi_pesan"
						 placeholder="Isi Pesan"></textarea>
					<input type="submit" value="Kirim Pesan Anda">

				</form>
			</div>
		</div>
	</div>
</div>
<!--contact form end-->

