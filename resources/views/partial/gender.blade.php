<section class="my-5 border-dark  border border-2 rounded">
    <h1 class="display-1 text-center ">Add a gender</h1>
    <form action="/gender" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Gender</label>
            <input type="text" name='gender' class="form-control" id="exampleInputPassword1">
        </div>
        <button class="btn btn-success" type='submit'>SUBMIT</button>
    </form>

    <h1 class="display-3 text-center ">Genders list</h1>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Genders</th>
                <th scope="col">Utilities</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($genders as $gender)
                <tr>
                    <th scope="row">{{ $gender->id }}</th>
                    <td>{{ $gender->gender }}</td>
                    <td>
                        <form action="/gender/{{ $gender->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">DEL</button>
                        </form>
                        <a href="/gender/{{ $gender->id }}/edit" class="btn btn-warning">Edit</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</section>
