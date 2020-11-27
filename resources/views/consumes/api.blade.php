@extends('index')
@section('konten')


<div class="row">
  <div class="col-12">
      <table class="table table-primary table-responsive-lg">
      <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
          </tr>
      </thead>
      <tbody>
          @foreach($responseBody as $consume)
          <tr>
              <td>{{ $consume->data->id }}</td>
              <td>{{ $consume->data->name }}</td>
          </tr>
          @endforeach
      </tbody>
      </table>
      {{ $responseBody->links() }}
  </div>
</div>
