
<div class="container mt-3">
    <h3>Form Laporan Pengaduan</h3>
    <br>
    <form action="<?= BASEURL ?>/pengaduan/prosesTambah" method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label for="judul">Judul Laporan</label>
            <input type="text" name="judul_laporan" class="form-control" id="judul" required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="isi_laporan">Isi Laporan</label>
            <textarea name="isi_laporan" id="isi_laporan" class="form-control" cols="30" rows="10" required></textarea>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" class="form-control" id="foto">
            <span class="text-danger">*type photo harus <span class="font-weight-bold">.jpg, .png, .jpeg</span></span>
        </div>
        <a href="<? BASEURL ?>/pengaduan" class="btn btn-outline-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    <br><br>
</div>