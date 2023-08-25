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
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data Jabatan
                        </button>
                        <h4 class="card-title">Data Table</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pegawai</th>
                                        <th>Nama Jabatan</th>
                                        <th>Gaji Pokok</th>
                                        <th>Tunjangan Transport</th>
                                        <th>Uang Makan</th>
                                        <th>Bonus</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($nama as $pgw) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $pgw['nama_pegawai'] ?></td>
                                            <td><?= $pgw['jabatan'] ?></td>
                                            <td><?= $pgw['gaji_pokok'] ?></td>
                                            <td><?= $pgw['tj_transport'] ?></td>
                                            <td><?= $pgw['uang_makan'] ?></td>
                                            <td><?= $pgw['bonus'] ?></td>
                                            <td>
                                                <a href="" class="badge badge-success">edit</a>
                                                <a href="<?= base_url() ?>/admin/hapus/<?= $pgw['id_jabatan']; ?>" class="badge badge-danger" onclick="return confirm('yakin?');">hapus</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                                        <form class="form-valide" action="<?= base_url('admin/tambahdata') ?>" method="post">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-nik">Nik <span class="text-danger">*</span>
                                                </label>
                                                <div class="col">
                                                    <input type="text" class="form-control" id="val-nik" name="nik" placeholder="Enter a nik..">
                                                </div>
                                                <?php echo form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-nama_pegawai">Nama Pegawai <span class="text-danger">*</span>
                                                </label>
                                                <div class="col">
                                                    <input type="text" class="form-control" id="val-nama_pegawai" name="nama_pegawai" placeholder="Your valid nama_pegawai..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-email">email <span class="text-danger">*</span>
                                                </label>
                                                <div class="col">
                                                    <input type="text" class="form-control" id="val-email" name="email" placeholder="Choose a safe one..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span>
                                                </label>
                                                <div class="col">
                                                    <select class="form-control" id="val-jenis_kelamin" name="jenis_kelamin">
                                                        <option value="">Please select</option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-jabatan">Jabatan <span class="text-danger">*</span>
                                                </label>
                                                <div class="col">
                                                    <select class="form-control" id="val-jabatan" name="jabatan">
                                                        <option value="">Please select</option>
                                                        <option value="Design">Design</option>
                                                        <option value="Admin">Admin Slot</option>
                                                        <option value="Web dev">Web dev</option>
                                                        <option value="Sosmed">Sosmed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-tanggal">Tanggal Masuk <span class="text-danger">*</span>
                                                </label>
                                                <div class="col">
                                                    <input type="date" class="form-control" id="val-tanggal" name="tanggal" placeholder="$21.60">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label"><a href="#">Status</a> <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <label class="css-control css-control-primary css-checkbox" for="val-
                                                status">
                                                        <input type="hidden" class="css-control-input" id="val-
                                                    status" name="status" value="false" checked>
                                                        <input type="checkbox" class="css-control-input" id="val-
                                                    status" name="status" value="true" checked>
                                                        <span class="css-control-indicator"></span> I agree to the status</label>
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
</div>