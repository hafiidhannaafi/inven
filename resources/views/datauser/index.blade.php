@extends('layouts.master')
@section('content')

@section ('title', 'datauser')
@section ('datauser', 'active')
@section ('formss-nav', 'show')

<main id="main" class="main">


    {{-- <section class="section">
      @if(count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif --}}
      <div class="row">
        <div class="col-lg-12">


          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data User (Peminjam)</h5>
              {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> --}}
           
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Posisi/Jabatan</th>
                    <th scope="col">Telp</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $nomor = 1;  
                  ?>
                  @foreach($akun as $data)
                  @if($data->roles_id == 3)
                  <tr>
                    <th> {{ $nomor++ }} </th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->posisi }}</td>
                    <td>{{ $data->telephone}}</td>
                    <td>{{ $data->roles->roles }}</td>
                    <td> 
                      <a href="/data-user/edit/{{$data->id}}" type="button" class="btn btn" style="background-color: #05b3c3; color:#FFFFFF"><i class="bi bi-pencil"></i></a>
                        <a href="/data-user/hapus/{{$data->id}}" onclick="return confirm('Hapus Data?')" type="button" class="btn btn-danger"><i class="bi bi-trash delete"></i></a>
                    </td>
                    </td>
                  </tr>
                  @endif
                  @endforeach
    
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection