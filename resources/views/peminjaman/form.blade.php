@extends('layouts.master')
@section('content')


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

    {{-- <section class="section">
      <div class="row">
        <div class="col-lg-12"> --}}

             
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center pb-0 fs-5">Formulir Peminjaman Barang</h5></br>

                       <!-- validation Form Elements -->

              <form action="{{ route('inputpeminjaman') }}" method="POST" enctype="multipart/form-data" class=" needs-validation" novalidate>
                @csrf

                <div class="row mb-3">
                  {{-- <label for="validationCustom01" class="col-sm-2 col-form-label">Nama login</label> --}}
                  <div class="col-sm-10">

                 
                    <input type="hidden" id="validationCustom01" name="users_id" value=" {{ auth()->user()->id}}" class="form-control"  required readonly>
                  

                    <div class="invalid-feedback">
                      Harus di isi
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="validationCustom01" class="col-sm-2 col-form-label">Nama Peminjam</label>
                  <div class="col-sm-10">
                    <input type="text" id="validationCustom01" name="nama_peminjam" class="form-control"  required>
                    <div class="invalid-feedback">
                      Harus di isi
                    </div>
                  </div>
                </div>

                {{-- <form action="#" class="invoice-repeater">
                  <div data-repeater-list="invoice">
                    <div data-repeater-item>
                      <div class="mb-1">
                        <label for="name">Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="name"
                          aria-describedby="name"
                          placeholder="Luke Baker"
                        />
                      </div>
                      <button type="button" class="btn btn-outline-danger" data-repeater-delete>
                        <i data-feather="x" class="me-25"></i>
                        <span>Delete</span>
                      </button>
                    </div>
                  </div>
                  <button type="button" class="btn btn-icon btn-primary" data-repeater-create>
                    <i data-feather="plus" class="me-25"></i>
                    <span>Add New</span>
                  </button>
                </form> --}}

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Jenis Peminjaman</legend>
                  <div class="col-sm-10">
                   
                      <input class="form-check-input" type="radio"  name="jenis_peminjaman" name="gridRadios" id="gridRadios1" value="Pribadi" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Pribadi
                      </label>

                 
                      <input class="form-check-input" type="radio"  name="jenis_peminjaman" name="gridRadios" id="gridRadios2" value="Keperluan Projek">
                      <label class="form-check-label" for="gridRadios2">
                        Keperluan Projek
                      </label>
                
                  </div>
                </fieldset>

             

                <div class="row g-3">
                  <label for="validationTooltip06" class="col-sm-2 col-form-label">Nama Barang</label>
                  <div class="col-md-4">
                    <select class="form-select" name="barangs_id" id="validationTooltip06" aria-label="Default select example">
                      <option selected>Pilih Nama Barang</option>
                     
                      @foreach($inputbarang as $data)
                      <option value="{{ $data->id }}">  {{ $data->kode}} - {{ $data->jenis_barangs->jenis_barang}}  {{ $data->spesifikasi}} </option>
                      @endforeach

                    </select>
                    <div class="invalid-feedback">
                      Harus di isi
                    </div>
                  </div>

                  <label for="validationTooltip06" class="col-sm-2 col-form-label">Jumlah Barang</label>
                  <div class="col-md-3">
                    <input type="text" class="form-control" name="jumlah_pinjam"  placeholder="Jumlah">
                  </div>
                </div><br>

                {{-- <div class="row g-3">
                  <label for="validationTooltip06" class="col-sm-2 col-form-label"> </label>
                  <div class="col-md-4">
                    <select class="form-select"  id="validationTooltip06" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                    <div class="invalid-feedback">
                      Harus di isi
                    </div>
                  </div>

                  <label for="validationTooltip06" class="col-sm-2 col-form-label"> </label>
                  <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Jumlah">
                  </div>
                </div><br> --}}

                {{-- <div class="row g-3">
                  <label for="validationTooltip06" class="col-sm-2 col-form-label"> </label>
                  <div class="col-md-4">
                    <select class="form-select"  id="validationTooltip06" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                    <div class="invalid-feedback">
                      Harus di isi
                    </div>
                  </div>

                  <label for="validationTooltip06" class="col-sm-2 col-form-label"> </label>
                  <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Jumlah">
                  </div>
                </div><br> --}}

          
             
               

                <div class="row mb-3">
                  <label for="validationTooltip02" class="col-sm-2 col-form-label"> Tujuan Pinjam </label>
                  <div class="col-sm-10">
                    <input type="text" id="validationTooltip02" name="tujuan"   class="form-control"  required placeholder=" ex. untuk keperluan proyek A, untuk mengantar keluarga">
                    <div class="invalid-feedback">
                      Harus di isi
                    </div>
                  </div>
                </div>

               

                <div class="row mb-3">
                  <label for="validationTooltip05" class="col-sm-2 col-form-label">Tgl Pengajuan</label>
                  <div class="col-sm-10">
                    <input type="date" id="validationTooltip05" name="tgl_pengajuan"  class="form-control"  required>
                    <div class="invalid-feedback">
                      Harus di isi
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="validationTooltip05" class="col-sm-2 col-form-label">Tgl Peminjaman</label>
                  <div class="col-sm-10">
                    <input type="date" id="validationTooltip05" name="tgl_pinjam"  class="form-control"  required>
                    <div class="invalid-feedback">
                      Harus di isi
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="validationTooltip05" class="col-sm-2 col-form-label">Tgl Pengembalian</label>
                  <div class="col-sm-10">
                    <input type="date" id="validationTooltip05" name="tgl_kembali"  class="form-control"  required>
                    <div class="invalid-feedback">
                      Harus di isi
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="validationTooltip03" class="col-sm-2 col-form-label">Surat Peminjaman</label>
                  <div class="col-sm-10">
                    <input type="file"  id="validationTooltip03" name="surat_pinjam"  class="form-control"required>
                    <div class="invalid-feedback">
                      Harus di isi
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="validationTooltip04" class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" id="validationTooltip04" name="ket"  class="form-control"required placeholder=" isi jika diperlukan">
                    <div class="invalid-feedback">
                      Harus di isi
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  {{-- <label for="validationTooltip04" class="col-sm-2 col-form-label">Status Konfirmasi</label> --}}
                  <div class="col-sm-10">
                    <input type="hidden" id="validationTooltip04" value="1" name="status_konfirmasis_id"  class="form-control"required>
                    <div class="invalid-feedback">
                      Harus di isi
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  {{-- <label for="validationTooltip04" class="col-sm-2 col-form-label">Status Peminjaman</label> --}}
                  <div class="col-sm-10">
                    <input type="hidden" id="validationTooltip04" value="1" name="status_peminjamans_id"  class="form-control"required>
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

        </div>
      {{-- </div> --}}
    {{-- </section> --}}
@endsection
