<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=export_data_anggota.xls" );
?>

<table border="1">
	<thead>
		<tr>
			<th>Id Anggota</th>
			<th>Nim</th>
			<th>Nama</th>
			<th>Prodi</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data anggota-->
		<?php foreach($data_anggota as $anggota):?>

		<!--cetak data per baris-->
		<tr>
			<td><?php echo $anggota['Id_Anggota'];?></td>
			<td><?php echo $anggota['Nim'];?></td>
			<td><?php echo $anggota['Nama'];?></td>
			<td><?php echo $anggota['Prodi'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>