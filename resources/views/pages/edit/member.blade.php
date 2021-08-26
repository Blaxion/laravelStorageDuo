@extends('layout.index')
@section('main')
<form action="/member/{{$edit->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Name</label>
        <input type="text" name="name" value="{{$edit->name}}" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Age</label>
        <input type="number" name="age" value="{{$edit->age}}" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <select class="form-select"  aria-label="Default select example" name='gender'>
            <option selected>Open this select menu</option>
            @foreach ($genders as $gender)
                <option value="{{$gender->gender}}">{{$gender->gender}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Profile img</label>
        <input type="file" name="img" value="{{$edit->''}}" class="form-control" id="exampleInputPassword1">
    </div>
    <button class="btn btn-success" type='submit'>SUBMIT</button>
</form>
@endsection