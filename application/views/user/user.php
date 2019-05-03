<div class="main-card mb-3 card">
	<div class="card-header"><?php echo $header; ?></div>
	<div class="card-body">
		<div class="text-right"> 
			<a href="<?php echo base_url('user/export_excel'); ?>" class="mb-2 mr-2 btn btn-danger active">Export to Excel</a> 
			<a href="<?php echo base_url('user/tampil_tambah'); ?>" class="mb-2 mr-2 btn btn-primary active">Tambah Data User</a> 
		</div>
		<table class="mb-0 table table-bordered table_user">
			<thead>
				<tr>
					<th><center>No.</center></th>
					<th><center>Username</center></th>
					<th><center>Nama</center></th>
					<th><center>Email</center></th>
					<th><center>Role</center></th>
					<th><center>Action</center></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if(empty($records)){
						echo '<tr><td colspan="5"></td></tr>';
					}else{
						$i = 1;
						foreach($records as $row){
							echo '<tr>
									<td scope="row" width="3%"><center>'.$i++.'</center></td>
									<td>'.$row->user_username.'</td>
									<td>'.$row->user_nama.'</td>
									<td>'.$row->user_email.'</td>
									<td><center>'.$row->role_nama.'</center></td>
									<td width="10%">
										<center>
											<a href="'.base_url('user/tampil_ubah/'.$row->user_id).'" class="mb-2 mr-2 btn-transition btn btn-outline-info"><i class="nav-link-icon fa fa-edit"></i></a>
											<a href="'.base_url('user/hapus_data/'.$row->user_id).'" class="mb-2 mr-2 btn-transition btn btn-outline-danger"><i class="nav-link-icon fa fa-trash"></i></a>
										</center>
									</td>
								</tr>';
						}
					}
				?>
			</tbody>
		</table>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('.table_user').DataTable();
	} );
</script>