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
            <h4 class="title"><i class="icon-success ti-info-alt"> </i> Tampil Instrument </h4>
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
                        <th>Isi Instrument</th>
                        <th style="width:45%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <?php 
                        $i = 1;
                      	if (isset($_GET['page'])) {
                        	$i=(10*$_GET['page'])-9;
                      	}
                      ?>
                      @if(count($instruments)==0) 
                      <tr>
                        <td colspan="3" class="text-center">Data Instrument Belum diisi.</td>
                      </tr>
                      @else
                      @foreach($instruments AS $tampil)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{!!$tampil->isi_instrument!!}</td>
                        <td>
                          <div>
                            @if($tampil->id_variable > 6)
                            <a class="btn btn-info" href="/tampil-detail-instrument/{{$tampil->id_instrument}}">Lihat Detail Instrument</a>
                            <a class="btn btn-warning" href="/ubah-instrument/{{$tampil->id_instrument}}">Ubah</a>
                            <a class="btn btn-danger" href="/hapus-instrument/{{$tampil->id_instrument}}"  onclick="return confirm('Apakah anda yakin menghapus instrument ini?')">Hapus</a>
                            @else
                            <a class="btn btn-info" href="/tampil-parameter/{{$tampil->id_instrument}}">Lihat Detail Instrument</a>
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
                      {{ $instruments->links() }}
                      <hr />
                      <div style="margin:10px" class="stats">
                          <a class="btn btn-warning" href="/tampil-variable">Kembali</a>
                          @if($id > 6)
                          <a class="pull-right btn btn-success" href="/tambah-instrument/{{$id}}"><i class="ti-plus"></i> Tambah Instrument </a><p> </p>
                          <a class="pull-right btn btn-success" href="/tampil-judul-instrument"><i class="ti-write"></i> Lihat Judul Instrument </a>
                          @endif
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