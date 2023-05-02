<?php
session_start();
require_once('configs/config.php');

// open DB Instance
$db = DBConnection::getInstance();

// button komentar!
if (isset($_POST['kirim_pesan'])) {
  // grab all input
  $input = filter_input_array(INPUT_POST);
  // remove button name/ids
  array_splice($input, count($input) - 1, 1);
  // sanity xss 
  $nama = htmlspecialchars($input['nama']);
  $kehadiran = htmlspecialchars($input['kehadiran']);
  $komentar = htmlspecialchars($input['komentar']);
  // insert data
  $query = "INSERT INTO komentar (nama, kehadiran, komentar, status) VALUES (?,?,?,?)";
  $command = $db->prepare($query);
  $res = $command->execute([$nama, $kehadiran, $komentar, 1]);
  if ($res) {
    $_SESSION['komentar_ok'] = 1;
  } else {
    $_SESSION['komentar_f'] = 1;
  }
}

// load komentar as rows
$que = $db->query('SELECT * FROM komentar');
$rows = $que->fetchAll(PDO::FETCH_ASSOC);
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
  <!-- sweetalert -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
  <!-- Main style -->
  <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>
  <!-- Pop up komentar -->
  <?php
  if (isset($_SESSION['komentar_f'])) { ?>
    <script type="text/javascript">
      Swal.fire({
        icon: 'error',
        title: 'Ooops!',
        text: 'Ada kesalahan!',
      })
    </script>
  <?php unset($_SESSION['komentar_f']);
  }
  if (isset($_SESSION['komentar_ok'])) { ?>
    <script type="text/javascript">
      Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: 'Terima Kasih Telah berkomentar :D',
      })
    </script>
  <?php unset($_SESSION['komentar_ok']);
  } ?>

  <!-- core -->
  <div class="bg-image">
    <div class="alert alert-primary alert-dismissible fade show visible-alert" role="alert">
      <strong>Buka dengan Smartphone anda untuk melihat full undangan!</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="caption">
      <h1><?php echo env('nick_wanita'); ?> &amp; <?php echo env('nick_pria'); ?></h1>
      <h3>We Are Getting Married</h3>
    </div>
  </div>

  <div class="visible">
    <!-- seperators -->
    <div class="mt-2 text-center justify-content-center">
      <i style="font-size: 16px;" class="far">&#xf192;</i>
      <i style="font-size: 16px;" class="far">&#xf192;</i>
      <i style="font-size: 16px;" class="far">&#xf192;</i>
    </div>

    <div class="shadow-lg m-2 justify-content-center">
      <div class="card p-2 text-center">
        <p>﷽</p>
        <p class="text-beautify">Assalamualaikum Wr. Wb</p>
        <p>Akad dan Resepsi</p>
        <p>Minggu, 23 Juli 2023</p>
        <p class="text-lg">Jl. Kedukan, Kertapati, Palembang</p>
      </div>
    </div>

    <!-- seperators -->
    <div class="m-2 text-center justify-content-center">
      <i style="font-size: 16px;" class="far">&#xf192;</i>
      <i style="font-size: 16px;" class="far">&#xf192;</i>
      <i style="font-size: 16px;" class="far">&#xf192;</i>
    </div>

    <div class="m-2 justify-content-center">
      <div class="card p-2 text-center">
        <p class="text-beautify">Pesan dan Kesan</p>
        <!-- get -->
        <div class="card scrollable mb-4">
          <?php foreach ($rows as $comments) { ?>
            <div class="card border-dark p-2 m-2">
              <div class="card-header"><strong><?php echo $comments['nama']; ?></strong></div>
              <div class="card-body">
                <p class="card-text"><?php echo $comments['komentar']; ?></p>
              </div>
            </div>
          <?php } ?>
        </div>

        <!-- input -->
        <form method="post">
          <div class="form-group">
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama" required />
          </div>
          <div class="form-group">
            <select class="form-control" style="font-size: 16px !important;" name="kehadiran" id="kehadiran" required>
              <option selected="selected" value="" disabled>Kehadiran</option>
              <option value="hadir">Hadir</option>
              <option value="tidak hadir">Tidak Hadir</option>
            </select>
          </div>
          <div class="form-group">
            <textarea class="form-control" id="komentar" name="komentar" rows="4" placeholder="Silahkan beri komentar.."></textarea>
          </div>
          <button type="submit" class="form-control btn btn-primary" name="kirim_pesan">
            Kirim
          </button>
        </form>
      </div>
    </div>

    <footer class="footer">
      Copyright &copy; The Wedding
    </footer>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>