<?php 
  if($_SESSION['status'] == 'user'){
      header('location:'.BASEURL.'');
  }
?>
<div class="container mt-3">
    <h3>Detail Laporan</h3>
    <hr>
    <br>
    <div class="row">
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
                <div class="form-group">
                    <label class="font-weight-bold" for="tgl">Tanggal Pengaduan</label>
                    <input type="date" class="form-control" id="tgl" value="<?= $data['pengaduan']['tgl_pengaduan'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="judul">Judul Laporan</label>
                    <input type="text" class="form-control" id="judul" value="<?= $data['pengaduan']['judul_laporan'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="isi">Isi Laporan</label>
                    <textarea name="isi" id="isi" class="form-control" cols="30" rows="10" disabled><?= $data['pengaduan']['isi_laporan'] ?>"</textarea>
                </div>
            </form>
        </div>
        <div class="col-sm-6">
            <label class="font-weight-bold" for="foto">Foto</label>
                <img id="foto" src="<?= BASEURL; ?>/img/<?= $data['pengaduan']['foto'] ?>" alt="<?= $data['pengaduan']['foto'] ?>" style="width:485px">
        </div>
    </div>
    <form action="<?= BASEURL ?>/tanggapan/tambah" method="post">
        <?php 
            if($data['pengaduan']['status'] == 'proses'){
                echo '<div class="form-group">
                            <label class="font-weight-bold" for="tanggapan">Tanggapan</label>
                            <textarea name="tanggapan" id="tanggapan" class="form-control" cols="30" rows="10" required></textarea>
                        </div>';
                        echo '<a href="'. BASEURL .'/pengaduan/proses" class="btn btn-outline-secondary mr-2">Kembali</a>';
                        echo '<input type="hidden" name="id_pengaduan" value="'. $data['pengaduan']['id_pengaduan'] .'">';
                echo '<button type="submit" class="btn btn-primary">Submit</button>';

            }
        ?>
    </form>
    <br><br>    
</div>