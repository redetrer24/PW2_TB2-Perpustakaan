<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=export_data_buku.xls" );
?>

<table border="1">
	<thead>
		<tr>
            <th>No</th>
			<th>Judul</th>
			<th>Jenis</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th>Tahun</th>
			<th>Stok</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data perpustakaan-->
		<?php foreach($data_buku as $buku):?>

		<!--cetak data per baris-->
		<tr>
            <td><?php echo $buku['Kd_Buku'];?></td>
			<td><?php echo $buku['Judul'];?></td>
			<td><?php echo $buku['Jenis'];?></td>
			<td><?php echo $buku['Pengarang'];?></td>
			<td><?php echo $buku['Penerbit'];?></td>
			<td><?php echo $buku['Tahun'];?></td>
			<td><?php echo $buku['Stok'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>