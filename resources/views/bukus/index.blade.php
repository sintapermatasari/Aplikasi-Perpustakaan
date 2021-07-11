@extends('bukus.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('bukus.create') }}"> Create New Buku</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Id Buku</th>
            <th>Judul</th>
            <th>Id Penerbit</th>
            <th>Pengarang</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($bukus as $buku)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $buku->id_buku }}</td>
            <td>{{ $buku->judul }}</td>
            <td>{{ $buku->id_penerbit }}</td>
            <td>{{ $buku->pengarang }}</td>
            <td>
                <form action="{{ route('bukus.destroy',$buku->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('bukus.show',$buku->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('bukus.edit',$buku->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $bukus->links() !!}
      
@endsection