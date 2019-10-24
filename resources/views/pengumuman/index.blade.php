@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List Pengumuman</div>                
                <div class="card-body">
                <a href="{!! route('pengumuman.create') !!}" class="btn btn-primary">Tambahkan Data</a>
                <table border="1">
                    <tr>
                        <td>ID</td>
                        <td>Judul</td>
                        <td>Isi</td>
                        <td>Users Id</td>
                        <td>Kategori Id</td>
                        <td>Create</td>
                        <td>Aksi</td>
                    </tr>

                    @foreach ($listPengumuman as $item)

                    <tr>
                        <td>{!! $item->id !!}</td>
                        <td>{!! $item->judul !!}</td>
                        <td>{!! $item->isi !!}</td>
                        <td>{!! $item->users_id !!}</td>
                        <td>{!! $item->kategori_pengumuman_id !!}</td>
                        <td>{!! $item->created_at->format('d/m/Y H:i') !!}</td>
                        <td>
                            <a href="{!! route('pengumuman.show' ,[$item->id]) !!}"  
                                class="btn btn-sm btn-success">Lihat</a>
                            <a href="{!! route('pengumuman.edit' ,[$item->id]) !!}"  
                                class="btn btn-sm btn-warning">Ubah</a>
                            
                                {!! Form::open(['route'=>['pengumuman.destroy', $item->id],'method'=>'delete']) !!}

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
