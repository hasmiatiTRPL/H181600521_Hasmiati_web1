@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Galeri</div>                
                <div class="card-body">
                <a href="{!! route('galeri.create') !!}" class="btn btn-primary">Tambahkan Data</a>
                <table border="1">
                        
                    <tr>
                        <td>ID</td>
                        <td>Nama</td>
                        <td>Keterangan</td>
                        <td>Path</td>
                        <td>Users Id</td>
                        <td>Create</td>
                        <td>Aksi</td>
                    </tr>
                        

                    @foreach ($listGaleri as $item)

                    <tr>
                        <td>{!! $item->id !!}</td>
                        <td>{!! $item->nama !!}</td>
                        <td>{!! $item->keterangan !!}</td>
                        <td>{!! $item->path !!}</td>
                        <td>{!! $item->users_id !!}</td>
                        <td>{!! $item->created_at !!}</td>
                        <td>
                            <a href="{!! route('galeri.show' ,[$item->id]) !!}"  
                                class="btn btn-sm btn-success">Lihat</a>
                            <a href="{!! route('galeri.edit' ,[$item->id]) !!}"  
                                class="btn btn-sm btn-warning">Ubah</a>

                                {!! Form::open(['route'=>['galeri.destroy', $item->id],'method'=>'delete']) !!}

                                {!! Form::submit('Hapus',['class'=>'btn btn-sm btn-danger','onclick'=>"return confirm('apakah Anda yakin ingin menghapus data ini')"]); !!}

                                {!! Form::close() !!}
                    </tr>

                        @endforeach

                </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
