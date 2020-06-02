<a href="<?php echo site_url("perpustakaan/insert_buku"); ?>" class="btn btn-primary">Tambah Buku</a>
<a href="<?php echo site_url("perpustakaan/export2"); ?>" class="btn btn-success">Export</a>
<br><br>
<div class="card-body">
    <div class="table-responsive">
		<table class="table table-striped table-bordered" id="myTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>No</th>
					<th>Judul</th>
					<th>Cover</th>
					<th>Jenis</th>
					<th>Pengarang</th>
					<th>Penerbit</th>
					<th>Tahun</th>
					<th>Stok</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data_buku as $buku):?>
				<tr>
					<td><?php echo $buku['Kd_Buku'];?></td>
					<td><?php echo $buku['Judul'];?></td>
					<td><img src="<?php echo base_url('upload_folder/'.$buku['Cover'])?>" width="70px" height="70px"></td>
					<td><?php echo $buku['Jenis'];?></td>
					<td><?php echo $buku['Pengarang'];?></td>
					<td><?php echo $buku['Penerbit'];?></td>
					<td><?php echo $buku['Tahun'];?></td>
					<td><?php echo $buku['Stok'];?></td>
					<td>
						 <a href="<?php echo site_url('perpustakaan/update/'.$buku['Kd_Buku']);?>" class="btn btn-warning">
		                    Ubah
		                    </a>
		                    
		                 <a href="<?php echo site_url('perpustakaan/delete/'.$buku['Kd_Buku']);?>" class="btn btn-danger" onclick="return confirm ('Anda yakin ingin hapus? ')">
		                    Hapus
		                    </a>
					</td>
				</tr>
				<?php endforeach?>		
			</tbody>
		</table>
	</div>
</div>