<a href="<?php echo site_url("pengembalian2/pengembalian2_insert"); ?>" class="btn btn-primary">Tambah pengembalian</a>
<a href="<?php echo site_url("pengembalian2/export2"); ?>" class="btn btn-success">Export</a>
<br><br>
<div class="card-body">
    <div class="table-responsive">
		<table class="table table-striped table-bordered" id="myTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Kd Pengembalian</th>
						<th>Kd Peminjam</th>
						<th>Kd Anggota</th>
						<th>Kd Petugas</th>
						<th>Kd Buku</th>
						<th>Tgl Pengembalian</th>
						<th>Kd Denda</th>
						<th>Total Bayar</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data_pengembalian2 as $pengembalian2):?>
					<tr>
						<td><?php echo $pengembalian2['Kd_Transaksi_Pengembalian'];?></td>
						<td><?php echo $pengembalian2['Kd_Peminjam'];?></td>
						<td><?php echo $pengembalian2['nama_anggota'];?></td>
						<td><?php echo $pengembalian2['nama_petugas'];?></td>
						<td><?php echo $pengembalian2['Kd_Buku'];?></td>
						<td><?php echo $pengembalian2['Tgl_Pengembalian'];?></td>
						<td><?php echo $pengembalian2['Kd_Denda'];?></td>
						<td><?php echo $pengembalian2['Total_Bayar'];?></td>
						<td>
							 <a href="<?php echo site_url('pengembalian2/update/'.$pengembalian2['Kd_Transaksi_Pengembalian']);?>" class="btn btn-warning">
			                    Ubah
			                    </a>
			                    
			                 <a href="<?php echo site_url('pengembalian2/delete/'.$pengembalian2['Kd_Transaksi_Pengembalian']);?>" class="btn btn-danger" onclick="return confirm ('Anda yakin ingin hapus? ')">
			                    Hapus
			                    </a>
						</td>
					</tr>
					<?php endforeach?>		
				</tbody>
			</table>
		</div>
</div>
		
