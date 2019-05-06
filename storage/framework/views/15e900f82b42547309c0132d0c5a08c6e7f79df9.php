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
            <h4 class="title"><i class="icon-success ti-info-alt"> </i> Tampil Instrument </h4>
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
                        <th>No</th>
                        <th>Isi Instrument</th>
                        <th style="width:40%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <?php 
                        $i = 1;
                      	if (isset($_GET['page'])) {
                        	$i=(10*$_GET['page'])-9;
                      	}
                      
                      ?>
                      <?php if(count($instruments)==0): ?> 
                      <tr>
                        <td colspan="3" class="text-center">Data Instrument Belum diisi.</td>
                      </tr>
                      <?php else: ?>
                      <?php $__currentLoopData = $instruments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo $tampil->isi_instrument; ?></td>
                        <td>
                          <div>
                            <?php if($tampil->id_variable > 6): ?>
                            <a class="btn btn-info" href="/ubah-variable">Lihat Jawaban</a>
                            <a class="btn btn-warning" href="/ubah-variable">Ubah</a>
                            <a class="btn btn-danger" href="/hapus-variable/<?php echo e($tampil->id_variable); ?>"  onclick="return confirm('Apakah anda yakin menghapus variable ini?')">Hapus</a>
                            <?php else: ?>
                            <a class="btn btn-info" href="/ubah-variable">Lihat Jawaban</a>
                            <button class="btn btn-warning" disabled>Ubah</button>
                            <button class="btn btn-danger" disabled>Hapus</button>
                            <?php endif; ?>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                    <div class="col-md-12">
                      <?php echo e($instruments->links()); ?>

                      <hr />
                      <div style="margin:10px" class="stats">
                          <a class="btn btn-warning" href="/tampil-variable">Kembali</a>
                          <a class="pull-right btn btn-success" href="/tambah-instrument"><i class="ti-plus"></i> Tambah Instrument </a><p> </p>
                          <a class="pull-right btn btn-success" href="/tambah-judul-instrument"><i class="ti-plus"></i> Tambah Judul Instrument </a>
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