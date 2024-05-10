<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bumdes Kalipuru | <?= $title ?></title>

    <?php $this->load->view('SuptPage/CssP') ?>
    <!-- bootstrap-daterangepicker -->
    <link href="<?= base_url('asset/') ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?= base_url('asset/') ?>/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= site_url('home') ?>" class="site_title"><i class="fa fa-paw"></i> <span>Bumdes Kalipuru</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?= isset($this->ses->img)?base_url('media/admin/'.$this->ses->img):base_url('media/admin/unnamed.png') ?>" alt="foto-admin" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $this->ses->nm ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php $this->load->view('SuptPage/MenuPage') ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <?php $this->load->view('SuptPage/FooterButton') ?>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <?php $this->load->view('SuptPage/Notifikasi') ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" style="color: black;">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
            <h1>Daftar Range</h1>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <div class="col">
                  <?php if($this->ses->flashdata('sukses_tambah')) : ?>
                    <div class="alert alert-success" role="alert">
                      <i class="fa fa-checklist"></i>
                      Data berhasil ditambah
                    </div>
                  <?php elseif($this->ses->flashdata('sukses_update')) : ?>
                    <div class="alert alert-warning" role="alert">
                      Data berhasil dirubah
                    </div>
                  <?php elseif($this->ses->flashdata('sukses_delete')) : ?>
                    <div class="alert alert-danger" role="alert">
                      Data berhasil dihapus
                    </div>
                  <?php endif ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <a href="tambah-range" class="btn btn-md btn-info">Tambah Range</a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="row">
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <br>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel"> 
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Range</th>
                    <th>Biaya</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody data-act="hapus-aset-sewa" data-meth="POST">
                  <?php $nomor=1?>
                  <?php foreach($range as $d):?>
                    <tr>
                          <td class="text-center" ><?php echo $nomor ?></td>
                          <td><?php echo $d->range ?></td>
                          <td class="text-center" ><?php echo $d->biaya ?></td>
                          <td class="text-center">
                            <a href="edit-range/<?= $d->range_id ?>" class="btn btn-xs btn-warning">Ubah</a>
                            <a onclick="return confirm('are your sure want to delete this?')" href="delete-range/<?= $d->range_id ?>" type="button" class="btn btn-xs btn-danger hapus">Hapus</a>
                          </td>
                      </tr>
                      <?php $nomor++ ?>
                  <?php endforeach?>           
                  </tbody>
              </table>
            </div>
          </div>
        </div>
          
          <br>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer style="border-top: 1px solid #d9dee4;">
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <?php $this->load->view('SuptPage/JsP') ?>
    <script src="<?= base_url('asset/') ?>/JS/Highchart.js"></script>
    <script src="<?= base_url('asset/') ?>/JS/Form_hapus.js"></script>
    <!--Javascript tambahan -->
    <script src="<?= base_url('asset') ?>/JS/Fitur.js"></script>
    <script src="<?= base_url('asset/JS/Ajax_req.js') ?>"></script>
    <script>
      bagi_hasil(JSON.parse('<?= $v_grafik ?>'),'#grafik_bagi_hasil',2020);
      setTimeout(function(){ $('.alert').fadeOut() }, 3000);
    </script>
  </body>
</html>