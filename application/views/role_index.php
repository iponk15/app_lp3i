<div class="main-card mb-3 card">
	<div class="card-header"><?php echo $header; ?></div>
	<div class="card-body">
		<div class="text-right"> 
			<a href="<?php echo base_url('role/formadd_role'); ?>" class="mb-2 mr-2 btn btn-primary active"> Tambah Role </a>
			<!-- <a href="<?php echo base_url('user/export_excel'); ?>" class="mb-2 mr-2 btn btn-danger active">Export to Excel</a> 
			<a href="<?php echo base_url('user/tampil_tambah'); ?>" class="mb-2 mr-2 btn btn-primary active">Tambah Data User</a>  -->
		</div>
		<table id="example" class="mb-0 table table-bordered">
			<thead>
				<tr>
					<td align="center"><b>No</b></td>
					<td align="center"><b>Kode</b></td>
					<td align="center"><b>Nama</b></td>
					<td align="center"><b>Deskripsi</b></td>
					<td align="center"><b>Status</b></td>
					<td align="center"><b>Aksi</b></td>
				</tr>
			</thead>
			<tbody>
			<?php 
				if(empty($record)){
					echo '<tr>
							<td colspan="6" align="center"><i>Data tidak di temukan</i></td>
						</td>';
				}else{
					$i = 1;
					foreach ($record as $row){
						echo '<tr>
								<td align="center">'.$i++.'</td>
								<td align="center">'.$row["role_kode"].'</td>
								<td>'.$row["role_nama"].'</td>
								<td>'.$row["role_desk"].'</td>
								<td align="center">'.($row["role_status"] == "1" ? "<p style='color: green'><b>Aktif</b></p>" : "<p style='color:red'><b>Non Aktif</b></p>" ).'</td>
								<td align="center">
									<a href="'.base_url('role/ubahStatus_role/'.$row["role_id"].'/'.$row["role_status"]).'"> Ubah Status</a> <b>||</b>
									<a href="'.base_url('role/formedit_role/'.$row["role_id"]).'"> Edit</a> <b>||</b>
									<a href="'.base_url('role/hapus_role/'.$row["role_id"]).'"> Hapus</a>
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
		$('#example').DataTable();
	} );
</script>