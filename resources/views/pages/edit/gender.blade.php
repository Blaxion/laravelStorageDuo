@extends('layout.index')
@section('main')
    <form action="/gender/{{ $edit->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Gender</label>
            <input type="text" name='gender' value='{{ $edit->gender }}' class="form-control" id="exampleInputPassword1">
        </div>
        <button class="btn btn-success" type='submit'>SUBMIT</button>
    </form>
@endsection
