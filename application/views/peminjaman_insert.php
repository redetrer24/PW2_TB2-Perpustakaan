<form method="post" action="<?php echo site_url('peminjaman/submit/');?>" enctype="multipart/form-data">
    <table class="table table-striped">
        <tr>
            <td>Anggota</td>
            <td>
                <select name="Anggota" class="form-control">
                        <option>--Pilih--</option>
                        <?php foreach($data_anggota as $anggota){ ?>
                            <option value="<?php echo $anggota['Id_Anggota']; ?>"><?php echo $anggota['Nim']; ?> | <?php echo $anggota['Nama']; ?></option>
                        <?php } ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Buku</td>
            <td>
                <select name="Buku" class="form-control">
                        <option>--Pilih--</option>
                        <?php foreach($data_buku as $buku){ ?>
                            <option value="<?php echo $buku['Kd_Buku']; ?>"><?php echo $buku['Kd_Buku']; ?> | <?php echo $buku['Judul']; ?></option>
                        <?php } ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Petugas</td>
            <td>
                <select name="Petugas" class="form-control">
                        <option>--Pilih--</option>
                        <?php foreach($data_petugas as $petugas){ ?>
                            <option value="<?php echo $petugas['Id_Petugas']; ?>"><?php echo $petugas['Id_Petugas']; ?> | <?php echo $petugas['Nama']; ?></option>
                        <?php } ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Tgl Peminjaman</td>
            <td><input type="date" name="Tgl_Peminjam" value="" required="" class="form-control"></td>
        </tr>

        <tr>
            <td>Batas Pengembalian</td>
            <td><input type="date" name="Batas_Tgl_Pengembalian" value="" required="" class="form-control"></td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
            <td style="width: 20%"><a href="<?php echo site_url('peminjaman/read'); ?>" class="btn btn-secondary">Kembali</a></td>
        </tr>
    </table>
</form>
