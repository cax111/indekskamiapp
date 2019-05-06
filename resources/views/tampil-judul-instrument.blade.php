@include('templates.header')
@if(Auth::user()->role != "admin")
  <?php redirect()->to('/')->send(); ?>
@endif
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title"><i class="icon-success ti-info-alt"> </i> Tampil Judul Instrument </h4>
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
                        <th>Nama Judul Instrument</th>
                        <th style="width:30%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <?php 
                        $i = 1;
                      	if (isset($_GET['page'])) {
                        	$i=(10*$_GET['page'])-9;
                      	}
                      
                      ?>
                      @if(count($judulInstruments)==0) 
                      <tr>
                        <td colspan="3" class="text-center">Data Instrument Belum diisi.</td>
                      </tr>
                      @else
                      @foreach($judulInstruments AS $tampil)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{!!$tampil->isi_judul_instrument!!}</td>
                        <td>
                          <div>
                            @if($tampil->id_judul_instrument > 8)
                            <a class="btn btn-warning" href="/ubah-judul-instrument/{{$tampil->id_judul_instrument}}">Ubah</a>
                            <a class="btn btn-danger" href="/hapus-judul-instrument/{{$tampil->id_judul_instrument}}"  onclick="return confirm('Apakah anda yakin menghapus judul instrument ini?')">Hapus</a>
                            @else
                            <button class="btn btn-warning" disabled>Ubah</button>
                            <button class="btn btn-danger" disabled>Hapus</button>
                            @endif
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                    <div class="col-md-12">
                      {{ $judulInstruments->links() }}
                      <hr />
                      <div style="margin:10px" class="stats">
                          <a class="btn btn-warning" href="/tampil-variable">Kembali</a>
                          <a class="pull-right btn btn-success" href="/tambah-judul-instrument"><i class="ti-plus"></i> Tambah Judul Instrument </a>
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