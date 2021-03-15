
<div class="container mt-3">
    <h3><i class="fas fa-tachometer-alt"></i> Dashboard</h3>
    <hr class="bg-secondary">

    <h3 class="text-center font-weight-bold">Layanan Pengaduan Online Rakyat</h3>
    <h4 class="text-center">Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</h4>
    <hr class="bg-dark" style="height:1.5px; width:120px">

    <div class="row mt-5 mb-5">
        <div class="col-md-3 p-0 mr-5 ml-3">
            <a href="<?= BASEURL ?>/pengaduan" class="text-white text-decoration-none">
                <div class="card bg-primary shadow" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Laporan Pengaduan</h5>
                        <?php
                            if($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'petugas'){
                                echo '
                                    <h1 class="card-text font-weight-bold float-right">'. count($data['pengaduan']) .' <i class="fas fa-list-alt"></i></h1>
                                ';
                            } else{
                                echo '
                                    <h1 class="card-text font-weight-bold float-right">'. count($data["pengaduanByNik"]) .' <i class="fas fa-list-alt"></i></h1>
                                ';
                            }
                        ?>
                        <h6>Lihat Detail <i class="fas fa-long-arrow-alt-right mt-5"></i></h6>
                    </div>
                </div>
            </a>
        </div>
        <?php if($_SESSION['status'] == 'petugas') { ?>
            <div class="col-md-3 p-0 ml-4">
                <a href="<?= BASEURL ?>/cetak" class="text-white text-decoration-none">
                    <div class="card bg-danger shadow" style="width: 18rem;">
                        <div class="card-body">
                        <h5 class="card-title mb-3">Generate Laporan</h5>
                            <h1 class="card-text font-weight-bold float-right"><?= count($data["tanggapan"]) ?><i class="fas fa-print"></i></h1>
                            <h6>Lihat Detail <i class="fas fa-long-arrow-alt-right mt-5"></i></h6>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
        <?php if($_SESSION['status'] == 'admin') { ?>
            <div class="col-md-3 p-0 ml-5 mr-5">
                <a href="<?=BASEURL ?>/petugas" class="text-white text-decoration-none">
                    <div class="card bg-warning shadow" style="width: 18rem;">
                        <div class="card-body">
                        <h5 class="card-title mb-3">Petugas</h5>
                            <h1 class="card-text font-weight-bold float-right"><?= count($data["petugas"]) ?><i class="fas fa-user-friends"></i></h1>
                            <h6>Lihat Detail <i class="fas fa-long-arrow-alt-right mt-5"></i></h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 p-0 ml-5">
                <a href="<?= BASEURL ?>/masyarakat" class="text-white text-decoration-none">
                    <div class="card bg-success shadow" style="width: 18rem;">
                        <div class="card-body">
                        <h5 class="card-title mb-3">Masyarakat</h5>
                            <h1 class="card-text font-weight-bold float-right"><?= count($data['masyarakat']) ?><i class="fas fa-users"></i></h1>
                            <h6>Lihat Detail <i class="fas fa-long-arrow-alt-right mt-5"></i></h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mt-5 p-0 ml-3">
                <a href="<?= BASEURL ?>/cetak" class="text-white text-decoration-none">
                    <div class="card bg-danger shadow" style="width: 18rem;">
                        <div class="card-body">
                        <h5 class="card-title mb-3">Generate Laporan</h5>
                            <h1 class="card-text font-weight-bold float-right"><?= count($data["tanggapan"]) ?><i class="fas fa-print"></i></h1>
                            <h6>Lihat Detail <i class="fas fa-long-arrow-alt-right mt-5"></i></h6>
                        </div>
                    </div>
                </a>
            </div>
        <?php  } ?>
    </div>
</div>