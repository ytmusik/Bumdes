<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bumdes Krandon Jaya Mandiri | <?= $title ?></title>

    <?php $this->load->view('SuptPage/CssP') ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url() ?>" class="site_title"><i class="fa fa-paw"></i> <span>Bumdes Krandon Jaya Mandiri</span></a>
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
          <div class="col-md-12">
              <button class="btn btn-md btn-warning" onclick="window.location.href=document.referrer">Batal | Kembali</button>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h1>Bayar Tagihan</h1>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form action="<?= base_url('update-transaksi-sampah') ?>" id="" method="POST" class="form-horizontal form-label-left">
                    <input type="hidden" name="transaksi_id" value="<?= $d->transaksi_id ?>" >
                    <div class="form-group">
                        <?php $user = $this->db->get_where('user', ['user_id' => $d->user_id])->row(); ?>
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="">User</label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <select name="user_id" id="user_id" class="form-control" readonly>
                              <option value="<?= $user->user_id ?>"><?= $user->nama ?></option>
                          </select>
                        </div>
                      </div> <br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="">Bulan</label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <select name="bulan" id="bulan" class="form-control" readonly>
                              <option value="<?= $d->bulan ?>"><?= $d->bulan ?></option>
                          </select>
                        </div>
                      </div> <br>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-3" for="">Tahun</label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <select name="tahun" id="tahun" class="form-control" readonly>
                              <option value="<?= $d->tahun ?>"><?= $d->tahun ?></option>
                          </select>
                        </div>
                      </div> <br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="">Tanggal Bayar</label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <input type="date" autocomplete="off" required="" class="form-control" name="tanggal_bayar" value="<?= date('Y-m-d') ?>" readonly>
                        </div>
                      </div> <br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="">Bayar</label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <input autocomplete="off" type="number" required="" class="form-control" name="bayar" >
                        </div>
                      </div><br>
                      
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-md btn-primary">Kirim</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    

    <?php $this->load->view('SuptPage/JsP') ?>
    <script src="<?= base_url('asset/JS/Fitur.js') ?>"></script>
    <script src="<?= base_url('asset/JS/Dtmpicker.js') ?>"></script>
    <script src="<?= base_url('asset/JS/Error_handler.js') ?>"></script>
    <script src="<?= base_url('asset/JS/Form_edit.js') ?>"></script>
  </body>
</html>
