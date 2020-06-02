<form method="post" action="<?php echo site_url('petugas/update_submit/'.$read_petugas_single['Id_Petugas']);?>">
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="Nama" value="<?php echo $read_petugas_single['Nama'];?>" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <select type="text" name="Jkel" value="<?php echo $read_petugas_single['Jenis_Kelamin'];?>" required="" class="form-control">
                    <option Value="Laki-laki">Laki-laki</option>
                    <option Value="Perempuan">Perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="Alamat" value="<?php echo $read_petugas_single['Alamat'];?>" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>No Telepon</td>
            <td><input type="text" name="Notelp" value="<?php echo $read_petugas_single['No_Telp'];?>" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
            <td style="width: 20%"><a href="<?php echo site_url('petugas/read'); ?>" class="btn btn-secondary">Kembali</a></td>
        </tr>
    </table>
</form>
