@include('templates.header')
    @if(Auth::user()->role != "admin")
        <?php redirect()->to('/')->send(); ?>
    @endif
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Ubah Variable</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Variable</label>
                                                <input type="text" name="nama_variable" class="form-control border-input" value="{{ $variable->nama_variable }}" placeholder="Nama variable.." required>
                                                <p class="label label-danger">{{ $errors->first('nama_variable') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-wd">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('templates.footer')