<?php echo $__env->make('templates.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php if(Auth::user()->role == "user"): ?>
  <?php redirect()->to('/')->send(); ?>
<?php endif; ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title"><i class="icon-success ti-user"> </i> Tampil User </h4>
            <p class="category"></p>
          </div>
          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <form method="POST" action="">
                  <?php echo e(csrf_field()); ?>

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th style="width:25%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <?php 
                        $i=1;
                      if (isset($_GET['page'])) {
                        $i=(10*$_GET['page'])-9;
                      }
                      
                      ?>
                      <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo $tampil->id_user; ?></td>
                        <td><?php echo $tampil->username; ?></td>
                        <td><?php echo $tampil->role; ?></td>
                        <td>
                          <div>
                            <a class="btn btn-warning" href="/ubah-user">Ubah</a>
                            <?php if(Auth::user()->role == "admin"): ?>
                            <a class="btn btn-danger" href="/hapus-user/<?php echo e($tampil->id_user); ?>"  onclick="return confirm('Apakah anda yakin menghapus user ini?')">Hapus</a>
                            <?php endif; ?>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                    <div class="col-md-12">
                      <?php echo e($user->links()); ?>

                      <hr />
                      <div style="margin:10px" class="stats">
                          <a class="btn btn-warning" href="/variable/">Kembali</a>
                          <a class="pull-right btn btn-success" href="/tambah-user"><i class="ti-plus"></i> Tambah User</a>
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