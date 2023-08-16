<!-- Headline -->
	<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
				<span class="text-uppercase cl2 p-r-8">
					Berita Terbaru:
				</span>

				<span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
					<?php foreach ($newest->result_array() as $row): ?>
						<span class="dis-inline-block slide100-txt-item animated visible-false">
							<?php echo $row['post_title']; ?>
						</span>
					<?php endforeach; ?>
				</span>
			</div>
		</div>
	</div>

	<!-- Feature post -->
	<section class="bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	          <ol class="carousel-indicators">
							<?php $no=0; foreach ($query->result() as $row): ?>
								<?php if($row->status == "aktif") { ?>
			            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $no++ ?>"></li>
								<?php } ?>
							<?php endforeach; ?>
	          </ol>
	          <div class="carousel-inner">
							<?php $no=1; foreach ($query->result() as $row): ?>
          			<?php if($row->status == "aktif") { ?>
			            <div class="carousel-item <?= $no == 1 ? 'active' : '' ?>">
			              <img height="200" width="960px" class="d-block w-100" src="<?php echo base_url().'uploads/slider/'. $row->slide_image?>" alt="First slide">
			              <div class="carousel-caption d-none d-md-block">
			                <h2><?php echo $row->slide_title; ?></h2>
			                <p><?php echo $row->slide_desc; ?></p>
			              </div>
			            </div>
								<?php $no++; } ?>
							<?php endforeach; ?>
	          </div>
	          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	            <span class="sr-only">Previous</span>
	          </a>
	          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	            <span class="carousel-control-next-icon" aria-hidden="true"></span>
	            <span class="sr-only">Next</span>
	          </a>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<!-- Post -->
	<section class="bg0 p-t-70">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8">
					<div class="p-b-20">
						<!-- Entertainment -->
						<div class="tab01 p-b-20">
							<div class="tab01-head how2 how2-cl1 bocl12 flex-s-c m-r-10 m-r-0-sr991">
								<!-- Brand tab -->
								<h3 class="f1-m-2 cl12 tab01-title">
									Berita Polres Pekalongan Kota
								</h3>

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#" role="tab"></a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#" role="tab"></a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#" role="tab"></a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#" role="tab"></a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#" role="tab"></a>
									</li>
									
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#" role="tab"></a>
									</li>
									
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#" role="tab"></a>
									</li>
									
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#" role="tab"></a>
									</li>
									
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#" role="tab"></a>
									</li>

									<li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">

										</ul>
									</li>
								</ul>

								<!--  -->
								<a href="<?= base_url() ?>berita/kategori/kota" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
									Lihat Semua
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
							</div>


							<!-- Tab panes -->
							<div class="tab-content p-t-35">
								<!-- - -->
								<div class="tab-pane fade show active" id="tab1-1" role="tabpanel">
									<div class="row">
										<?php $no=0; foreach ($brkotas->result_array() as $row): ?>
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->
											<div class="m-b-30">
												<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="wrap-pic-w hov1 trans-03">
													<img src="<?= base_url() ?>uploads/blog/<?php echo $row['post_image']; ?>" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
															<?php echo $row['post_title']; ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
															Oleh : <?php echo $row['nama_asli']; ?>
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															<?php echo $row['post_date']; ?>
														</span>
													</span>
												</div>
											</div>
										</div>
										<?php endforeach; ?>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->
											<?php $no=0; foreach ($brkota->result_array() as $row): ?>
											<div class="flex-wr-sb-s m-b-30">
												<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="<?= base_url() ?>uploads/blog/<?php echo $row['post_image']; ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
															<?php echo $row['post_title']; ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															Oleh : <?php echo $row['nama_asli']; ?>
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															<?php echo $row['post_date']; ?>
														</span>
													</span>
												</div>
											</div>
											<?php endforeach; ?>

										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Business -->
						<div class="tab01 p-b-20">
							<div class="tab01-head how2 how2-cl2 bocl12 flex-s-c m-r-10 m-r-0-sr991">
								<!-- Brand tab -->
								<h3 class="f1-m-2 cl13 tab01-title">
									Berita Lainnya
								</h3>

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#" role="tab"></a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#" role="tab"></a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#" role="tab"></a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#" role="tab"></a>
									</li>

									<li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">

										</ul>
									</li>
								</ul>

								<!--  -->
								<a href="<?= base_url() ?>berita/kategori/lainnya" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
									Lihat Semua
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
							</div>


							<!-- Tab panes -->
							<div class="tab-content p-t-35">
								<!-- - -->
								<div class="tab-pane fade show active" id="tab1-1" role="tabpanel">
									<div class="row">
										<?php $no=0; foreach ($brlains->result_array() as $row): ?>
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->
											<div class="m-b-30">
												<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="wrap-pic-w hov1 trans-03">
													<img src="<?= base_url() ?>uploads/blog/<?php echo $row['post_image']; ?>" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
															<?php echo $row['post_title']; ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
															Oleh : <?php echo $row['nama_asli']; ?>
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															<?php echo $row['post_date']; ?>
														</span>
													</span>
												</div>
											</div>
										</div>
										<?php endforeach; ?>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->
											<?php $no=0; foreach ($brlain->result_array() as $row): ?>
											<div class="flex-wr-sb-s m-b-30">
												<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="<?= base_url() ?>uploads/blog/<?php echo $row['post_image']; ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
															<?php echo $row['post_title']; ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															Oleh : <?php echo $row['nama_asli']; ?>
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															<?php echo $row['post_date']; ?>
														</span>
													</span>
												</div>
											</div>
											<?php endforeach; ?>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-10 col-lg-4">
					<div class="p-l-10 p-rl-0-sr991 p-b-20">
						<!--  -->
						<div>
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Paling Banyak Dibaca
								</h3>
							</div>

							<ul class="p-t-35">
								<?php $no=1; foreach ($brpop->result_array() as $row): ?>
								<li class="flex-wr-sb-s p-b-22">
									<div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
										<?= $no++ ?>
									</div>

									<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
										<?php echo $row['post_title']; ?>
									</a>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>

						<!--  -->
						<div class="p-t-50">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Ikuti kami
								</h3>
							</div>

							<ul class="p-t-35">
								<li class="flex-wr-sb-c p-b-20">
									<a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
										<span class="fab fa-facebook-f"></span>
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											6879 Fans
										</span>

										<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
											Like
										</a>
									</div>
								</li>

								<li class="flex-wr-sb-c p-b-20">
									<a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
										<span class="fab fa-twitter"></span>
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											568 Followers
										</span>

										<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
											Follow
										</a>
									</div>
								</li>

								<li class="flex-wr-sb-c p-b-20">
									<a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
										<span class="fab fa-youtube"></span>
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											5039 Subscribers
										</span>

										<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
											Subscribe
										</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	
