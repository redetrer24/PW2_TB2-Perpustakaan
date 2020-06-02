<form method="post" action="<?php echo site_url('pengembalian2/submit/');?>" enctype="multipart/form-data">
    <table class="table table-striped">
        <tr>
            <td>Kd Peminjam</td>
            <td>
                <select name="Kd_Peminjam" class="form-control">
                        <option>--Pilih--</option>
                        <?php foreach($data_peminjaman as $peminjaman){ ?>
                            <option value="<?php echo $peminjaman['Kd_Peminjam']; ?>"><?php echo $peminjaman['Kd_Peminjam']; ?> | <?php echo $peminjaman['Nama_Anggota']; ?></option>
                        <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tgl Pengembalian</td>
            <td><input type="date" name="Tgl_Pengembalian" value="" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>Kd Denda</td>
            <td><input type="Kd_Denda" name="Kd_Denda" value="" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>Total Bayar</td>
            <td><input type="text" name="Total_Bayar" value="" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
            <td style="width: 20%"><a href="<?php echo site_url('pengembalian2/read'); ?>" class="btn btn-secondary">Kembali</a></td>
        </tr>
    </table>
</form>
