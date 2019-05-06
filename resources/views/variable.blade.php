@include('templates.header')

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
                                @foreach($variables as $variable)
                                  <div class="col-lg-3 col-sm-6">
                                      @php $cek = null ;$pisahData = explode(' ',$sudahDiisi); $panjangData = count($pisahData); @endphp
                                      @for($i=0; $i < $panjangData; $i++)
                                        @if($variable->id_variable == $pisahData[$i])
                                          @php $cek = true; @endphp
                                          @break
                                        @else
                                          @php $cek = false; @endphp
                                        @endif
                                      @endfor
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
                                                          <p>{{$variable->nama_variable}}</p>
                                                          <div style="margin:10px">
                                                            @if($cek)
                                                              <button disabled class="btn btn-primary">Mulai Penilaian</a>
                                                            @else
                                                              <a class="btn btn-primary" href="/assessment/{{$variable->id_variable}}">Mulai Penilaian</a>
                                                            @endif
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="footer">
                                                  <hr />
                                                  <div class="stats">
                                                      @if($cek)
                                                        <i class="ti-check icon-success"></i>
                                                        Sudah diisi
                                                      @else
                                                        <i class="ti-close icon-danger"></i>
                                                        Belum diisi
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                @endforeach
                              </div>
                              <div class="footer">
                                <hr />
                                <div class="stats">
                                  <i class="ti-close icon-danger"></i> Belum direview
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('templates.footer')
