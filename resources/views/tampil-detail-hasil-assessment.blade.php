@include('templates.header')
@if(Auth::user()->role != "assessor")
  @php redirect()->to('/')->send(); @endphp
@endif
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
            @php
              $i = 0;
              $ambilId = null;
              $ambilIdVar = null;
              $skor = [0 => 0];
              $dataku = [];
            @endphp

            @foreach($data AS $tampil)
              @if($tampil->id_variable != $ambilIdVar)
                @php
                  $ambilIdVar = $tampil->id_variable;
                  $i++;
                @endphp
              @endif
              @if(empty($skor[$i]))
                @php
                  $skor[$i] = $tampil->skor;
                @endphp
              @else
                @php $skor[$i] += $tampil->skor; @endphp
              @endif

              @if($ambilId != $tampil->id_user)
                @php
                  $dataku = $tampil;
                  $ambilId = $tampil->id_user;
                @endphp
              @endif
            @endforeach
              <div class="col-md-12">
                <div class="col-md-6">
                  <table class="table table-striped">
                        <tr>
                          <th>Nama</th>
                          <td>{{$dataku['pengisi_responden']}}</td>
                        </tr>
                        <tr>
                          <th>Satuan Kerja</th>
                          <td>{{$dataku['satuan_kerja']}}</td>
                        </tr>
                        <tr>
                          <th>direktorat</th>
                          <td>{{$dataku['direktorat']}}</td>
                        </tr>
                        <tr>
                          <th>Departemen</th>
                          <td>{{$dataku['departemen']}}</td>
                        </tr>
                        <tr>
                          <th>Alamat 1</th>
                          <td>{{$dataku['alamat1']}}</td>
                        </tr>
                        <tr>
                          <th>Alamat 2</th>
                          <td>{{$dataku['alamat2']}}</td>
                        </tr>
                        <tr>
                          <th>(Kode Area) Nomor Telepon</th>
                          <td>{{$dataku['nomor_telepon']}}</td>
                        </tr>
                        <tr>
                          <th>Email Instansi/Perusahaan</th>
                          <td>{{$dataku['email']}}</td>
                        </tr>
                        <tr>
                          <th>Tanggal Pengisian</th>
                          <td>{{$dataku['tanggal_pengisian']}}</td>
                        </tr>
                  </table>
                </div>
                {{var_dump($skor)}}
                <div class="col-md-6">
                  <table class="table table-striped">
                    <tr style="background-color:#333; color:white;">
                      <th>Skor SE</th>
                      <td>:</td>
                      <td>
                        @php $i=0; @endphp
                        {{$skor[$i]}}
                      </td>
                      <th>Kategori SE</th>
                      <td colspan="3">
                        @if($skor[$i]>=10 && $skor[$i]<=15)
                          Rendah
                        @elseif($skor[$i]>=16 && $skor[$i]<=34)
                          Tinggi
                        @else
                          Strategis
                        @endif
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
                  @foreach($data2 AS $tampil2)
                    @if($tampil2->nama_variable != 'Kategori Sistem Elektronik' && $tampil2->nama_variable != 'Suplemen')
                      @php $i++; @endphp
                      <tr>
                        <td>{{$tampil2->nama_variable}}</td>
                        <td>:</td>
                        <td>
                          @if(!empty($skor[$i]))
                            {{$skor[$i]}}
                          @else
                            0
                          @endif
                        </td>
                        <td>Tk Kematangan</td>
                        <td>:</td>
                        <td>I</td>
                        <td></td>
                      </tr>
                    @endif
                  @endforeach
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
                    <img src="{{ URL::asset('img/capture.png') }}" class="text-center">
                  </p>
                </div>
                <div class="col-md-12">
                  <hr />
                  <div style="margin:10px" class="stats">
                      <a class="btn btn-warning" href="/tampil-variable">Kembali</a>
                  </div>
                </div>
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
