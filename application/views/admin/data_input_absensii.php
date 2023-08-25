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
                        <h4 class="card-title">Data Table</h4>
                        <form class="form-valide" action="<?= base_url('admin/tambahdataabsensii') ?>" method="post">
                            <button type="submit" class="btn btn-primary mb-3">Save Changes</button>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama Pegawai</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jabatan</th>
                                            <th class="d-none">Jabatan</th>
                                            <th>Tanggal</th>
                                            <th>Hadir</th>
                                            <th>Sakit</th>
                                            <th>Alpha</th>
                                            <th>Potongan</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        <?php foreach ($Nik as $pgw) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <input type="hidden" name="id[]" value="<?= $pgw['id_pegawai']; ?>">
                                                <td><?= $pgw['nik'] ?></td>
                                                <td><?= $pgw['nama_pegawai'] ?></td>
                                                <td><?= $pgw['jenis_kelamin'] ?></td>
                                                <td><?= $pgw['jabatan'] ?></td>
                                                <td class="d-none"><?= $pgw['bulan'] ?></td>
                                                <td><input type="date" class="form-control" id="val-nik" name="bulan[]" value="<?= $pgw['bulan']; ?>"></td>
                                                <td><input type="number" class="form-control" id="val-nik" name="hadir[]" value="<?= $pgw['hadir']; ?>"></td>
                                                <td><input type="number" class="form-control" id="val-nik" name="sakit[]" value="<?= $pgw['sakit']; ?>"></td>
                                                <td><input type="number" class="form-control" id="val-nik" name="alpha[]" value="<?= $pgw['alpha']; ?>"></td>
                                                <td><input type="number" class="form-control" id="val-nik" name="potongan[]" value="<?= $pgw['potongan']; ?>"></td>
                                                <td><textarea class="form-control" id="val-nik" name="keterangan[]" cols="40" rows="5"><?= $pgw['keterangan']; ?></textarea></td>
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