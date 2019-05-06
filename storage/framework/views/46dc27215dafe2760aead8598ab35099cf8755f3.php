<?php echo $__env->make('templates.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php if(Auth::user()->role != "admin"): ?>
  <?php redirect()->to('/')->send(); ?>
<?php endif; ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title"><i class="icon-success ti-write"> </i> Tampil Detail Instrument </h4>
          </div>
          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <form method="POST" action="">
                  <?php echo e(csrf_field()); ?>

                  <div style="margin:10px" class="col-md-12">
                    <?php $__currentLoopData = $instruments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="row">
                        <div class="col-md-4">Instrument</div>
                        <div class="col-md-8">: <?php echo $tampil->isi_instrument; ?></div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                  <div class="col-md-12">
                    <?php echo e($instruments->links()); ?>

                    <hr />
                    <div style="margin:10px" class="stats">
                      <a class="btn btn-warning" href="/variable/">Kembali</a>
                      <a class="pull-right btn btn-success" href="/tambah-user"><i class="ti-plus"></i>Tambah User</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="footer">
              <hr />
              <div class="stats">
                <p class="label label-danger"><?php echo e($errors->first('gagal')); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $__env->make('templates.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>