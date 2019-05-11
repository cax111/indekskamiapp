<?php echo $__env->make('templates.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title"><i class="icon-success ti-info-alt"> </i> Tampil Detail Hasil Assessment </h4>
            <p class="category"><hr/></p>
          </div>
          <div class="content">
            <div class="row">
            <?php 
              $i = 0;
              $ambilId = null;
              $ambilIdVar = null;
              $skor = [];
              $dataku = [];
             ?>

            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($t->id_variable == $tampil->id_variable): ?>
                  <?php if(empty($skor[$i])): ?>
                    <?php 
                      $skor[$i] = $tampil->skor;
                     ?>
                  <?php else: ?>
                    <?php  $skor[$i] += $tampil->skor;  ?>
                  <?php endif; ?>
                <?php else: ?>
                  <?php 
                    $i++;
                   ?>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <?php 
                $dataku = $tampil;
               ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-12">
                <div class="col-md-6">
                  <table class="table table-striped">
                        <tr>
                          <th>Nama</th>
                          <td><?php echo e($dataku['pengisi_responden']); ?></td>
                        </tr>
                        <tr>
                          <th>Satuan Kerja</th>
                          <td><?php echo e($dataku['satuan_kerja']); ?></td>
                        </tr>
                        <tr>
                          <th>direktorat</th>
                          <td><?php echo e($dataku['direktorat']); ?></td>
                        </tr>
                        <tr>
                          <th>Departemen</th>
                          <td><?php echo e($dataku['departemen']); ?></td>
                        </tr>
                        <tr>
                          <th>Alamat 1</th>
                          <td><?php echo e($dataku['alamat1']); ?></td>
                        </tr>
                        <tr>
                          <th>Alamat 2</th>
                          <td><?php echo e($dataku['alamat2']); ?></td>
                        </tr>
                        <tr>
                          <th>(Kode Area) Nomor Telepon</th>
                          <td><?php echo e($dataku['nomor_telepon']); ?></td>
                        </tr>
                        <tr>
                          <th>Email Instansi/Perusahaan</th>
                          <td><?php echo e($dataku['email']); ?></td>
                        </tr>
                        <tr>
                          <th>Tanggal Pengisian</th>
                          <td><?php echo e($dataku['tanggal_pengisian']); ?></td>
                        </tr>
                  </table>
                </div>
                <?php echo e(var_dump($skor)); ?>

                <div class="col-md-6">
                  <table class="table table-striped">
                    <tr style="background-color:#333; color:white;">
                      <th>Skor SE</th>
                      <td>:</td>
                      <td>
                        <?php  $i=0;  ?>
                        <?php if(!empty($skor[$i])): ?>
                          <?php echo e($skor[$i]); ?>

                        <?php else: ?>
                          <?php echo e(0); ?>

                        <?php endif; ?>
                      </td>
                      <th>Kategori SE</th>
                      <td colspan="3">
                      <?php if(!empty($skor[$i])): ?>
                        <?php if($skor[$i]>=10 && $skor[$i]<=15): ?>
                          Rendah
                        <?php elseif($skor[$i]>=16 && $skor[$i]<=34): ?>
                          Tinggi
                        <?php else: ?>
                          Strategis
                        <?php endif; ?>
                      <?php endif; ?>
                      </td>
                    </tr>
                    <tr>
                      <th>Hasil Evaluasi Akhir</th>
                      <td colspan="6" class="text-center" style="background-color:red; color:white;">Tidak Layak</td>
                    </tr>
                    <tr>
                      <th style="width:40%">Tingkat Kelengkapan Penerapan Standar ISO27001 sesuai Kategori SE</th>
                      <td style="background-color:red;">:asdkj</td>
                      <td style="background-color:yellow;">:asdkj</td>
                      <td style="background-color:green;">:asdkj</td>
                      <td style="background-color:green;">:asdkj</td>
                      <td colspan="1">0</td>
                    </tr>
                  <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($tampil2->nama_variable != 'Kategori Sistem Elektronik' && $tampil2->nama_variable != 'Suplemen'): ?>
                      <?php  $i++;  ?>
                      <tr>
                        <td><?php echo e($tampil2->nama_variable); ?></td>
                        <td>:</td>
                        <td>
                          <?php if(!empty($skor[$i])): ?>
                            <?php echo e($skor[$i]); ?>

                          <?php else: ?>
                            0
                          <?php endif; ?>
                        </td>
                        <td>Tk Kematangan</td>
                        <td>:</td>
                        <td>I</td>
                        <td></td>
                      </tr>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>Pengamanan Keterlibatan Pihak Ketiga</td>
                      <td>:</td>
                      <td colspan="5">0%</td>
                    </tr>
                    <tr>
                      <td>Pengamanan Layanan Infrastruktur Awan</td>
                      <td>:</td>
                      <td colspan="5">0%</td>
                    </tr>
                    <tr>
                      <td>Perlindungan Data Pribadi</td>
                      <td>:</td>
                      <td colspan="5">0%</td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-12 text-center">
                  <p>
                    <img src="<?php echo e(URL::asset('img/capture.png')); ?>" class="text-center">
                  </p>
                </div>
                <div class="col-md-12">
                  <hr />
                  <div style="margin:10px" class="stats">
                      <a class="btn btn-warning" href="/tampil-hasil-assessment">Kembali</a>
                  </div>
                </div>
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
