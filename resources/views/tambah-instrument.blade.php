@include('templates.header')
    @if(Auth::user()->role != "admin")
        <?php redirect()->to('/')->send(); ?>
    @endif
    @if($id<7)
        <?php redirect()->to('/tampil-variable/')->send(); ?>
    @endif
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tambah Instrument</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Judul Instrument</label>
                                                        <select name="judul_instrument" class="form-control border-input" required>
                                                            <option disabled selected value="">Pilih Judul Instrument..</option>
                                                            @foreach($judul_instrument AS $tampil)
                                                            <option value="{{$tampil->id_judul_instrument}}">{{$tampil->isi_judul_instrument}}</option>
                                                            @endforeach
                                                        </select>
                                                        <p class="label label-danger">{{ $errors->first('username') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Bobot Instrument</label>
                                                        <input type="text" name="bobot_instrument" class="form-control border-input" value="{{ old('bobot_instrument') }}" placeholder="bobot instrument.." required>
                                                        <p class="label label-danger">{{ $errors->first('bobot_instrument') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Isi Instrument</label>
                                                        <textarea name="isi_instrument" class="form-control border-input" placeholder="Isi Instrument.." required>{{ old('isi_instrument') }}</textarea>
                                                        <p class="label label-danger">{{ $errors->first('isi_instrument') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">    
                                                    <div class="row">
                                                      <label>
                                                        Isi Parameter/Jawaban
                                                      </label>
                                                      <br/>
                                                      @foreach($parameter AS $tampil)
                                                        <input type="checkbox" name="parameter[]" value="{{$tampil->id_parameter}}"> {{$tampil->isi_parameter}}<br>
                                                      @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="btn btn-warning" href="/tampil-instrument/{{$id}}">Kembali</a>
                                            <button type="submit" class="btn btn-success btn-wd pull-right">Simpan</button>
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