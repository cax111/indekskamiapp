<?php echo $__env->make('templates.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(Auth::user()->role != "user"): ?>
        <?php redirect()->to('/')->send(); ?>
    <?php endif; ?>
    <?php if(\Session::get('isi_identitas')>0): ?>
        <?php redirect()->to('/variable')->send(); ?>
    <?php endif; ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Isi Identitas</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="">
                                    <?php echo e(csrf_field()); ?>

                                    <h5 class="title">Identitas Instansi Pemerintah</h5>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Satuan Kerja</label>
                                                <input type="text" name="satuan_kerja" class="form-control border-input" value="<?php echo e(old('satuan_kerja')); ?>"  value="<?php echo e(old('satuan_kerja')); ?>" placeholder="Satuan Kerja">
                                                <p class="label label-danger"><?php echo e($errors->first('satuan_kerja')); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Direktorat</label>
                                                <input type="text" name="direktorat" class="form-control border-input"  value="<?php echo e(old('direktorat')); ?>" placeholder="Direktorat">
                                                <p class="label label-danger"><?php echo e($errors->first('direktorat')); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Departemen</label>
                                                <input type="text" name="departemen" class="form-control border-input"  value="<?php echo e(old('departemen')); ?>" placeholder="Departemen">
                                                <p class="label label-danger"><?php echo e($errors->first('departemen')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="title">Alamat</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Alamat 1</label>
                                                <input type="text" name="alamat1" class="form-control border-input"  value="<?php echo e(old('alamat1')); ?>" placeholder="Alamat 1">
                                                <p class="label label-danger"><?php echo e($errors->first('alamat1')); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Alamat 2</label>
                                                <input type="text" name="alamat2" class="form-control border-input"  value="<?php echo e(old('alamat2')); ?>" placeholder="Alamat 2 (Opsional)">
                                                <p class="label label-danger"><?php echo e($errors->first('alamat2')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kota</label>
                                                <input type="text" name="kota" class="form-control border-input"  value="<?php echo e(old('kota')); ?>" placeholder="Kota">
                                                <p class="label label-danger"><?php echo e($errors->first('kota')); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kode Pos</label>
                                                <input type="text" name="kodepos" class="form-control border-input"  value="<?php echo e(old('kodepos')); ?>" placeholder="Kode Pos">
                                                <p class="label label-danger"><?php echo e($errors->first('kodepos')); ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomor Telepon</label>
                                                <input type="text" name="nomor_telepon" class="form-control border-input"  value="<?php echo e(old('nomor_telepon')); ?>" placeholder="(Kode Area) Nomor Telpon">
                                                <p class="label label-danger"><?php echo e($errors->first('nomor_telepon')); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control border-input"  value="<?php echo e(old('email')); ?>" placeholder="user@departemen_responden.go.id">
                                                <p class="label label-danger"><?php echo e($errors->first('email')); ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Pengisi Lembar Evaluasi</label>
                                                <input type="text" name="nama" class="form-control border-input"  value="<?php echo e(old('nama')); ?>" placeholder="Nama Pejabat">
                                                <p class="label label-danger"><?php echo e($errors->first('nama')); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NIP</label>
                                                <input type="text" name="nip" class="form-control border-input"  value="<?php echo e(old('nip')); ?>" placeholder="Nomor Induk Pegawai">
                                                <p class="label label-danger"><?php echo e($errors->first('nip')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jabatan</label>
                                                <input type="text" name="jabatan" class="form-control border-input"  value="<?php echo e(old('jabatan')); ?>" placeholder="Jabatan Struktural/Funsgional">
                                                <p class="label label-danger"><?php echo e($errors->first('jabatan')); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Pengisian</label>
                                                <input type="date" name="tanggal" class="form-control border-input"  value="<?php echo e(old('tanggal')); ?>" placeholder="Last Name">
                                                <p class="label label-danger"><?php echo e($errors->first('tanggal')); ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Deskripsi Ruang Lingkup</label>
                                                <textarea rows="5" name="deskripsi" class="form-control border-input"  value="<?php echo e(old('deskripsi')); ?>" placeholder="Isi dengan deskripsi ruang lingkup instansi (satuan kerja) dan infrastruktur TIK"></textarea>
                                                <p class="label label-danger"><?php echo e($errors->first('deskripsi')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-wd">Simpan</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php echo $__env->make('templates.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>