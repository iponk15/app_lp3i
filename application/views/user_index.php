<link href="<?php echo base_url('assets/css//main.css'); ?>" rel="stylesheet">
<a href="<?php echo base_url('user/formadd_user'); ?>"> Tambah data </a>
<br><br>
<form action="<?php echo base_url('user/datauser'); ?>" method="POST">
	<p> 
		Nama <input type="text" name="username"> Email <input type="text" name="email">
		Email 
		<select name="role">
			<option value="">Pilih Role</option>
			<option value="2">Admin</option>
			<option value="4">Superadmin</option>
			<option value="3">User</option>
		</select>
		<button type="submit">submit</button>
	</p>
</form>
<table border="1" width="50%">
	<tr>
		<td align="center"><b>No</b></td>
		<td align="center"><b>Nama</b></td>
		<td align="center"><b>Email</b></td>
		<td align="center"><b>Role</b></td>
		<td align="center"><b>Action</b></td>
	</tr>
	<?php 
		$i = $this->uri->segment('3') + 1;
		foreach ($record as $row){
			echo '<tr>
					<td align="center">'.$i++.'</td>
					<td>'.$row["user_nama"].'</td>
					<td>'.$row["user_email"].'</td>
					<td align="center">'.$row["role_nama"].'</td>
					<td align="center">
						<a href="'.base_url('user/formedit_user/'.$row["user_id"]).'"> Edit</a> <b>||</b>
						<a href="'.base_url('user/hapus_user/'.$row["user_id"]).'"> Hapus</a>
					</td>
				</tr>';
			
		}
	?>
</table>
<br>
<?php echo $pagination;?>
<script type="text/javascript" src="<?php echo base_url('assets/scripts/main.js'); ?>"></script></body>