@include('templates.header')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title"><i class="icon-success ti-info-alt"> </i> Apa itu Aplikasi Indeks KAMI </h4>
            <p class="category"></p>
          </div>
          <div class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="icon-big icon-success text-center">
                  <i class="ti-server"></i>
                </div>
              </div>
              <div class="col-xs-12">
                <div style="text-align:center" class="numbers">
                  <p>
                    Indeks KAMI adalah alat evaluasi untuk menganalisa tingkat kesiapan pengamanan informasi di Instansi pemerintah.
                    Alat evaluasi ini tidak ditujukan untuk menganalisa kelayakan atau efektifitas bentuk pengamanan yang ada, 
                    melainkan sebagai perangkat untuk memberikan gambaran kondisi kesiapan (kelengkapan dan kematangan) kerangka kerja keamanan informasi kepada pimpinan Instansi. 
                    Evaluasi dilakukan terhadap berbagai area yang menjadi target penerapan keamanan informasi dengan ruang lingkup pembahasan yang juga memenuhi semua aspek keamanan yang didefinisikan oleh standar ISO/IEC 27001:2013.
                  </p>
                  <div style="margin:10px">
                    @if(\Session::get('isi_identitas')>0)
                      <a class="btn btn-primary" href="/variable/">Mulai Penilaian</a>
                    @else
                      <a class="btn btn-primary" href="/identitas/">Mulai Penilaian</a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="footer">
              <hr />
              <div class="stats">
                <!-- <i class="ti-close icon-danger"></i> --> Belum Diisi
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@include('templates.footer')