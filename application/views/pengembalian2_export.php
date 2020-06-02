<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=export_data_pengembalian.xls" );
?>

<table border="1">
	<thead>
		<tr>
            <th>Kd Pengembalian</th>
			<th>Anggota</th>
			<th>Petugas</th>
			<th>Buku</th>
			
			<th>Tgl Pengembalian</th>
			<th>Kd Denda</th>
			<th>Total Bayar</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data pengembalian-->
		<?php foreach($data_pengembalian2 as $pengembalian2):?>

		<!--cetak data per baris-->
		<tr>
            <td><?php echo $pengembalian2['Kd_Transaksi_Pengembalian'];?></td>
			<td><?php echo $pengembalian2['Id_Anggota'];?></td>
			<td><?php echo $pengembalian2['Id_Petugas'];?></td>
			<td><?php echo $pengembalian2['Kd_Buku'];?></td>

			<td><?php echo $pengembalian2['Tgl_Pengembalian'];?></td>
			<td><?php echo $pengembalian2['Kd_Denda'];?></td>
			<td><?php echo $pengembalian2['Total_Bayar'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>