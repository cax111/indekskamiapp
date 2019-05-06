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
        	<div class="col-lg-12 col-md-12 col-xs-12">
        		<div class="card">
        			<?php if(count($pertanyaan)>0): ?>
                	<div class="header">
                    	<h4 class="title"><?php echo e($pertanyaan[0]['nama_variable']); ?></h4>
                    	<hr/>
                        <!-- <p class="category"></p>
                        <hr/> -->
                    </div>
	                <div class="content table-responsive table-full-width">
	                	<form method="POST" action="">
			                <table class="table table-striped">
					        	<thead>
					        		<tr>
					        			<th>No.</th>
					        			<th>Isi Instrument</th>
					        			<th>Status</th>
						        	</tr>
					        	</thead>
					        	<tbody>	
					        		<?php 
					        			$i=1; 
					        			$judul='';
					        		?>
									<?php $__currentLoopData = $pertanyaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($soal['isi_judul_instrument']!=$judul): ?>
										<?php $judul = $soal['isi_judul_instrument']; ?>
										<tr>
					                        <td colspan="4" class="category"><?php echo e($soal['isi_judul_instrument']); ?></td>
										</tr>
										<?php endif; ?>
										<tr>
											<td><?php echo e($i++); ?></td>
											<td><?php echo $soal->isi_instrument; ?></td>
											<td>
												<?php 	
														$a = json_decode($soal,true); 
														$detail_instrument = $a['detail_instrument'];
												?>
												<select style="width:250px;" class="form-control border-input" name="status" required>
													<option class="text-center" selected disabled value="">Isi Parameter</option>
												<?php $__currentLoopData = $detail_instrument; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jawaban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option class="text-center" value="<?php echo e($jawaban['id_parameter']); ?>"><?php echo e($jawaban['isi_parameter']); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
				            <div class="col-md12">
				              <hr />
				              <div style="margin:10px" class="stats">
	                    		<a class="btn btn-warning" href="/variable/">Kembali</a>
	                    		<button class="pull-right btn btn-success" href="/variable/">Selesai</button>
				              </div>
				            </div>
				        </form>	
					</div>
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
<?php echo $__env->make('templates.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>