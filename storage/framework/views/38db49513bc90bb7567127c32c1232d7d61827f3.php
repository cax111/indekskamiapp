<?php echo $__env->make('templates.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(Auth::user()->role != "admin"): ?>
        <?php redirect()->to('/')->send(); ?>
    <?php endif; ?>
    <?php if($id<7): ?>
        <?php redirect()->to('/tampil-variable/')->send(); ?>
    <?php endif; ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tambah Instrument</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Judul Instrument</label>
                                                        <select name="judul_instrument" class="form-control border-input" required>
                                                            <option disabled selected value="">Pilih Judul Instrument..</option>
                                                            <?php $__currentLoopData = $judul_instrument; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($tampil->id_judul_instrument); ?>"><?php echo e($tampil->isi_judul_instrument); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <p class="label label-danger"><?php echo e($errors->first('username')); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
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
                                                        <textarea name="isi_instrument" class="form-control border-input" placeholder="Isi Instrument.." required><?php echo e(old('isi_instrument')); ?></textarea>
                                                        <p class="label label-danger"><?php echo e($errors->first('isi_instrument')); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">    
                                                    <div class="row">
                                                      <label>
                                                        Isi Parameter/Jawaban
                                                      </label>
                                                      <br/>
                                                      <?php $__currentLoopData = $parameter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <input type="checkbox" name="parameter[]" value="<?php echo e($tampil->id_parameter); ?>"> <?php echo e($tampil->isi_parameter); ?><br>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="btn btn-warning" href="/tampil-instrument/<?php echo e($id); ?>">Kembali</a>
                                            <button type="submit" class="btn btn-success btn-wd pull-right">Simpan</button>
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