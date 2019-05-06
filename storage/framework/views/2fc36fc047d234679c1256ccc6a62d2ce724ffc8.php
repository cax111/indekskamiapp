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
                                <h4 class="title">Tambah User</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <select name="role" class="form-control border-input" required>
                                                    <option disabled selected value="">Pilih Judul Instrument..</option>
                                                    <?php $__currentLoopData = $judul_instrument; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($tampil->id_judul_instrument); ?>"><?php echo e($tampil->isi_judul_instrument); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <p class="label label-danger"><?php echo e($errors->first('username')); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Bobot Instrument</label>
                                                <input type="text" name="bobot_instrument" class="form-control border-input" value="<?php echo e(old('bobot_instrument')); ?>" placeholder="bobot instrument.." required>
                                                <p class="label label-danger"><?php echo e($errors->first('bobot_instrument')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Isi Instrument</label>
                                                <textarea name="isi_instrument" class="form-control border-input" value="<?php echo e(old('isi_instrument')); ?>" placeholder="Isi Instrument.." required></textarea>
                                                <p class="label label-danger"><?php echo e($errors->first('isi_instrument')); ?></p>
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