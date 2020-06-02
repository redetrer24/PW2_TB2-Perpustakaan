<form method="post" action="<?php echo site_url('pengembalian2/update_submit/'.$read_pengembalian2_single['Kd_Transaksi_Pengembalian']);?>">
    <table>
        <tr>
            <td>Kd Peminjam</td>
            <td><input type="text" name="Kd_Peminjam" value="<?php echo $read_pengembalian2_single['Kd_Peminjam'];?>" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>Tgl Pengembalian</td>
            <td><input type="text" name="Tgl_Pengembalian" value="<?php echo $read_pengembalian2_single['Tgl_Pengembalian'];?>" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>Kd Denda</td>
            <td><input type="text" name="Kd_Denda" value="<?php echo $read_pengembalian2_single['Kd_Denda'];?>" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>Total Bayar</td>
            <td><input type="text" name="Total_Bayar" value="<?php echo $read_pengembalian2_single['Total_Bayar'];?>" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
            <td style="width: 20%"><a href="<?php echo site_url('pengembalian2/read'); ?>" class="btn btn-secondary">Kembali</a></td>
        </tr>
    </table>
</form>
