<div class="container mt-3">
    <?php 
        if($_SESSION['status'] == "admin" || $_SESSION['status'] == "petugas"){
            echo '
                <h3><i class="fas fa-list-alt"></i> Daftar Laporan Pengaduan</h3>
                <hr class="bg-secondary">
                <br>
                <a href="' . BASEURL . '/pengaduan/verifikasi" class="btn btn-danger">Laporan Belum Terverifikasi <span class="badge badge-light">' . count($data['verifikasi']) . '</span></a>
                <a href="' . BASEURL . '/pengaduan/proses" class="btn btn-warning ml-2 mr-2 text-white">Laporan Terverifikasi <span class="badge badge-light">' . count($data['proses']) . '</span></a>
                <a href="' . BASEURL . '/pengaduan/selesai" class="btn btn-success">Laporan Selesai <span class="badge badge-light">' . count($data['selesai']) . '</span></a>
            ';

            echo '
                <br><br>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Judul Laporan</th>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>';        
                    $no = 1;
                    foreach ($data["allPengaduan"] as $p) {
                        echo '
                            <tr>
                                <td>'. $no++ .'</td>
                                <td>'. date('d F Y', strtotime($p["tgl_pengaduan"])) .'</td>
                                <td>'. $p["judul_laporan"] .'</td>
                                <td>'. (str_word_count($p["isi_laporan"]) > 10 ? substr($p["isi_laporan"],0,47)."..." : $p["isi_laporan"]) .'</td>
                                <td><img src="'.BASEURL.'/img/'.$p["foto"].'" alt="'. $p["foto"] .'" style="width:150px"></td>
                                ';
                                if($p['status'] == '0'){
                                    echo '
                                        <td class="text-center" style="font-size:13pt"><span class="badge badge-danger">'. $p["status"] .'</span></td>
                                    ';
                                }elseif($p['status'] == 'proses'){
                                    echo '
                                        <td class="text-center" style="font-size:13pt"><span class="badge badge-warning text-white">'. $p["status"] .'</span></td>
                                    ';
                                }elseif($p['status'] == 'selesai'){
                                    echo '
                                        <td class="text-center" style="font-size:13pt"><span class="badge badge-success">'. $p["status"] .'</span></td>
                                    ';
                                }
                        echo '</tr>';

                    }
                    echo '
                        </tbody>
                    </table>';
        }
    ?>

    <?php
        if ($_SESSION['status'] == "user") {
            
            echo '
            <h3><i class="fas fa-list-alt"></i> Daftar Laporan Pengaduan</h3>
                <hr class="bg-secondary">
                <br>
                <a href="'. BASEURL .'/pengaduan/tambah" class="btn btn-primary mb-2"><i class="fa fa-edit">  </i> Buat Laporan</a>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';        
                    $no = 1;
                    foreach ($data["pengaduan"] as $p) {
                        echo '
                        <tr>
                            <td>'. $no++ .'</td>
                            <td>'. $p["tgl_pengaduan"] .'</td>
                            <td>'. $p["judul_laporan"] .'</td>
                            <td>'. (str_word_count($p["isi_laporan"]) > 10 ? substr($p["isi_laporan"],0,47)."..." : $p["isi_laporan"]) .'</td>
                            <td><img src="'.BASEURL.'/img/'.$p["foto"].'" alt="'. $p["foto"] .'" style="width:150px"></td>
                            ';
                            if($p['status'] == '0'){
                                echo '
                                    <td class="text-center" style="font-size:13pt"><span class="badge badge-danger badge-sm">'. $p["status"] .'</span></td>
                                ';
                            }elseif($p['status'] == 'proses'){
                                echo '
                                    <td class="text-center" style="font-size:13pt"><span class="badge badge-warning badge-sm text-white">'. $p["status"] .'</span></td>
                                ';
                            }elseif($p['status'] == 'selesai'){
                                echo '
                                    <td class="text-center" style="font-size:13pt"><span class="badge badge-success badge-sm">'. $p["status"] .'</span></td>
                                ';
                            }
                        echo '
                            <td>
                                <a href="'. BASEURL .'/pengaduan/detail/'. $p['id_pengaduan'] .'" class="btn btn-info btn-sm">Detail</a>
                            </td>
                        </tr>';

                    }
                    echo '
                        </tbody>
                    </table>';

        }
    ?>

</div>