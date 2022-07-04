@extends('layouts.master')
@section('content')

@section ('title', 'barangkeluar')
@section ('barangkeluar', 'active')
@section ('charts-nav', 'show')

<main id="main" class="main">

    <div class="pagetitle">
      {{-- <h1>Data Jenis Aset</h1> --}}
      {{-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav> --}}
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Laporan Barang Keluar</h5>

              <form action="/laporan/barangkeluar" method="post">
                    @csrf

              <div class="row mb-3">
                  <label for="validationCustom01" class="col-sm-2 col-form-label">Tanggal Awal </label>
                  <div class="col-sm-10">
                    <input type="date"  name="tglawal" id="tglawal" class="form-control"  required>
                    <div class="invalid-feedback">
                      Harus di isi
                    </div>
                  </div>
                </div>

                 <div class="row mb-3">
                  <label for="validationCustom01" class="col-sm-2 col-form-label">Tanggal Akhir </label>
                  <div class="col-sm-10">
                    <input type="date"  name="tglakhir" id="tglakhir" class="form-control"  required>
                    <div class="invalid-feedback">
                      Harus di isi
                    </div>
                  </div>
                </div>
                  
               <div  class="row mb-3">
                  <div  class="col-sm-10">
                    <button style =" float :right; background-color:   #012970; color:#FFFFFF" type="submit" class="btn btn" >Submit</button>
                  </div>
                </div>
              </form><!-- End General Form Elements -->
                 </div>
                </div>
                      @isset($data)
  <div class="panel panel-inverse">
    <br>

    <div class="panel-body">
      <center><h4> Laporan</h4></center>
      {{-- <a href="/admin/data-lansia/cetaklaporankematian/{{ $startDate }}/{{ $endDate }}" class="btn btn-secondary btn-sm float-right mr-4"><i class="fa fa-print fa-fw"></i> Cetak Laporan </a> --}}
      <br>
      
    <div class="form-group my-5">
    
    <table id="rekaps" class="table table-bordered my-5" align="center" rules="all" border="1px" style="width: 95%; margin-top: 1 rem;
    margin-bottom: 1 rem;">
      <tr>
<th scope="col">No</th>
                   
                    <th scope="col">Nama</th>
                 
                    <th scope="col">Tgl keluar</th>
                    <th scope="col">Jumlah Satuan</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Ket</th>
      </tr>
      @foreach ( $barangkeluar as $data)
      <tr>
         <th>{{ $nomor++ }}</th>
                    <td> {{ $data->barangs->kode}} - {{ $data->barangs->jenis_barangs->jenis_barang}}  {{ $data->barangs->spesifikasi}} </td>
                    <td> {{ $data->tanggal_keluar}}</td>
                    <td> {{ $data->jumlah_keluar}}</td>
                    <td> {{ $data->kondisi}}</td>
                    <td> {{ $data->ket}}</td>
      </tr>
      @endforeach
    </table>
    </div>

    </div>


</div>

@endisset 
@push('scripts')
<script>

  $(document).ready(function(){
      var table = $('#rekaps').DataTable({
      pageLength: 10,
      processing: true,
      serverSide: false,
      dom: 'Blfrtip',
      });

  });
</script>
@endpush
          {{-- <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Barang Keluar</h5>

             
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                   
                    <th scope="col">Nama</th>
                 
                    <th scope="col">Tgl keluar</th>
                    <th scope="col">Jumlah Satuan</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Ket</th>
                   
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $nomor = 1;  
                  ?>
                  @foreach($barangkeluar as $data)
                  <tr>
                    <th>{{ $nomor++ }}</th>
                    <td> {{ $data->barangs->kode}} - {{ $data->barangs->jenis_barangs->jenis_barang}}  {{ $data->barangs->spesifikasi}} </td>
                    <td> {{ $data->tanggal_keluar}}</td>
                    <td> {{ $data->jumlah_keluar}}</td>
                    <td> {{ $data->kondisi}}</td>
                    <td> {{ $data->ket}}</td>
                    
                 
                  </tr>
                 @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div> --}}

        </div>
      </div>
    </section>
@endsection