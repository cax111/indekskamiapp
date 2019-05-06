<?php echo $__env->make('templates.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(Auth::user()->role != "admin"): ?>
        <?php redirect()->to('/')->send(); ?>
    <?php endif; ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tambah Judul Instrument</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Judul Instrument</label>
                                                <input type="text" name="isi_judul_instrument" class="form-control border-input" value="<?php echo e(old('isi_judul_instrument')); ?>" placeholder="Isi judul instrument.." required>
                                                <p class="label label-danger"><?php echo e($errors->first('isi_judul_instrument')); ?></p>
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