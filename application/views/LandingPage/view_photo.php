<!-- Page heading -->
<div class="container p-t-4 p-b-35" style="margin-top: 50px;">
  <h2 class="f1-l-1 cl2">
    <?php echo $row['album_name']?>
  </h2>
</div>

<!-- Content -->
<section class="bg0 p-b-110">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 col-lg-8 p-b-30">
        <div class="p-r-10 p-r-0-sr991">
          <div class="row text-center text-lg-left">
            <?php foreach ($pages as $result): ?>
            <div class="col-lg-3 col-md-4 col-6">
              <a href="#" class="d-block mb-4 h-100">
                    <img width="400" height="300" class="img-fluid img-thumbnail" src="<?php echo base_url().'uploads/album/photos/'. $result['photo_name']?>" alt="">
                  </a>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- Sidebar -->
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
