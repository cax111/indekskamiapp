<?php echo $__env->make('templates.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php if(Auth::user()->role != "assessor"): ?>
  <?php  redirect()->to('/')->send();  ?>
<?php endif; ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title"><i class="icon-success ti-info-alt"> </i> Tampil Hasil Assessment </h4>
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
                        <th>Nama Instansi/Perusahaan</th>
                        <th>Pengisi Assessment</th>
                        <th>Status Pengisian Variable Assessment</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i = 1;
                        $j = 0;
                      	if (isset($_GET['page'])) {
                        	$i=(10*$_GET['page'])-9;
                      	}
                        $ambilId = null;
                        $ambilIdVar = [];
                       ?>
                      <?php if(count($data)==0): ?>
                      <tr>
                        <td colspan="4" class="text-center">Data Instrument Belum diisi.</td>
                      </tr>
                      <?php else: ?>
                      <!-- Menghitung berapa variable yang sudah diisi -->
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if(!empty($ambilIdVar)): ?>
                           <?php if($ambilIdVar[$j] != $tampil->id_variable): ?>
                            <?php 
                              $ambilIdVar[] = $tampil->id_variable;
                              $j++;
                             ?>
                           <?php endif; ?>
                          <?php else: ?>
                            <?php 
                              $ambilIdVar[] = $tampil->id_variable;
                             ?>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <!--  -->
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($ambilId != $tampil->id_user): ?>
                            <tr>
                              <td><?php echo e($i++); ?></td>
                              <td><?php echo $ambilId=$tampil->departemen; ?> - <?php echo $ambilId=$tampil->direktorat; ?> - <?php echo $ambilId=$tampil->satuan_kerja; ?></td>
                              <td><?php echo $ambilId=$tampil->pengisi_responden; ?></td>
                              <td>
                                <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php 
                                      $cek = false;
                                   ?>
                                  <?php for($j=0;$j < count($ambilIdVar); $j++): ?>
                                      <?php if($tampil2->id_variable==$ambilIdVar[$j]): ?>
                                        <div class="label label-success">
                                          <i class="icon-default ti-check-box"> </i><?php echo e($tampil2->nama_variable); ?>

                                        </div>
                                        <br/>
                                        <?php  $cek = true;  ?>
                                      <?php endif; ?>
                                    <?php endfor; ?>
                                      <?php if(!$cek): ?>
                                        <div class="label label-default">
                                          <i class="icon-default ti-close"> </i><?php echo e($tampil2->nama_variable); ?>

                                        </div>
                                        <br/>
                                      <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </td>
                              <td>
                                <div>
                                  <a class="btn btn-info" href="/tampil-detail-hasil-assessment/<?php echo e($tampil->id_jawaban_instrument); ?>">Lihat Detail Hasil Assessment</a>
                                </div>
                              </td>
                            </tr>
                            <?php  $ambilId = $tampil->id_user;  ?>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                    <div class="col-md-12">
                      <hr />
                      <div style="margin:10px" class="stats">
                          <a class="btn btn-warning" href="/tampil-variable">Kembali</a>
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
