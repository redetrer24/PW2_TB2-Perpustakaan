<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=export_data_peminjaman.xls" );
?>

<table border="1">
	<thead>
		<tr>
            <th>Kode Peminjaman</th>
			<th>Nim Anggota</th>
			<th>Nama Anggota</th>
			<th>Kode Buku</th>
			<th>Judul Buku</th>
			<th>Tgl Peminjaman</th>
			<th>Batas Pengembalian</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data peminjaman-->
		<?php foreach($data_peminjaman as $peminjaman):?>

		<!--cetak data per baris-->
		<tr>
            <td><?php echo $peminjaman['Kd_Peminjam'];?></td>
			<td><?php echo $peminjaman['Nim_Anggota'];?></td>
			<td><?php echo $peminjaman['Nama_Anggota'];?></td>
			<td><?php echo $peminjaman['Kode_Buku'];?></td>
			<td><?php echo $peminjaman['Judul_Buku'];?></td>
			<td><?php echo $peminjaman['Tgl_Peminjam'];?></td>
			<td><?php echo $peminjaman['Batas_Tgl_Pengembalian'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>