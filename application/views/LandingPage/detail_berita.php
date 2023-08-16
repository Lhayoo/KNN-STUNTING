<!-- Content -->
	<section class="bg0 p-b-140 p-t-10">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-30">
					<div class="p-r-10 p-r-0-sr991">
						<!-- Blog Detail -->
						<div class="p-b-70">
							<a href="#" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
								<?php echo strtoupper($pages['post_category'])?>
							</a>

							<h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
								<?php echo $pages['post_title']?>
							</h3>

							<div class="flex-wr-s-s p-b-40">
								<span class="f1-s-3 cl8 m-r-15">
									<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
										Oleh : <?php echo $pages['nama_asli']?>
									</a>

									<span class="m-rl-3">-</span>

									<span>
										Pada : <?php echo $pages['post_date']?>
									</span>
								</span>

								<span class="f1-s-3 cl8 m-r-15">
									<?php echo $pages['post_views']?> Dilihat
								</span>

							</div>

							<div class="wrap-pic-max-w p-b-30">
								<img src="<?= base_url() ?>uploads/blog/<?php echo $pages['post_image']; ?>" alt="IMG">
							</div>

							<p class="f1-s-11 cl6 p-b-25">
                <?php echo $pages['post_content']; ?>
              </p>

							<!-- Share -->
              <br>
							<div class="flex-s-s">
								<span class="f1-s-12 cl5 p-t-1 m-r-15">
									Share:
								</span>

								<div class="flex-wr-s-s size-w-0">
									<a href="#" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										Facebook
									</a>

									<a href="#" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										Twitter
									</a>

									<a href="#" class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										Google+
									</a>

									<a href="#" class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										Pinterest
									</a>
								</div>
							</div>
						</div>

					</div>
				</div>

				<!-- Sidebar -->
				<div class="col-md-10 col-lg-4 p-b-30">
					<div class="p-l-10 p-rl-0-sr991 p-t-70">

						<!-- Popular Posts -->
						<div class="p-b-30">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Berita Populer
								</h3>
							</div>

			              <ul class="p-t-35">
			                <?php $no=1; foreach ($brpop->result_array() as $row): ?>
								<li class="flex-wr-sb-s p-b-30">
									<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="size-w-10 wrap-pic-w hov1 trans-03">
										<img src="<?= base_url() ?>uploads/blog/<?php echo $row['post_image']; ?>" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
												<?php echo $row['post_title']; ?>
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
												<?php echo strtoupper($row['post_category']); ?>
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
												<?php echo $row['post_date']; ?>
											</span>
										</span>
									</div>
								</li>
                			<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
