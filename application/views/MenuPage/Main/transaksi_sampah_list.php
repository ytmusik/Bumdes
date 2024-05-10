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
    <link href="<?= base_url('asset/') ?>/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css"
        rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?= site_url('home') ?>" class="site_title"><i class="fa fa-paw"></i> <span>Bumdes
                                Kalipuru</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?= isset($this->ses->img)?base_url('media/admin/'.$this->ses->img):base_url('media/admin/unnamed.png') ?>"
                                alt="foto-admin" class="img-circle profile_img">
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
                            <h1>Daftar Transaksi Sampah</h1>
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
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <a href="tambah-transaksi-sampah" class="btn btn-md btn-info float-left">Input Tagihan</a>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 text-right align-center">
                                    <form action="cetak-transaksi" method="post" class="form-inline">
                                        <select name="bulan" id="bulan" class="form-control">
                                            <option value="Januari">Januari</option>
                                            <option value="Februari">Februari</option>
                                            <option value="Maret">Maret</option>
                                            <option value="April">April</option>
                                            <option value="Mei">Mei</option>
                                            <option value="Juni">Juni</option>
                                            <option value="Juli">Juli</option>
                                            <option value="Agustus">Agustus</option>
                                            <option value="September">September</option>
                                            <option value="Oktober">Oktober</option>
                                            <option value="November">November</option>
                                            <option value="Desember">Desember</option>
                                        </select>

                                        <select name="tahun" id="tahun" class="form-control">
                                            <?php $tahun = date('Y') ?>
                                            <option value="<?= $tahun-3 ?>"><?= $tahun-3 ?></option>
                                            <option value="<?= $tahun-2 ?>"><?= $tahun-2 ?></option>
                                            <option value="<?= $tahun-1 ?>"><?= $tahun-1 ?></option>
                                            <option value="<?= $tahun ?>"><?= $tahun ?></option>
                                            <option value="<?= $tahun+1 ?>"><?= $tahun+1 ?></option>
                                            <option value="<?= $tahun+2 ?>"><?= $tahun+2 ?></option>
                                            <option value="<?= $tahun+3 ?>"><?= $tahun+3 ?></option>
                                        </select>
                                        <button class="btn btn-success btn-xs" type="submit"><i class="fa fa-print"></i>
                                            Cetak</button>
                                    </form>
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
                                        <th>User</th>
                                        <th>Periode</th>
                                        <th>Tagihan</th>
                                        <th>Bayar</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody data-act="hapus-aset-sewa" data-meth="POST">
                                    <?php $nomor=1?>
                                    <?php foreach($transaksi as $d):?>
                                    <tr>
                                        <td class="text-center"><?php echo $nomor ?></td>
																				<?php $user = $this->db->get_where('user', ['user_id' => $d->user_id])->row(); ?>
                                        <td><?php echo $user->nama ?></td>
                                        <td><?php echo $d->bulan . "/" . $d->tahun ?></td>
                                        <td>Rp. 15.000</td>
                                        <td>
																					<?php if($d->bayar != null) : ?>
                                            Rp. <?= number_format($d->bayar, 0, ',' , '.') ?>
                                            <?php else : ?>
																							Rp. -
																						<?php endif; ?>
																				</td>
																				<td><?php echo date('d-m-Y', strtotime($d->tanggal_bayar)) ?></td>
                                        <td class="text-center">
                                            <?php if($d->status == 0) : ?>
                                            <div class="badge bg-red">Belum bayar</div>
                                            <?php else : ?>
                                            <div class="badge bg-green">Lunas</div>
                                            <?php endif ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="edit-transaksi-sampah/<?= $d->transaksi_id ?>"
                                                class="btn btn-xs btn-success">Bayar</a>
                                            <!-- <a onclick="return confirm('are your sure want to delete this?')" href="delete-range/<?= $d->transaksi_id ?>" type="button" class="btn btn-xs btn-danger hapus">Hapus</a> -->
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
    <sc ript src="<?= base_url('asset') ?>/JS/Fitur.js">
        </script>
        <script src="<?= base_url('asset/JS/Ajax_req.js') ?>"></script>
        <script>
        bagi_hasil(JSON.parse('<?= $v_grafik ?>'), '#grafik_bagi_hasil', 2020);
        </script>
</body>

</html>
