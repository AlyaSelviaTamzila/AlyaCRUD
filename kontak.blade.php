@extends('template')
@section('content')
    <section class="main-section">
      <div class="content">
        <h1>Data Kontak</h1>
        @if(Session::has('alert_message'))
        <div class="alert alert-success">
          <strong>{{ Session::get('alert_message')}}</strong>
        </div>
        @endif
        <hr>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Email</th>
              <th>No. HP</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php $no = 1; @endphp
            @foreach($data as $datas)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $datas->nama }}</td>
              <td>{{ $datas->email }}</td>
              <td>{{ $datas->nohp }}</td>
              <td>{{ $datas->alamat }}</td>
              <td>
                <form action="{{ route('kontak.destroy', $datas->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('kontak.edit',$datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                            </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>
    @endsection
