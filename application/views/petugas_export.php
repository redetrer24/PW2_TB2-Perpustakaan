<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=export_data_petugas.xls" );
?>

<table border="1">
	<thead>
		<tr>
            <th>ID</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			<th>No Telepon</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data petugas-->
		<?php foreach($data_petugas as $petugas):?>

		<!--cetak data per baris-->
		<tr>
            <td><?php echo $petugas['Id_Petugas'];?></td>
			<td><?php echo $petugas['Nama'];?></td>
			<td><?php echo $petugas['Jenis_Kelamin'];?></td>
			<td><?php echo $petugas['Alamat'];?></td>
			<td><?php echo $petugas['No_Telp'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>