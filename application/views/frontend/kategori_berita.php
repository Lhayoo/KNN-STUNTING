<!-- Page heading -->
<div class="container p-t-4 p-b-40" style="margin-top: 50px;">
  <h2 class="f1-l-1 cl2">
    Kategori Berita "<?= strtoupper($ctr) ?>"
  </h2>
</div>

<!-- Post -->
<section class="bg0 p-b-55">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8 p-b-80">
        <div class="row">
            <!-- Item post -->
            <?php
            if( ! empty($model['brta'])){
            $no = 0;
            foreach($model['brta'] as $row):
              $no++;
              ?>
              <div class="col-sm-6 p-r-25 p-r-15-sr991">
  							<!-- Item latest -->
  							<div class="m-b-45">
  								<a href="<?= base_url() ?>berita/<?php echo $row['post_slug']; ?>" class="wrap-pic-w hov1 trans-03">
  									<img width="720" height="205" src="<?= base_url() ?>uploads/blog/<?php echo $row['post_image']; ?>" alt="IMG">
  								</a>

  								<div class="p-t-16">
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
            <?php
            endforeach;
            }
            else{
              echo '<p>Tidak ada berita.</p>';
            }
            ?>
            <!-- Pagination -->
        </div>
        <?php
              echo $model['pagination'];
            ?>
        
      </div>

      <div class="col-md-5 col-lg-4 p-b-30">
        <div class="p-l-10 p-rl-0-sr991 p-t-5">
          <!-- Popular Posts -->
          <div>
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
