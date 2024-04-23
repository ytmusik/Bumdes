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
              <a href="<?= site_url('home') ?>" class="site_title"><i class="fa fa-paw"></i> <span>Bumdes Krandon Jaya Mandiri</span></a>
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
            <?php $this->load->view('SuptPage/'.$page) ?>
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
        <div class="right_col" role="main" style="color:black;">

          <div class="row">
            <a href="<?= base_url('rentalling') ?>">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-12">
                    <h3>PENYEWAAN</h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-center">
                    <img src="<?= base_url('asset/gambar/rent.png') ?>" alt="">
                  </div>
                </div>
              </div>
            </div>
            </a>
          <br>

          <a href="<?= base_url('transaksi') ?>">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-12">
                    <h3>PAMSIMAS</h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-center">
                    <img src="<?= base_url('asset/gambar/water.png') ?>" alt="">
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div>
          <br>
          <br>
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
    <script src="<?= base_url('asset') ?>/JS/Highchart.js"></script>
    <script src="<?= base_url('asset') ?>/JS/Form.js"></script>
    
    <script type="text/javascript">
      pertumbuhan_perdagangan_minggu(JSON.parse('<?= $v_graf ?>'),'#grafik_perdagangan', "<?= $nam_bulan ?>", "<?= $Y ?>")
      penyewaan(JSON.parse('<?= $v_grafik ?>'),'#grafik_penyewaan', '<?= $Y ?>')
      // pertumbuhan_penyewaan(JSON.parse('<?= $v_graf ?>'),'#grafik_penyewaan')
    </script>
  </body>
</html>