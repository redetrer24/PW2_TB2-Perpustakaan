<form method="post" action="<?php echo site_url('anggota/submit/');?>" enctype="multipart/form-data">
    <table class="table table-striped">
        <tr>
            <td>Nim</td>
            <td><input type="text" name="Nim" value="" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="Nama" value="" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>Prodi</td>
            <td><input type="text" name="Prodi" value="" required="" class="form-control"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
            <td style="width: 20%"><a href="<?php echo site_url('anggota/read'); ?>" class="btn btn-secondary">Kembali</a></td>
        </tr>
    </table>
</form>
