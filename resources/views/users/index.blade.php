<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <h3>All Users</h3>
    <a href="{{ route('users.create') }}" class="btn btn-dark">Add User</a>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Emails</th>
                <th>Roles</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($users as $user)
            <tbody>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->roles as $role)
                        {{ $role->name }} {{ !$loop->last ? ',' : '' }}
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-dark">View</a>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-dark">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                    </form>

                </td>
        @endforeach
        </tbody>
    </table>

</body>

</html>



</div>
