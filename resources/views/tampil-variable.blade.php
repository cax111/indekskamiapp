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
            <h4 class="title"><i class="icon-success ti-info-alt"> </i> Tampil Variable </h4>
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
                        <th>ID</th>
                        <th>Variable</th>
                        <th style="width:40%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <?php 
                      	if (isset($_GET['page'])) {
                        	$i=(10*$_GET['page'])-9;
                      	}
                      
                      ?>
                      @foreach($variables AS $tampil)
                      <tr>
                        <td>{!!$tampil->id_variable!!}</td>
                        <td>{!!$tampil->nama_variable!!}</td>
                        <td>
                          <div>
                            @if($tampil->id_variable > 6)
                            <a class="btn btn-info" href="/tampil-instrument/{{$tampil->id_variable}}">Lihat Instrument</a>
                            <a class="btn btn-warning" href="/ubah-variable/{{$tampil->id_variable}}">Ubah</a>
                            <a class="btn btn-danger" href="/hapus-variable/{{$tampil->id_variable}}"  onclick="return confirm('Apakah anda yakin menghapus variable ini?')">Hapus</a>
                            @else
                            <a class="btn btn-info" href="/tampil-instrument/{{$tampil->id_variable}}">Lihat Instrument</a>
                            <button class="btn btn-warning" disabled>Ubah</button>
                            <button class="btn btn-danger" disabled>Hapus</button>
                            @endif
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                    <div class="col-md-12">
                      {{ $variables->links() }}
                      <hr />
                      <div style="margin:10px" class="stats">
                          <a class="btn btn-warning" href="/">Kembali</a>
                          <a class="pull-right btn btn-success" href="/tambah-variable"><i class="ti-plus"></i> Tambah Variable </a>
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