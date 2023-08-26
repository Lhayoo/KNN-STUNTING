<section id="inner-headline">
  <div class="container">
    <div class="row">
      <div class="span4">
        <div class="inner-heading">
          <h2>Portofolio</h2>
        </div>
      </div>
      <div class="span8">
        <ul class="breadcrumb">
          <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
          <li><a href="#">Home</a><i class="icon-angle-right"></i></li>
          <li class="active">Portofolio</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section id="content">
  <div class="container">
    <div class="row">
      <div class="span12">
        <h4 class="heading">Latest <strong>Works</strong></h4>
        <div class="row">
          <section id="projects">
            <ul id="thumbs" class="portfolio">
              <?php foreach ($query_p->result() as $row): ?>
              <li class="item-thumbs span4 design">
                <div class="card">
                  <img style="width: 400px; height: 253px;" class="card-img-top" src="<?php echo base_url().'uploads/portofolio/'. $row->portofolio_image?>" alt="Card image cap">
                  <div class="card-body" style="margin-top: 25px;">
                    <h7><strong><?php echo $row->portofolio_title; ?></strong></h7>
                    <p><?php echo $row->category_name; ?></p>
                    <em class="pull-right"><span class="icon-globe"></span> <a href="#" style="color: #337ab7;" rel="nofollow" target="_blank"><strong><?php echo $row->portofolio_desc; ?></strong></a></em> 
                  </div>
                </div>
              </li>
              <?php endforeach; ?>
            </ul>
          </section>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>
