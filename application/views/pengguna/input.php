<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel tile fixed_height_350">
			<div class="x_title">

				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h3>Tambah Pengguna</h3>

							<br>
							<form action="" method="POST">
								<div class="container">
									<div class="row">
										<div class="col-md-2" style="margin-bottom: 5px;">
											<span>Nama Pengguna : </span>
										</div>
										<div class="col-md-12">
											<input type="text" name="nama" class="form-control " style="font-size: 12px;" required="required">
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-2" style="margin-bottom: 5px;">
											<span>Email : </span>
										</div>
										<div class="col-md-12">
											<input type="email" name="email" class="form-control " style="font-size: 12px;" required="required">
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-2" style="margin-bottom: 5px;">
											<span>Username : </span>
										</div>
										<div class="col-md-12">
											<input type="text" name="username" class="form-control" style="font-size: 12px;" required="required">
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-2" style="margin-bottom: 5px;">
											<span>Password : </span>
										</div>
										<div class="col-md-12">
											<input type="password" name="password" class="form-control" style="font-size: 12px;" required="required">
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-2" style="margin-bottom: 5px;">
											<span>Level : </span>
										</div>
										<div class="col-md-12">
											<select name="level" class="form-control" style="font-size: 12px;" required="required">
												<option value="">-Pilihan-</option>
												<!-- <option value="pasien">pasien</option> -->
												<option value="admin">admin</option>
											</select>
										</div>
									</div>
									<br>
									<button type="submit" name="submit" class="btn btn-primary btn-sm" style="border-radius: 0px; background: #3EA8FF; border-color: #3EA8FF;">Simpan</button>
									<a href="<?php echo site_url('/pengguna/index') ?>" class="btn btn-default btn-flat btn-sm" style="border-radius: 0px;">Batal</a>
								</div>
							</form>
						</div>	
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>