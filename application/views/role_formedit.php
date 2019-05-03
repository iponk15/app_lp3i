<h3>Form Edit Role</h3>
<hr>
<form action="<?php echo base_url('role/editform_role/'.$getData[0]->role_id); ?>" method="POST">
	Kode : <input value="<?php echo $getData[0]->role_kode; ?>" required type="text" name="role_kode" placeholder="input kode ..."><br><br>
	Nama : <input value="<?php echo $getData[0]->role_nama; ?>" type="text" name="role_nama" placeholder="input nama ..."><br><br>
	Deskripsi : <textarea name="role_desk" placeholder="input deskripsi ..." rows="4" cols="20"><?php echo $getData[0]->role_desk; ?></textarea><br><br>
	<button type="submit">Simpan</button>
</form>