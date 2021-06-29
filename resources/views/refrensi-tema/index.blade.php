@extends('layouts.default')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>            
            <li class="breadcrumb-item active">Refrensi Tema</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">            
            <div class="card-header">
            <a href="{{route('refrensi-tema.create')}}" class="btn btn-sm btn-success float-left" >Tambah</a>           
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>          
            <div class="card-body table-responsive p-0" style="height: 300px;">                
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th>Nama Dosen</th>                      
                    <th>Daftar Refrensi Tema</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($dosens as $dosen)
                  <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$dosen->nama_dosen}}</td>
                    <td>                      
                        @forelse($dosen->refrensi_temas as $rt)
                        <ul>
                          <li>
                            {{$rt->tema}} <br>
                            <form onsubmit="return confirm('Apakah anda yakin ?')" action="{{route('refrensi-tema.destroy', $rt->id)}}" method="post">                        
                              <a href="{{route('refrensi-tema.edit', $rt->id)}}" class="badge badge-primary">edit</a>  
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="badge badge-danger border-0">Hapus</button>
                            </form>                            
                          </li>
                        </ul>
                        @empty                          
                          <div class="badge badge-warning">
                            Tidak ada refrensi tema
                          </div>                          
                        @endforelse                      
                    </td>
                  </tr>
                  <tr>
                  @empty
                  <div class="alert alert-danger">
                      Data pengumuman belum Tersedia.
                  </div>
                  @endforelse
                </tbody>
              </table>
            </div>
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
              </ul>
            </div>
            <!-- /.card-footer -->
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection('content')