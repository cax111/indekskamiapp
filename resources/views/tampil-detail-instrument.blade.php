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
            <h4 class="title"><i class="icon-success ti-write"> </i> Tampil Detail Instrument </h4>
          </div>
          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <form method="POST" action="">
                  {{ csrf_field() }}
                  <div style="margin:10px" class="col-md-12">
                    @foreach($instruments as $tampil)
                      <div class="row">
                        <div class="col-md-4">Instrument</div>
                        <div class="col-md-8">: {!! $tampil->isi_instrument !!}</div>
                      </div>
                    @endforeach
                  </div>
                  <div class="col-md-12">
                    {{ $instruments->links() }}
                    <hr />
                    <div style="margin:10px" class="stats">
                      <a class="btn btn-warning" href="/variable/">Kembali</a>
                      <a class="pull-right btn btn-success" href="/tambah-user"><i class="ti-plus"></i>Tambah User</a>
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