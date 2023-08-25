<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>



    <!-- row -->

    <div class="container-fluid">


        <div class="row">

            <div class="col-12">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        Filter Data Absensi Pegawai
                    </div>
                    <div class="card-body">
                        <form class="form-inline">
                            <div class="form-group mb-2">
                                <label for="from">From</label>
                                <input type="text" id="from" name="from" class="form-control ml-3">
                            </div>
                            <div class="form-group mb-2 ml-5">
                                <label for="to">to</label>
                                <input type="text" id="to" name="to" class="form-control ml-3">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
                            <a href="<?php echo base_url('admin/inputabsensii') ?>" class="btn btn-success mb-2 ml-3"><i class="fas fa-plus"></i> Input Kehadiran</a>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <!-- Button trigger modal -->
                        <!-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#inputKehadiran">
                            Input Kehadiran
                        </button> -->
                        <a href="<?= base_url('admin/inputabsensi'); ?>" class="btn btn-primary mb-3">
                            Update Kehadiran
                        </a>
                        <!-- <a href="<?= base_url('admin/inputabsensii'); ?>" class="btn btn-primary mb-3">
                            Input Kehadiran
                        </a> -->
                        <h3 class="card-title">Menampilkan bulan 8 tahun 2022</h3>
                        <h4 class="card-title">Data Table</h4>
                        <form class="form-valide" action="<?= base_url('admin/tambahdata') ?>" method="post">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama Pegawai</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jabatan</th>
                                            <th>Hadir</th>
                                            <th>Sakit</th>
                                            <th>Alpha</th>
                                            <th>Potongan</th>
                                            <th>Keterangan</th>
                                            <th>bulan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        <?php foreach ($Nik as $pgw) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $pgw['nik'] ?></td>
                                                <td><?= $pgw['nama_pegawai'] ?></td>
                                                <td><?= $pgw['jenis_kelamin'] ?></td>
                                                <td><?= $pgw['jabatan'] ?></td>
                                                <td><?= $pgw['hadir'] ?></td>
                                                <td><?= $pgw['sakit'] ?></td>
                                                <td><?= $pgw['alpha'] ?></td>
                                                <td><?= $pgw['potongan'] ?></td>
                                                <td><?= $pgw['keterangan'] ?></td>
                                                <td><?= $pgw['bulan'] ?></td>
                                                <td>
                                                    <button type="button" class="badge badge-primary" data-toggle="modal" data-target="#inputKehadiran<?= $pgw['id_kehadiran']; ?>">
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end
***********************************-->


<!-- Modal -->
<!-- <div class="modal fade" id="inputKehadiran" tabindex="-1" aria-labelledby="inputKehadiranLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputKehadiranLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-validation">
                                        <form class="form-valide" action="<?= base_url('admin/updateabsensi') ?>" method="post">
                                            <?php foreach ($Nik as $ip) ?>
                                            <input type="text" name="id_kehadiran" value="<?= $ip['id_kehadiran']; ?>">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-nik">Nik
                                                </label>
                                                <div class="col">
                                                    <input type="text" class="form-control" id="val-nik" name="nik" placeholder="Enter a nik.." value="<?= $ip['nik']; ?>" readonly>
                                                </div>
                                                <?php echo form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-nama_pegawai">Nama Pegawai
                                                </label>
                                                <div class="col">
                                                    <input type="text" class="form-control" id="val-nama_pegawai" name="nama_pegawai" placeholder="Your valid nama_pegawai.." value="<?= $ip['nama_pegawai']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-jenis_kelamin">Jenis Kelamin
                                                </label>
                                                <div class="col">
                                                    <select class="form-control" id="val-jenis_kelamin" name="jenis_kelamin" readonly>
                                                        <option value="<?= $ip['jenis_kelamin']; ?>"><?= $ip['jenis_kelamin']; ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-jabatan">Jabatan
                                                </label>
                                                <div class="col">
                                                    <select class="form-control" id="val-jabatan" name="jabatan" readonly>
                                                        <option value="<?= $ip['jabatan']; ?>"><?= $ip['jabatan']; ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-nik">Hadir
                                                </label>
                                                <div class="col">
                                                    <input type="number" class="form-control" id="val-nik" name="hadir" placeholder="Enter a nik.." value="<?= $ip['hadir']; ?>">
                                                </div>
                                                <?php echo form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-nik">Sakit
                                                </label>
                                                <div class="col">
                                                    <input type="number" class="form-control" id="val-nik" name="sakit" placeholder="Enter a nik.." value="<?= $ip['sakit']; ?>">
                                                </div>
                                                <?php echo form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-nik">alpha
                                                </label>
                                                <div class="col">
                                                    <input type="number" class="form-control" id="val-nik" name="alpha" placeholder="Enter a nik.." value="<?= $ip['alpha']; ?>">
                                                </div>
                                                <?php echo form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div> -->