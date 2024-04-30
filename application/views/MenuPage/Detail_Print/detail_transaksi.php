<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title; ?>/</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
      .cards {
        margin-left: 800px;
        height: 20%;
        display: flex;
        width: 25%;
        justify-content: right;
        align-items: right;
      }
    </style>
</head>

<body>
    <div class="container">
      <h1 class="text-center" >BUMDES KRANDON JAYA MANDIRI</h1>
      <h1 class="text-center" >Laporan Transaksi PAM <?= $transaksi[0]->bulan ?> / <?= $transaksi[0]->tahun ?></h1>
      <table class="table table-bordered">
          <tr>
            <td>No. </td>
            <td>Nama</td>
            <td>Total Penggunaan</td>
            <td>Admin</td>
            <td>Total Biaya</td>
          </tr>
          <?php $no = 1 ?>
          <?php foreach($transaksi as $d) : ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $d->nama ?></td>
            <td>Rp. <?= number_format($d->total_penggunaan, 0, ',' , '.') ?></td>
            <td>Rp. 5.000</td>
            <td>Rp. <?= number_format($d->total_biaya, 0, ',' , '.') ?></td>
          </tr>
          <?php $no++ ?>
          <?php endforeach ?>
      </table>
    </div>
    <div class="row">
      <div class="cards float-right">
        <p>mengetahui</p>
        <p>Kepala Desa Krandon</p>
        <br><br><br>
        <p>CASNURI, S.E.</p>
      </div>
    </div>

</body>
</html>