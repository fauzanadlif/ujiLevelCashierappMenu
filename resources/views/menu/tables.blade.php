@extends('layouts/main')

@section('title', 'Food Table')

@section('konten')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Foods</h1>        
    </div>

    <!-- Flash Data -->
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif(session('statusDelete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('statusDelete') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Foods
                <span>
                    <a href="/menus/create" class="text-primary float-right">
                        <i class="fas fa-plus"><span class="ml-2">Add Foods</span></i>
                    </a>
                </span>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">No.</th>
                            <th scope="col" class="text-center">Nama Makanan</th>
                            <th scope="col" class="text-center">Harga Makanan</th>
                            <th scope="col" class="text-center">Stok Makanan</th>
                            <th scope="col" class="text-center">Gambar Makanan</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $menu)
                            <tr>
                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                <td class="text-center">{{ $menu->nama_makanan }}</td>
                                <td class="text-center">Rp. {{ $menu->harga_makanan }}</td>
                                <td class="text-center">{{ $menu->qty_makanan }}</td>
                                <td><img width="150px" src="{{ asset('image/'.$menu->gambar_makanan) }}"></td>
                                <td class="text-center">
                                    <a href="/menus/{{ $menu->id_makanan }}/edit" class="btn btn-small text-success">
                                        <i class="fa fa-edit"></i><span class="ml-2">Edit</span>
                                    </a>
                                    <form action="/menus/{{ $menu->id_makanan }}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-small text-danger">
                                            <i class=" fa fa-trash"></i><span class="ml-2">Delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
@endsection