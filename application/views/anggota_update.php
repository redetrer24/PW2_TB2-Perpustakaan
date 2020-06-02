<form method="post" action="<?php echo site_url('anggota/update_submit/'.$read_anggota_single['Id_Anggota']);?>">
    <table>
        <tr>
            <td>Nim</td>
            <td><input type="text" name="Nim" value="<?php echo $read_anggota_single['Nim'];?>" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="Nama" value="<?php echo $read_anggota_single['Nama'];?>" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>Prodi</td>
            <td><input type="text" name="Prodi" value="<?php echo $read_anggota_single['Prodi'];?>" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
            <td style="width: 20%"><a href="<?php echo site_url('anggota/read'); ?>" class="btn btn-secondary">Kembali</a></td>
        </tr>
    </table>
</form>
