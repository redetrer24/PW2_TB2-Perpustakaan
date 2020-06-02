<a href="<?php echo site_url("peminjaman/insert_peminjaman"); ?>" class="btn btn-primary">Tambah peminjaman</a>
<a href="<?php echo site_url("peminjaman/export2"); ?>" class="btn btn-success">Export</a>
<br><br>

<div class="card-body">
    <div class="table-responsive">
		<table class="table table-striped table-bordered" id="myTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>Kd Peminjam</th>
					<th>Nim</th>
					<th>Nama</th>
					<th>Kd Buku</th>
					<th>Judul Buku</th>
					<th>Petugas</th>
					<th>Tgl Peminjaman</th>
					<th>Batas Pengembalian</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data_peminjaman as $peminjaman):?>
				<tr>
					<td><?php echo $peminjaman['Kd_Peminjam'];?></td>
					<td><?php echo $peminjaman['Nim_Anggota'];?></td>
					<td><?php echo $peminjaman['Nama_Anggota'];?></td>
					<td><?php echo $peminjaman['Kode_Buku'];?></td>
					<td><?php echo $peminjaman['Judul_Buku'];?></td>
					<td><?php echo $peminjaman['Nama_Petugas'];?></td>
					<td><?php echo $peminjaman['Tgl_Peminjam'];?></td>
					<td><?php echo $peminjaman['Batas_Tgl_Pengembalian'];?></td>
					<td>    
		                 <a href="<?php echo site_url('peminjaman/delete/'.$peminjaman['Kd_Peminjam']);?>" class="btn btn-danger" onclick="return confirm ('Anda yakin ingin hapus? ')">
		                    Hapus
		                    </a>
					</td>
				</tr>
				<?php endforeach?>		
			</tbody>
		</table>
    </div>
</div>