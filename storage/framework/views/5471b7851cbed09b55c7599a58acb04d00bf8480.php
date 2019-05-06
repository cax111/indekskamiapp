<?php echo $__env->make('templates.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if($id != Auth::user()->id_user): ?>
        <?php redirect()->to('/ganti-password/'.Auth::user()->id_user)->send(); ?>
    <?php endif; ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Ganti Password</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control border-input" value="<?php echo e($user['username']); ?>" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control border-input" value="" placeholder="password.." required>
                                                <p class="label label-danger"><?php echo e($errors->first('password')); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tulis Ulang Password</label>
                                                <input type="password" name="cek-password" class="form-control border-input" value="" placeholder="tulis ulang password.." required>
                                                <p class="label label-danger"><?php echo e($errors->first('cek-password')); ?></p>
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