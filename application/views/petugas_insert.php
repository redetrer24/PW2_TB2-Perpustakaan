<form method="post" action="<?php echo site_url('petugas/submit/');?>" enctype="multipart/form-data">
    <table class="table table-striped">
        <tr>
            <td>Nama</td>
            <td><input type="text" name="Nama" value="" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <select type="text" name="Jkel" value="" required="" class="form-control">
                    <option Value="L">Laki-laki</option>
                    <option Value="P">Perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="Alamat" value="" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>No Telepon</td>
            <td><input type="text" name="Notelp" value="" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
            <td style="width: 20%"><a href="<?php echo site_url('petugas/read'); ?>" class="btn btn-secondary">Kembali</a></td>
        </tr>
    </table>
</form>
