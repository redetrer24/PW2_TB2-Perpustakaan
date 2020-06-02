<div class="alert alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="alert-heading">Selamat datang 
        <strong class="green">Admin</strong>,
    </h4>
    <p>Membaca adalah Iqra</p>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Anggota Perpustakaan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php foreach ($data_anggota as $anggota) : ?>
                                <?= $anggota['total']; ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Judul Buku</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php foreach ($data_judul as $judul) : ?>
                                <?= $judul['total_judul']; ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Stok Buku</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php foreach ($data_perpustakaan as $perpustakaan) : ?>
                                <?= $perpustakaan['total']; ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Peminjaman Buku</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php foreach ($data_peminjaman as $peminjaman) : ?>
                                <?= $peminjaman['total']; ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book-open fa-2x text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-book"></i> Perpustakaan HAN1F1N</h6>
        </div>
        <div class="card-body">
            <p> Perpustakaan HANIFIN merupakan kepanjangan dari perpustakaan HAFI, NIKO dan ALFIN. Perpustakaan ini memiliki banyak Buku yang berkualitas dan memiliki sistem perpustakaan yang baik.</p>
        </div>
    </div>

</div>