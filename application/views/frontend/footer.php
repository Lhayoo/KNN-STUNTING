<!-- Footer -->
	<footer>
		<div class="bg2 p-t-40 p-b-25">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<img class="max-s-full" src="<?= base_url() ?>assets/frontend/images/icons/sigap.png" alt="LOGO">
						</div>

						<div>
							<p class="f1-s-1 cl11 p-b-16">
								SIGAP adalah aplikasi Sistem Informasi Geografis Sebaran Kasus narkoba Polres Pekalongan Kota
							</p>

							<div class="p-t-15">
								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-facebook-f"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-twitter"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-pinterest-p"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-vimeo-v"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-youtube"></span>
								</a>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Kontak
							</h5>
						</div>
					      <dl class="contact-list">
					        <dt style="color: #fff;">Alamat:</dt>
					        <dd style="color: #fff;">Jl Kauman Baru Pringrejo Kota Pekalongan</dd>
					      </dl>
					      <dl class="contact-list" style="color: #fff;">
					        <dt>email:</dt>
					        <dd><a href="mailto:#" style="color: #fff;">tri.triagus.setiawan45@gmail.com</a></dd>
					      </dl>
					      <dl class="contact-list" style="color: #fff;">
					        <dt>telepon:</dt>
					        <dd><a href="tel:#" style="color: #fff;">+62 081326777248</a>
					        </dd>
					    </dl>
					</div>

					<div class="col-sm-6 col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Links
							</h5>
						</div>

						<ul class="m-t--12">
							<?php
				            $main_menu = $this->db->get_where('tbl_menu', array('is_main_menu' => 0));
				            foreach ($main_menu->result() as $main) {
				              $sub_menu = $this->db->get_where('tbl_menu', array('is_main_menu' => $main->menu_id));
				              if ($sub_menu->num_rows() > 0) { ?>
								<?php foreach ($sub_menu->result() as $sub) { ?>
								<li class="how-bor1 p-rl-5 p-tb-10">
									<a href="<?php echo $sub->menu_link; ?>" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
										<?php echo $sub->menu_title; ?>
									</a>
								</li>
								<?php } ?>
								<?php }
					          }
					        ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="bg11">
			<div class="container size-h-4 flex-c-c p-tb-15">
				<span class="f1-s-1 cl0 txt-center">
					Copyright © <?= date('Y') ?>
					<a href="#" class="f1-s-1 cl10 hov-link1">Tri Agus Setiawan.</a>

					All rights reserved.
				</span>
			</div>
		</div>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="fas fa-angle-up"></span>
		</span>
	</div>

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

			<div class="wrap-video-mo-01">
				<div class="video-mo-01">
					<iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/frontend/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/frontend/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url() ?>assets/frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/frontend/js/main.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#example2').DataTable();
			var site = '<?php echo site_url();?>';
			$('#kecamatan').on('change',function(){

				var kecamatan = $('#kecamatan').val();

					$.ajax({

						url : site+'/publik/showkelurahan',
						type : 'POST',
						data : 'kecamatan='+kecamatan,
						beforeSend : function(html){
							$('#showkelurahan').html('<div class="progress progress-md active"><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span class="sr-only">Mengambil data..</span></div></div>');
						},
						success : function(data){
							$('#showkelurahan').html(data);
						}

					});

			});

		});


	</script>

</body>
</html>
