<a href="<?php echo site_url("petugas/petugas_insert"); ?>" class="btn btn-primary">Tambah Petugas</a>
<a href="<?php echo site_url("petugas/export2"); ?>" class="btn btn-success">Export</a>
<br><br>

<div class="card-body">
    <div class="table-responsive">
		<table class="table table-striped table-bordered" id="myTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>No Telepon</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data_petugas as $petugas):?>
				<tr>
					<td><?php echo $petugas['Id_Petugas'];?></td>
					<td><?php echo $petugas['Nama'];?></td>
					<td><?php echo $petugas['Jenis_Kelamin'];?></td>
					<td><?php echo $petugas['Alamat'];?></td>
					<td><?php echo $petugas['No_Telp'];?></td>
					<td>
						 <a href="<?php echo site_url('petugas/update/'.$petugas['Id_Petugas']);?>" class="btn btn-warning">
		                    Ubah
		                    </a>
		                    
		                 <a href="<?php echo site_url('petugas/delete/'.$petugas['Id_Petugas']);?>" class="btn btn-danger" onclick="return confirm ('Anda yakin ingin hapus? ')">
		                    Hapus
		                    </a>
					</td>
				</tr>
				<?php endforeach?>		
			</tbody>
		</table>
    </div>
</div>
