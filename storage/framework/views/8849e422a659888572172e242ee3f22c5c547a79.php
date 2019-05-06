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
                                <h4 class="title">Buat User</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control border-input" value="<?php echo e(old('username')); ?>" placeholder="Username.." required>
                                                <p class="label label-danger"><?php echo e($errors->first('username')); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control border-input" value="<?php echo e(old('password')); ?>" placeholder="password.." required>
                                                <p class="label label-danger"><?php echo e($errors->first('password')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Role</label>
                                                <select name="role" class="form-control border-input" required>
                                                    <option disabled selected value="">Pilih Role..</option>
                                                    <option value="user">User</option>
                                                    <?php if(Auth::user()->role == "admin"): ?>
                                                    <option value="assessor">Assessor</option>
                                                    <?php endif; ?>
                                                </select>
                                                <p class="label label-danger"><?php echo e($errors->first('role')); ?></p>
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