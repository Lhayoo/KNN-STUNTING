<footer class="section footer-classic context-dark bg-image" style="background: #2d3246;">
<div class="container-fluid">
  <div class="row row-30">
    <div class="col-md-4 col-xl-5">
      <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="images/agency/logo-inverse-140x37.png" alt="" width="140" height="37" srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>
        <p>SIGAP <br> Sistem Informasi Geografis Sebaran Kasus narkoba Polres Pekalongan Kota</p>
        <!-- Rights-->
        <p class="rights"><span>©</span><span class="copyright-year"><?= date('Y') ?></span><span> </span><span>Tri Agus Setiawan</span><span>. <br></span><span>All Rights Reserved.</span></p>
      </div>
    </div>
    <div class="col-md-4">
      <h5>Kontak</h5>
      <dl class="contact-list">
        <dt>Alamat:</dt>
        <dd>Jl Kauman Baru Pringrejo Kota Pekalongan</dd>
      </dl>
      <dl class="contact-list">
        <dt>email:</dt>
        <dd><a href="mailto:#">tri.triagus.setiawan45@gmail.com</a></dd>
      </dl>
      <dl class="contact-list">
        <dt>telepon:</dt>
        <dd><a href="tel:#">(0285) 434344</a> <span>or</span> <a href="tel:#">+62 081326777248</a>
        </dd>
      </dl>
    </div>
    <div class="col-md-4 col-xl-3">
      <h5>Links</h5>
      <ul class="nav-list">
        <li><a href="#">Profil</a></li>
        <li><a href="#">Kontak</a></li>
        <li><a href="#">Berita</a></li>
        <li><a href="#">Galeri</a></li>
        <li><a href="#">Narkoba</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="row no-gutters social-container">
  <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-facebook"></span><span>Facebook</span></a></div>
  <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-instagram"></span><span>instagram</span></a></div>
  <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-twitter"></span><span>twitter</span></a></div>
  <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-youtube-play"></span><span>google</span></a></div>
</div>
</footer>

<!--model-forms-->
<!--/Login-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="login px-4 mx-auto mw-100">
					<center><img src="<?php echo base_url("assets/publik/images/logopkl.png");?>" style="width: 100px;"></center><br>
					<h5 class="text-center mb-4">Form Login Administrator</h5>
					<form action="<?php echo site_url('admin/login');?>" method="post">
						<div class="form-group">
							<label class="mb-2">Username</label>
							<input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Masukkan Username Anda" required>
							
						</div>
						<div class="form-group">
							<label class="mb-2">Password</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Anda" required>
						</div>
						
						<button type="submit" class="btn btn-primary submit mb-4">Login Admin</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
<!--//Login-->

<!--//model-forms-->

    
    <!-- //js -->
	
	<!-- Banner text Responsiveslides -->
	<script src="<?php echo base_url();?>assets/publik/js/responsiveslides.min.js"></script>
	<script>
		// You can also use"$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider3").responsiveSlides({
				auto: true,
				pager: true,
				nav: false,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<!-- //Banner text  Responsiveslides -->

	<script src="<?php echo base_url();?>assets/publik/js/smoothscroll.js"></script><!-- Smooth scrolling -->

    <!-- start-smoth-scrolling -->
    <script src="<?php echo base_url();?>assets/publik/js/move-top.js"></script>
    <script src="<?php echo base_url();?>assets/publik/js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            /*
			var defaults = {
				  containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			 };
			*/

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- //end-smoth-scrolling -->

    <script type="text/javascript">
  $(document).ready(function(){
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