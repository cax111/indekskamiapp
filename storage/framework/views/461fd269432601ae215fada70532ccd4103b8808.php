<?php echo $__env->make('templates.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php if(Auth::user()->role != "user"): ?>
  <?php redirect()->to('/')->send(); ?>
<?php endif; ?>
<?php if(\Session::get('isi_identitas')==0): ?>
  <?php redirect()->to('/identitas')->send(); ?>
<?php endif; ?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><i class="ti-write"> </i> Daftar Penilaian</h4>
                                <p class="category">Ada 6 Variabel yang disediakan - Telah terisi 4 Variabel - Tinggal 2 variabel lagi untuk direview oleh Assessor.</p>
                            </div>
                            <div class="content">
                              <div class="row">
                                <?php $i=1;?>
                                <?php $__currentLoopData = $variables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <div class="col-lg-3 col-sm-6">
                                      <div class="card">
                                          <div class="content">
                                              <div class="row">
                                                  <div class="col-xs-12">
                                                      <div class="icon-big icon-primary text-center">
                                                          <i class="ti-server"></i>
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12">
                                                      <div style="text-align:center" class="numbers">
                                                          <p><?php echo e($variable->nama_variable); ?></p>
                                                          <div style="margin:10px">
                                                            <a class="btn btn-primary" href="/assessment/<?php echo e($variable->id_variable); ?>">Mulai Penilaian</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="footer">
                                                  <hr />
                                                  <div class="stats">
                                                      <!-- class="ti-close icon-danger" Belum Diisi class="ti-check icon-success" Sudah Diisi -->
                                                      <i class="ti-close icon-danger"></i> Belum diisi
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                              <div class="footer">
                                <hr />
                                <div class="stats">
                                  <!-- class="ti-close icon-danger" Belum Diisi class="ti-check icon-success" Sudah Diisi -->
                                  <i class="ti-close icon-danger"></i> Belum direview
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php echo $__env->make('templates.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>