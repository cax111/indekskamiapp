@include('templates.header')
<div class="content">
    <div class="container-fluid">
    	<div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
        	<div class="card">
        		@if(count($pertanyaan)>0)
          		<div class="header">
              	<h4 class="title">Bagian : {{$pertanyaan[0]['nama_variable']}}</h4>
                <hr/>
                <p class="category">Bagian ini {{$pertanyaan[0]['nama_variable']}}</p>
                <hr/>
                <p class="category">
									<b>[Penilaian]</b>
									@foreach($pertanyaan AS $soal)
										<?php $a = json_decode($soal,true);
										$detail_instrument = $a['detail_instrument'] ?>
										@foreach($detail_instrument AS $jawaban)
											{{$jawaban['isi_parameter']}};
										@endforeach
										<?php break; ?>
									@endforeach
								</p>
                <hr/>
              </div>
							<div class="content table-responsive table-full-width">
								@if(!empty($errors->first('gagal')))
									<div class="alert alert-danger"><?php echo $errors->first('gagal'); ?></div>
								@endif
									<form method="POST" action="">
											{{ csrf_field() }}
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
															@foreach($pertanyaan AS $soal)
																@if($soal['isi_judul_instrument']!=$judul)
																	<?php
																		$judul = $soal['isi_judul_instrument'];
																		$i = 1;
																		$nojudul++;
																	?>
																	<tr>
											          		<td colspan="4" class="category" style="background-color:#333; color:white"># {{$judul}}</td>
																	</tr>
																@endif
																<tr>
																	<td class="text-center">{{$nojudul}}.{{$nojudul}}.{{$i++}}</td>
																	<td class="text-center">{!!$soal->bobot_instrument!!}</td>
																	<td>{!!$soal->isi_instrument!!} </td>
																	<td>
																		<?php
																				$a = json_decode($soal,true);
																				$detail_instrument = $a['detail_instrument'];
																		?>
																		<select style="width:250px;" class="form-control border-input" name="status[]" required>
																			<option class="text-center" selected disabled value="">Isi Status</option>
																			@foreach($detail_instrument AS $jawaban)
																			<option class="text-center" value="{{$jawaban['id_detail_instrument']}}-{{$jawaban['isi_parameter']}}-{{$jawaban['bobot_parameter']}}-{!!$soal->bobot_instrument!!}">{{$jawaban['isi_parameter']}}</option>
																			@endforeach
																		</select>
																	</td>
																</tr>
															@endforeach
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
					@else
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
        	@endif
				</div>
			</div>
		</div>
</div>
</div>
@include('templates.footer')
