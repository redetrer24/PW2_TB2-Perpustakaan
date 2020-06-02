<form method="post" action="<?php echo site_url('perpustakaan/submit/');?>" enctype="multipart/form-data">
    <table class="table table-striped">
        <tr>
            <td>Judul</td>
            <td><input type="text" name="Judul" value="" required="" class="form-control"></td>
        </tr>
        <tr>
	    	<td>Cover</td>
	    	<td><input type="file" name="Cover" value="" size="20"></td>
	    </tr>
        <tr>
            <td>Jenis</td>
            <td><input type="text" name="Jenis" value="" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>Pengarang</td>
            <td><input type="text" name="Pengarang" value="" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>Penerbit</td>
            <td><input type="text" name="Penerbit" value="" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td><input type="text" name="Tahun" value="" required="" class="form-control"></td>
        </tr>
         <tr>
            <td>Stok</td>
            <td><input type="text" name="Stok" value="" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
            <td style="width: 20%"><a href="<?php echo site_url('perpustakaan/read'); ?>" class="btn btn-secondary">Kembali</a></td>
        </tr>
    </table>
</form>
