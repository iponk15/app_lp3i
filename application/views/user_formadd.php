<h2>Form Tambah user</h2>
<?php //echo validation_errors(); ?>
<form action="<?php echo base_url('user/saveform_user'); ?>" method="POST">
	<?php echo form_error('username'); ?>
	Username * : <input type="text" name="username"><br><br>
	<?php echo form_error('nama'); ?>
	Nama *     : <input type="text" name="nama"><br><br>
	<?php echo form_error('email'); ?>
	Email *    : <input type="text" name="email"><br><br>
	Role       : <select name="role">
					<option value="">Pilih Option</option>
					<?php 
						foreach ($role as $row){
							echo '<option value="'.$row["role_id"].'">'.$row["role_kode"].' - '.$row["role_nama"].'</option>';
						}
					?>
				</select><br><br>
	Password : <input type="password" name="password"><br><br>
	<button type="submit">Simpan</button>
</form>