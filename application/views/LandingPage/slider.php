<section id="featured">
  <!-- start slider -->
  <!-- Slider -->
  <div id="nivo-slider">
    <div class="nivo-slider">
      <!-- Slide #1 image -->
      <?php $no=1; foreach ($query->result() as $row): ?>
      <?php if($row->status == "aktif") { ?>
      <img src="<?php echo base_url().'uploads/slider/'. $row->slide_image?>" alt="" title="<?php echo '#caption-'. $no++?>" />
      <?php } ?>
      <?php endforeach; ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="span12">
          <!-- Slide #1 caption -->
          <?php $no=1; foreach ($query->result() as $row): ?>
          <?php if($row->status == "aktif") { ?>
          <div class="nivo-caption" id="<?php echo 'caption-'. $no++?>">
            <div>
              <h2><strong><?php echo $row->slide_title; ?></strong></h2>
              <p>
                <?php echo $row->slide_desc; ?>
              </p>
              <a href="#" class="btn btn-theme">Read More</a>
            </div>
          </div>
          <?php } ?>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
  <!-- end slider -->
</section>
