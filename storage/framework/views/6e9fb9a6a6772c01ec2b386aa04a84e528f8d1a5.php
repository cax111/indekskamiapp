<?php echo $__env->make('templates.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="content">
    <div class="container-fluid">
    	<div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
        	<div class="card">
        		<?php if(count($pertanyaan)>0): ?>
          		<div class="header">
              	<h4 class="title">Bagian : <?php echo e($pertanyaan[0]['nama_variable']); ?></h4>
                <hr/>
                <p class="category">Bagian ini <?php echo e($pertanyaan[0]['nama_variable']); ?></p>
                <hr/>
                <p class="category">
									<b>[Penilaian]</b>
									<?php $__currentLoopData = $pertanyaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php $a = json_decode($soal,true);
										$detail_instrument = $a['detail_instrument'] ?>
										<?php $__currentLoopData = $detail_instrument; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jawaban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php echo e($jawaban['isi_parameter']); ?>;
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php break; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</p>
                <hr/>
              </div>
							<div class="content table-responsive table-full-width">
								<?php if(!empty($errors->first('gagal'))): ?>
									<div class="alert alert-danger"><?php echo $errors->first('gagal'); ?></div>
								<?php endif; ?>
									<form method="POST" action="">
											<?php echo e(csrf_field()); ?>

					          	<table class="table table-striped">
							        		<thead>
										      		<tr>
											       		<th>No.</th>
												        <th></th>
											       		<th>Isi Instrument</th>
											        	<th>Status</th>
											      	</tr>
									      	</thead>
							        		<tbody>
									        		<?php
									        			$i=1;
									        			$nojudul=0;
									        			$judul='';
									        		?>
															<?php $__currentLoopData = $pertanyaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<?php if($soal['isi_judul_instrument']!=$judul): ?>
																	<?php
																		$judul = $soal['isi_judul_instrument'];
																		$i = 1;
																		$nojudul++;
																	?>
																	<tr>
											          		<td colspan="4" class="category" style="background-color:#333; color:white"># <?php echo e($judul); ?></td>
																	</tr>
																<?php endif; ?>
																<tr>
																	<td class="text-center"><?php echo e($nojudul); ?>.<?php echo e($nojudul); ?>.<?php echo e($i++); ?></td>
																	<td class="text-center"><?php echo $soal->bobot_instrument; ?></td>
																	<td><?php echo $soal->isi_instrument; ?> </td>
																	<td>
																		<?php
																				$a = json_decode($soal,true);
																				$detail_instrument = $a['detail_instrument'];
																		?>
																		<select style="width:250px;" class="form-control border-input" name="status[]" required>
																			<option class="text-center" selected disabled value="">Isi Status</option>
																			<?php $__currentLoopData = $detail_instrument; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jawaban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<option class="text-center" value="<?php echo e($jawaban['id_detail_instrument']); ?>-<?php echo e($jawaban['isi_parameter']); ?>-<?php echo e($jawaban['bobot_parameter']); ?>-<?php echo $soal->bobot_instrument; ?>"><?php echo e($jawaban['isi_parameter']); ?></option>
																			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																		</select>
																	</td>
																</tr>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</tbody>
											</table>
											<div class="col-md12">
												<hr/>
												<div style="margin:10px" class="stats">
													<a class="btn btn-warning" href="/variable/">Kembali</a>
													<button class="pull-right btn btn-success" href="/variable/">Selesai</button>
												</div>
											</div>
					        </form>
							</div>
					<?php else: ?>
                	<div class="header">
                    	<h4 class="title"><i class="icon-danger ti-na"> </i> Oops</h4>
                    	<hr/>
                	</div>
	                <div class="content">
	        						<div class="table">
		                		<h3>Mohon Maaf, Data Belum Tersedia</h3>
		                		<h5>Silakan kembali ke halaman sebelumnya</h5>
		                	</div>
	                </div>
        	<?php endif; ?>
				</div>
			</div>
		</div>
</div>
</div>
<?php echo $__env->make('templates.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
