<form method="post" action="<?php echo site_url('perpustakaan/update_submit/'.$read_buku_single['Kd_Buku']);?>" enctype="multipart/form-data">
        <table>
             <tr>
                <td>Judul</td>
                <td><input type="text" name="Judul" value="<?php echo $read_buku_single['Judul'];?>" required="" class="form-control"></td>
            </tr>

            <tr>
                <td>Cover</td>
                <td><input type="file" name="Cover" value="<?php echo $read_buku_single['Cover'];?>" size="20" class="form-control"></td>
            </tr>
            
             <tr>
                <td>Jenis</td>
                <td><input type="text" name="Jenis" value="<?php echo $read_buku_single['Jenis_Buku'];?>" required="" class="form-control"></td>
            </tr>

            <tr>
                <td>Pengarang</td>
                <td><input type="text" name="Pengarang" value="<?php echo $read_buku_single['Pengarang'];?>" required="" class="form-control"></td>
            </tr>

            <tr>
                <td>Penerbit</td>
                <td><input type="text" name="Penerbit" value="<?php echo $read_buku_single['Penerbit'];?>" required="" class="form-control"></td>
            </tr>

            <tr>
                <td>Tahun</td>
                <td><input type="text" name="Tahun" value="<?php echo $read_buku_single['Tahun_Terbit'];?>" required="" class="form-control"></td>
            </tr>

            <tr>
                <td>Stok</td>
                <td><input type="text" name="Stok" value="<?php echo $read_buku_single['Stok'];?>" required="" class="form-control"></td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
                <td style="width: 20%"><a href="<?php echo site_url('perpustakaan/read'); ?>" class="btn btn-secondary">Kembali</a></td>
            </tr>
        </table>
    </form>
