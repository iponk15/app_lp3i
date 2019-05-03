Form Edit user <br><br><br>
<form action="<?php echo base_url('user/editform_user/'.$getData[0]->user_id); ?>" method="POST">
	Username:
	<input value="<?php echo $getData[0]->user_username;?>" type="text" name="username"><br><br>
	Nama :
	<input value="<?php echo $getData[0]->user_nama;?>" type="text" name="nama"><br><br>
	Email :
	<input value="<?php echo $getData[0]->user_email;?>" type="text" name="email"><br><br>
	Role :
	<select name="role">
		<option value="">Pilih Option</option>
		<?php 
			foreach ($role as $row){
				echo '<option '.($getData[0]->user_roleid == $row["role_id"] ? "selected" : "" ).' value="'.$row["role_id"].'">'.$row["role_kode"].' - '.$row["role_nama"].'</option>';
			}
		?>
	</select><br><br>
	Password :
	<input type="password" name="password"><br><br>
	<button type="submit">Simpan</button>
</form>