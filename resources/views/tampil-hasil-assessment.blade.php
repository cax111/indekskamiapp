@include('templates.header')
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
                  {{ csrf_field() }}
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
                      @php
                        $i = 1;
                        $j = 0;
                      	if (isset($_GET['page'])) {
                        	$i=(10*$_GET['page'])-9;
                      	}
                        $ambilId = null;
                        $ambilIdVar = [];
                      @endphp
                      @if(count($data)==0)
                      <tr>
                        <td colspan="4" class="text-center">Data Instrument Belum diisi.</td>
                      </tr>
                      @else
                        @foreach($data AS $tampil)
                          @if($ambilId != $tampil->id_user)
                          <!-- Menghitung berapa variable yang sudah diisi -->
                            @foreach($data AS $t)
                              @if($ambilId != $t->id_user)
                                @if(!empty($ambilIdVar))
                                 @if($ambilIdVar[$j] != $t->id_variable)
                                  @php
                                    $ambilIdVar[] = $t->id_variable;
                                    $j++;
                                  @endphp
                                 @endif
                                @else
                                  @php
                                    $ambilIdVar[] = $t->id_variable;
                                  @endphp
                                @endif
                              @endif
                            @endforeach
                          <!-- -----------------selesai --------------->
                            <tr>
                              <td>{{$i++}}</td>
                              <td>{!!$ambilId=$tampil->departemen!!} - {!!$ambilId=$tampil->direktorat!!} - {!!$ambilId=$tampil->satuan_kerja!!}</td>
                              <td>{!!$ambilId=$tampil->pengisi_responden!!}</td>
                              <td>
                                @foreach($data2 AS $tampil2)
                                  @php
                                      $cek = false;
                                  @endphp
                                  @for($j=0;$j < count($ambilIdVar); $j++)
                                      @if($tampil2->id_variable==$ambilIdVar[$j])
                                        <div class="label label-success">
                                          <i class="icon-default ti-check-box"> </i>{{$tampil2->nama_variable}}
                                        </div>
                                        <br/>
                                        @php $cek = true; @endphp
                                      @endif
                                    @endfor
                                      @if(!$cek)
                                        <div class="label label-default">
                                          <i class="icon-default ti-close"> </i>{{$tampil2->nama_variable}}
                                        </div>
                                        <br/>
                                      @endif
                                @endforeach
                              </td>
                              <td>
                                <div>
                                  <a class="btn btn-info" href="/tampil-detail-hasil-assessment/{{$tampil->id_user}}">Lihat Detail Hasil Assessment</a>
                                </div>
                              </td>
                            </tr>
                            @php
                            $ambilId = $tampil->id_user;
                            $ambilIdVar = [];
                            $j = 0;
                            @endphp
                          @endif
                        @endforeach
                      @endif
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
                <p class="label label-danger">{{ $errors->first('gagal') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('templates.footer')
