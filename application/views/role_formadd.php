<h3>Form Tambah Role</h3>
<hr>
<form action="<?php echo base_url('role/saveform_role'); ?>" method="POST">
	Kode : <input required type="text" name="role_kode" placeholder="input kode ..."><br><br>
	Nama : <input type="text" name="role_nama" placeholder="input nama ..."><br><br>
	Deskripsi : <textarea name="role_desk" placeholder="input deskripsi ..." rows="4" cols="20"></textarea><br><br>
	<button type="submit">Simpan</button>
</form>