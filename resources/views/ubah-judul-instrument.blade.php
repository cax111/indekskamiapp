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
                                <h4 class="title">Ubah Judul Instrument</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Judul Instrument</label>
                                                <input type="text" name="isi_judul_instrument" class="form-control border-input" value="{{ $judulInstrument->isi_judul_instrument }}" placeholder="Nama Judul Instrument.." required>
                                                <p class="label label-danger">{{ $errors->first('isi_judul_instrument') }}</p>
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