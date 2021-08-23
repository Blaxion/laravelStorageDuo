<section class="my-5 border-dark  border border-2 rounded">
    <h1 class="display-1 text-center ">Add a member</h1>
    <form action="/member" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Age</label>
            <input type="number" name="age" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name='gender'>
                <option selected>Open this select menu</option>
                @foreach ($genders as $gender)
                    <option value="{{$gender->gender}}">{{$gender->gender}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Profile img</label>
            <input type="file" name="img" class="form-control" id="exampleInputPassword1">
        </div>
        <button class="btn btn-success" type='submit'>SUBMIT</button>
    </form>
    <h1 class="display-3 text-center ">Members list</h1>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Picture</th>
                <th scope="col">Utilities</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <th scope="row">{{ $member->id }}</th>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->age }}</td>
                    <td>{{ $member->gender }}</td>
                    <td><img src="{{ asset('img/'.$member->img) }}" alt="" width="100rem"></td>
                    <td>
                        <form action="/member/{{ $member->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">DEL</button>
                        </form>
                        <a href="/member/{{ $member->id }}/edit" class="btn btn-warning">EDIT</a>
                        <a href="/member/{{ $member->id }}/download" class="btn btn-info">Download</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
