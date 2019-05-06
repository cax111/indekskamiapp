<?php echo $__env->make('templates.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(Auth::user()->role == "user"): ?>
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
                                <h4 class="title">Tambah Variable</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Variable</label>
                                                <input type="text" name="nama_variable" class="form-control border-input" value="<?php echo e(old('nama_variable')); ?>" placeholder="Nama variable.." required>
                                                <p class="label label-danger"><?php echo e($errors->first('nama_variable')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-wd">Simpan</button>
                                        </div>
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