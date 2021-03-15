$(function(){

  $('.tombolTambahData').on('click', function(){

    $('#formModalLabel').html('Tambah Data Mahasiswa');
    $('.modal-footer button[type=submit]').html('Tambah Data');

  });

  $('.tampilModalUbah').on('click', function(){
      
      $('#formModalLabel').html('Edit Data Mahasiswa');
      $('.modal-footer button[type=submit]').html('Edit Data');

  });

});