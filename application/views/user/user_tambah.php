<div class="main-card mb-3 card">
	<div class="card-header"><?php echo $header; ?></div>
	<div class="card-body">
		<form enctype="multipart/form-data" class="" method="POST" action="<?php echo base_url('user/act_tambahuser'); ?>">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Username</label>
						<div class="col-sm-3">
							<input required name="username" placeholder="Input Username" type="text" class="form-control">
						</div>
					</div>
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-3">
							<input required name="nama" placeholder="Input Nama" type="text" class="form-control">
						</div>
					</div>
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-3">
							<input required name="email" placeholder="Input Email" type="email" class="form-control">
						</div>
					</div>
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Role</label>
						<div class="col-sm-3">
							<select required class="form-control" name="role">
								<option value="">Select Role</option>
								<?php
									foreach ($role as $row){
										echo '<option value="'.$row["role_id"].'">'.$row["role_kode"].' - '.$row["role_nama"].'</option>';
									}
								?>
							</select>
						</div>
					</div>
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-3">
							<input required name="password" placeholder="Input Password" type="password" class="form-control">
						</div>
					</div>
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">File (JPG,PNG,PDF,XLS,DOC)</label>
						<div class="col-sm-3">
							<input name="form_gambar" type="file" class="form-control">
						</div>
					</div>
					<div class="position-relative row form-check">
						<div class="col-sm-4 offset-sm-3">
							<a href="<?php echo base_url('user'); ?>" class="mb-2 mr-2 btn btn-light active">Kembali</a>
							<button type="submit" class="mb-2 mr-2 btn btn-success active">Submit</button>
						</div>
					</div>
				</div>
				<div class="col-sm-2"></div>
			</div>
		</form>
	</div>
</div>