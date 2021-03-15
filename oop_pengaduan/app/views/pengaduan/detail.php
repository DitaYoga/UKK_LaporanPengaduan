
<div class="container mt-3">
    <h3>Detail Laporan</h3>
    <hr>
    <br>
    <div class="row mb-3">
        <div class="col-sm-6">
            <form action="" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="font-weight-bold" for="nik">Nik</label>
                            <input type="number" class="form-control" id="nik" value="<?= $data['pengaduan']['nik'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="font-weight-bold" for="status">Status pengaduan</label>
                            <?php
                                if($data['pengaduan']['status'] == "0"){
                                    echo '<input type="text" class="form-control bg-danger text-white" id="status" value="'. $data['pengaduan']['status'] .'" disabled>';
                                }elseif($data['pengaduan']['status'] == "proses"){
                                    echo '<input type="text" class="form-control bg-warning text-white" id="status" value="'. $data['pengaduan']['status'] .'" disabled>';
                                }elseif($data['pengaduan']['status'] == "selesai"){
                                    echo '<input type="text" class="form-control bg-success text-white" id="status" value="'. $data['pengaduan']['status'] .'" disabled>';
                                }
                                ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="font-weight-bold" for="tgl">Tanggal Pengaduan</label>
                            <input type="date" class="form-control" id="tgl" value="<?= $data['pengaduan']['tgl_pengaduan'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="font-weight-bold" for="tgl_tanggapan">Tanggal Tanggapan</label>
                            <input type="date" class="form-control" id="tgl_tanggapan" value="<?= $data['tanggapan']['tgl_tanggapan'] ?>" disabled>
                        </div>
                    </div>
                </div>
                <?php if($_SESSION['status'] != 'user'){ ?>
                    <div class="form-group">
                        <label class="font-weight-bold" for="nama_petugas">Nama Petugas</label>
                        <input type="text" class="form-control" id="nama_petugas" value="<?= $data['tanggapan']['nama_petugas'] ?>" disabled>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label class="font-weight-bold" for="judul">Judul Laporan</label>
                    <input type="text" class="form-control" id="judul" value="<?= $data['pengaduan']['judul_laporan'] ?>" disabled>
                </div>
                <?php if($data['pengaduan']['status'] == '0' || $data['pengaduan']['status'] == 'proses') { ?>
                    <div class="form-group">
                        <label class="font-weight-bold" for="isi">Isi Laporan</label>
                        <textarea name="isi" id="isi" class="form-control" cols="30" rows="10" disabled><?= $data['pengaduan']['isi_laporan'] ?>"</textarea>
                    </div>
                <?php } ?>
            </form>
        </div>
        <div class="col-sm-6">
            <label class="font-weight-bold" for="foto">Foto</label>
            <img id="foto" src="<?= BASEURL; ?>/img/<?= $data['pengaduan']['foto'] ?>" alt="<?= $data['pengaduan']['foto'] ?>" style="width:485px">
            <div class="row no-gutters">
                <div class="col-3">
                    <?php 
                    if($data['pengaduan']['status'] == '0' && $_SESSION['status'] != 'user') {
                        echo '
                            <a href="'. BASEURL .'/pengaduan/verifikasi" class="btn btn-outline-secondary mt-3">Kembali</a>
                        ';
                    } elseif($data['pengaduan']['status'] == 'proses' && $_SESSION['status'] != 'user'){
                        echo '
                            <a href="'. BASEURL .'/pengaduan/proses" class="btn btn-outline-secondary mt-3">Kembali</a>
                        ';
                    } elseif($data['pengaduan']['status'] == '0' || $data['pengaduan']['status'] == 'proses' && $_SESSION['status'] == 'user'){
                        echo '
                            <a href="'. BASEURL .'/pengaduan" class="btn btn-outline-secondary mt-3">Kembali</a>
                        ';
                    }
                    ?>
                </div>
                <div class="col-6">
                    <?php if($data['pengaduan']['status'] == '0' && $_SESSION['status'] == 'admin' || $data['pengaduan']['status'] == '0' && $_SESSION['status'] == 'petugas') { ?>
                        <form action="<?= BASEURL ?>/pengaduan/doVerifikasi" method="post">
                            <input type="hidden" name="id_pengaduan" value="<?= $data['pengaduan']['id_pengaduan'] ?>">
                            <button type="submit" name="submit" class="btn btn-primary mt-3 ml-n4">Verifikasi <i class="fa fa-check"></i></button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
        <?php if($data['pengaduan']['status'] == 'selesai') { ?>
            <div class="form-group">
                <label class="font-weight-bold" for="isi">Isi Laporan</label>
                <textarea name="isi" id="isi" class="form-control" cols="30" rows="10" disabled><?= $data['pengaduan']['isi_laporan'] ?>"</textarea>
            </div>
        <?php } ?>
        </div>
        <div class="col-sm-6">
            <?php 
                if($data['pengaduan']['status'] == 'selesai'){
                    echo '
                        <div class="form-group">
                            <label class="font-weight-bold" for="tanggapan">Tanggapan</label>
                            <textarea name="tanggapan" id="tanggapan" class="form-control" cols="30" rows="10" disabled>'. $data["tanggapan"]["tanggapan"] .'</textarea>
                            </div>
                    ';
                    if($_SESSION['status'] == 'user'){
                        echo '<a href="'. BASEURL .'/pengaduan" class="btn btn-outline-primary float-right">Kembali</a>';
                    } else{
                        echo '<a href="'. BASEURL .'/pengaduan/selesai" class="btn btn-outline-primary float-right">Kembali</a>';
                    }
                } 
            ?>
        </div>
    </div>
    <br><br>
</div>