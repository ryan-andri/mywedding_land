<?php
require_once('configs/config.php');

// guest name
$nama_undangan = !empty($_GET["undangan"]) ? $_GET["undangan"] : null;
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta charset="utf-8" />
  <title>The Wedding</title>
  <link rel="icon" type="image/x-icon" href="" />
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Outfit" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <!-- Main style -->
  <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>
  <!-- core -->
  <div class="bg-image">
    <div class="alert alert-primary alert-dismissible fade show visible-alert" role="alert">
      <strong>Buka dengan Smartphone anda untuk melihat full undangan!</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="caption align-item-center justify-content-center">
      <h1><?php echo env('nick_wanita'); ?> &amp; <?php echo env('nick_pria'); ?></h1>
      <h3>We Are Getting Married</h3>
      <?php if ($nama_undangan) { ?>
        <div class="card card-guest mx-auto align-items-center d-flex justify-content-center">
          <p class="mb-1"><?php echo $nama_undangan; ?> <br> dan <br> Keluarga</p>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="visible">
    <!-- seperators -->
    <div class="mt-2 text-center justify-content-center">
      <i style="font-size: 16px;" class="far">&#xf192;</i>
      <i style="font-size: 16px;" class="far">&#xf192;</i>
      <i style="font-size: 16px;" class="far">&#xf192;</i>
    </div>

    <div class="shadow-lg justify-content-center">
      <div class="card p-2 text-center m-2">
        <div class="text-center m-2">
          <img class="img-fluid" src="assets/images/Bismillah_Calligraphy6.svg" width="150" height="120" />
          <p class="text-beautify"><strong>Assalamualaikum Wr. Wb</strong></p>
        </div>
        <div class="card border-dark m-2">
          <div class="card-body">
            <p class="card-title text-center justify-content-center text-beautify" style="text-align: left;">
              <strong>Akad</strong>
            </p>
            <p><?php echo env('tgl_akad'); ?></p>
            <p class="text-lg"><?php echo env('alamat_akad'); ?></p>
          </div>
        </div>
        <div class="card border-dark m-2 p-0">
          <div class="card-body">
            <p class="card-title text-center justify-content-center text-beautify" style="text-align: left;">
              <strong>Resepsi</strong>
            </p>
            <p><?php echo env('tgl_resepsi'); ?></p>
            <p class="text-lg"><?php echo env('alamat_resepsi'); ?></p>
          </div>
        </div>
      </div>

      <!-- seperators -->
      <div class="m-2 text-center justify-content-center">
        <i style="font-size: 16px;" class="far">&#xf192;</i>
        <i style="font-size: 16px;" class="far">&#xf192;</i>
        <i style="font-size: 16px;" class="far">&#xf192;</i>
      </div>

      <div class="card p-2 text-center m-2">
        <p class="text-beautify"><strong>Pesan dan Kesan</strong></p>
        <!-- get -->
        <div class="card scrollable mb-4">
          <div id="komentar-container"></div>
        </div>

        <!-- input -->
        <form method="post">
          <div class="form-group">
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama" />
          </div>
          <div class="form-group">
            <select class="form-control" style="font-size: 16px !important;" name="kehadiran" id="kehadiran">
              <option selected value="">Kehadiran ?</option>
              <option value="hadir">Hadir</option>
              <option value="tidak hadir">Tidak Hadir</option>
            </select>
          </div>
          <div class="form-group">
            <textarea class="form-control" id="komentar" name="komentar" rows="4" placeholder="Silahkan beri komentar.."></textarea>
          </div>
          <button id="submit" class="form-control btn btn-primary">
            Kirim
          </button>
        </form>
      </div>
    </div>

    <footer class="footer mt-2">
      Copyright &copy; Ryan Andri
    </footer>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <!-- right click ? nope -->
    <!-- <script>
    $(document).ready(function() {
      $(document).bind("contextmenu", function(e) {
        return false;
      });
    });
  </script> -->
    <script>
      $(document).ready(function() {
        // load data
        ExecService(0);
        // sent data
        $("#submit").click(function() {
          ExecService(1);
          event.preventDefault();
        });
        // service
        function ExecService(param) {
          let nama = $("#nama").val();
          let kehadiran = $("#kehadiran").val();
          let komentar = $("#komentar").val();

          if (param == '1') {
            if (nama == '') {
              alert("Kolom nama harap di isi.");
              return false;
            }
            if (kehadiran == '') {
              alert("Kolom kehadiran harap di isi.");
              return false;
            }
          }

          $.ajax({
            type: "POST",
            url: "service.php",
            data: {
              nama: nama,
              kehadiran: kehadiran,
              komentar: komentar,
              opt: param
            },
            cache: false,
            success: function(data) {
              if (param == '0') {
                $("#komentar-container").html(data);
              }

              if (data != '') {
                if (param == '1')
                  alert('Terima Kasih telah berkomentar :)');
                // reload data
                $("#komentar-container").html(data);
                // reset field
                $("#nama").val('');
                $("#kehadiran").val('');
                $("#komentar").val('');
              } else {
                if (param == '1')
                  alert('Ooops, terjadi masalah!');
              }
            },
            error: function(msg, status, error) {
              console.error(msg);
            }
          });
        }
      });
    </script>
</body>

</html>