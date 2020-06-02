<a href="<?php echo site_url("anggota/anggota_insert"); ?>" class="btn btn-primary">Tambah anggota</a>
<a href="<?php echo site_url("anggota/export2"); ?>" class="btn btn-success">Export</a>
<br><br>

<div class="card-body">
    <div class="table-responsive">
			<table class="table table-striped table-bordered" id="myTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Id Anggota</th>
						<th>Nim</th>
						<th>Nama</th>
						<th>Prodi</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data_anggota as $anggota):?>
					<tr>
						<td><?php echo $anggota['Id_Anggota'];?></td>
						<td><?php echo $anggota['Nim'];?></td>
						<td><?php echo $anggota['Nama'];?></td>
						<td><?php echo $anggota['Prodi'];?></td>
						<td>
							 <a href="<?php echo site_url('anggota/update/'.$anggota['Id_Anggota']);?>" class="btn btn-warning">
			                    Ubah
			                    </a>
			                    
			                 <a href="<?php echo site_url('anggota/delete/'.$anggota['Id_Anggota']);?>" class="btn btn-danger" onclick="return confirm ('Anda yakin ingin hapus? ')">
			                    Hapus
			                    </a>
						</td>
					</tr>
					<?php endforeach?>		
				</tbody>
			</table>
    </div>
</div>
			
