@extends('layouts.master')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" /> --}}



    {{-- <script type="text/javascript" src="js/script.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
	<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"type="text/javascript"></script>
	<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"rel="stylesheet" type="text/css" />
  <script>
		$(function () {
			$('#lstFruits').multiselect({
				includeSelectAllOption: true
			});
			$('#btnSelected').click(function () {
				var selected = $("#lstFruits option:selected");
				var message = "";
				selected.each(function () {
					message += $(this).text() + " " + $(this).val() + "\n";
				});
			});
		});
	</script> --}}

    <script>
        $(function() {
            $(document).on('click', '.btn-add', function(e) {
                e.preventDefault();
                var controlForm = $(this).closest('.fvrduplicate'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<i class="fa fa-minus" aria-hidden="true">-</i>');
            }).on('click', '.btn-remove', function(e) {
                $(this).closest('.entry').remove();
                return false;
            });
        });
    </script>

    {{-- SEARCH --}}
    <script>
        $(function() {
            $('.selectpicker').selectpicker();
        });
    </script>

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

                <form action="{{ route('inputpeminjaman') }}" method="POST" enctype="multipart/form-data"
                    class=" needs-validation" novalidate>
                    @csrf

                    <div class="row mb-3">
                        {{-- <label for="validationCustom01" class="col-sm-2 col-form-label">Nama login</label> --}}
                        <div class="col-sm-10">


                            <input type="hidden" id="validationCustom01" name="users_id" value=" {{ auth()->user()->id }}"
                                class="form-control" required readonly>


                            <div class="invalid-feedback">
                                Harus di isi
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="validationCustom01" class="col-sm-2 col-form-label">Nama Peminjam</label>
                        <div class="col-sm-10">
                            <input type="text" id="validationCustom01" name="nama_peminjam"
                                value=" {{ auth()->user()->name }}" readonly class="form-control" required
                                placeholder=" nama peminjam">
                            <div class="invalid-feedback">
                                Harus di isi
                            </div>
                        </div>
                    </div>

                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis Peminjaman</legend>
                        <div class="col-sm-10">

                            <input class="form-check-input" type="radio" name="jenis_peminjaman" name="gridRadios"
                                id="gridRadios1" value="Pribadi" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Pribadi
                            </label>


                            <input class="form-check-input" type="radio" name="jenis_peminjaman" name="gridRadios"
                                id="gridRadios2" value="Keperluan Projek">
                            <label class="form-check-label" for="gridRadios2">
                                Keperluan Projek
                            </label>

                        </div>
                    </fieldset>


                    {{-- <div class="row g-3">
                 
                <label for="validationTooltip06" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-md-4">
                  <select class="form-control selectpicker" id="select-country lstFruits" multiple="multiple" data-live-search="true" name="barangs_id" id="validationTooltip06" aria-label="Default select example">
                  <select class="form-control selectpicker" id="select-country" data-live-search="true"  name="barangs_id" id="validationTooltip06" aria-label="Default select example">
                  <select class="form-select" name="barangs_id" id="validationTooltip06" aria-label="Default select example">
                    <option selected>Pilih Nama Barang</option>
                   
                    @foreach ($inputbarang as $data)
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
              </div> --}}


                    <div class="row g-3">
                        <div class="row targetDiv" id="div0">
                            <div id="group1" class="fvrduplicate">
                                <div class="row entry">
                                    <div class="col-xs-12 col-md-5">
                                        <div class="form-group">
                                            <label for="validationTooltip06" class="col-sm-6 col-form-label">Nama
                                                Barang</label>
                                            {{-- <select class="form-control selectpicker" id="select-country lstFruits" multiple="multiple" data-live-search="true" name="barangs_id" id="validationTooltip06" aria-label="Default select example"> --}}
                                            <select class="form-control selectpicker" data-live-search="true"
                                                name="barangs_id[]" id="validationTooltip06"
                                                aria-label="Default select example">
                                                {{-- <select class="form-select" name="barangs_id" id="validationTooltip06" aria-label="Default select example"> --}}
                                                <option selected>Pilih Nama Barang</option>

                                                @foreach ($inputbarang as $data)
                                                    <option value="{{ $data->id }}"> {{ $data->kode }} -
                                                        {{ $data->jenis_barangs->jenis_barang }} {{ $data->spesifikasi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="validationTooltip06" class="col-sm-6 col-form-label">Jumlah
                                                item</label>
                                            <input class="form-control form-control" name="jumlah_pinjam[]" type="number"
                                                placeholder=" jumlah item">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-2">
                                        <div class="form-group">
                                            {{-- <label>&nbsp;</label> --}}
                                            <button type="button" class="btn btn-success btn-sm btn-add">
                                                <i class="fa fa-plus" aria-hidden="true">+</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr> <!-- second form starts below: -->
                    {{-- <div class="row targetDiv" id="div1">
  <div class="row mb-3">
    <div id="group2" class="fvrduplicate">
      <div class="row entry">
        <!-- Field Start -->
        <div class="col-xs-12 col-md-5">
          <div class="form-group">
            <label>barang</label>
            <input class="form-control form-control" name="fields[]" type="text" placeholder="Length">
          </div>
        </div>
        <div class="col-xs-12 col-md-5">
          <div class="form-group">
            <label>jumlah</label>
            <input class="form-control form-control" name="fields[]" type="text" placeholder="Qty">
          </div>
        </div>
        <div class="col-xs-12 col-md-2">
          <div class="form-group">
            <label>&nbsp;</label>
            <button type="button" class="btn btn-success btn-sm btn-add">
              <i class="fa fa-plus" aria-hidden="true">+</i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}


                    {{-- <div class="row mb-3">
  <label for="validationTooltip02" class="col-sm-2 col-form-label"> Jumlah Jenis Barang pinjam </label>
  <div class="col-sm-10">
    <input type="number" id="validationTooltip02" name="jml_barang"   class="form-control"  required placeholder=" ex. total jumlah jenis barang yang di pinjam">
    <div class="invalid-feedback">
      Harus di isi
    </div>
  </div>
</div> --}}

                    <div class="row mb-3">
                        <label for="validationTooltip02" class="col-sm-2 col-form-label"> Tujuan Pinjam </label>
                        <div class="col-sm-10">
                            <input type="text" id="validationTooltip02" name="tujuan" class="form-control" required
                                placeholder=" ex. untuk keperluan proyek A, untuk mengantar keluarga">
                            <div class="invalid-feedback">
                                Harus di isi
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="validationTooltip05" class="col-sm-2 col-form-label">Tgl Pengajuan</label>
                        <div class="col-sm-10">
                            <input type="date" id="validationTooltip05" name="tgl_pengajuan" value="<?php echo date('Y-m-d'); ?>"
                                readonly class="form-control" required>
                            <div class="invalid-feedback">
                                Harus di isi
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="validationTooltip05" class="col-sm-2 col-form-label">Tgl Peminjaman</label>
                        <div class="col-sm-10">
                            <input type="date" id="validationTooltip05" name="tgl_pinjam" class="form-control"
                                required>
                            <div class="invalid-feedback">
                                Harus di isi
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="validationTooltip05" class="col-sm-2 col-form-label">Tgl Pengembalian</label>
                        <div class="col-sm-10">
                            <input type="date" id="validationTooltip05" name="tgl_kembali" class="form-control"
                                required>
                            <div class="invalid-feedback">
                                Harus di isi
                            </div>
                        </div>
                    </div>
            </div>

            <div class="row mb-3">
                <label for="validationTooltip03" class="col-sm-2 col-form-label">Surat Peminjaman</label>
                <div class="col-sm-10">
                    <input type="file" id="validationTooltip03" name="surat_pinjam" class="form-control"required>
                    <div class="invalid-feedback">
                        Harus di isi
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="validationTooltip04" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <input type="text" id="validationTooltip04" name="ket" class="form-control"required
                        placeholder=" isi jika diperlukan">
                    <div class="invalid-feedback">
                        Harus di isi
                    </div>
                </div>
            </div>

            {{-- <div class="row mb-3">
  
  <div class="col-sm-10">
    <input type="hidden" id="validationTooltip04" value="1" name="status_konfirmasis_id"  class="form-control"required>
    <div class="invalid-feedback">
      Harus di isi
    </div>
  </div>
</div> --}}

            <div class="row mb-3">
                {{-- <label for="validationTooltip04" class="col-sm-2 col-form-label">Status Peminjaman</label> --}}
                <div class="col-sm-10">
                    <input type="hidden" id="validationTooltip04" value="1" name="status_peminjamans_id"
                        class="form-control"required>
                    <div class="invalid-feedback">
                        Harus di isi
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-10">
                    <button style=" float :right; background-color:   #012970; color:#FFFFFF" type="submit"
                        class="btn btn">Submit</button>
                </div>
            </div>
            </form><!-- End General Form Elements -->


        </div>
        </div>

        </div>
        {{-- </div> --}}
        {{-- </section> --}}
    @endsection
