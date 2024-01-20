<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>User Management </title>
</head>

<body>
    <h3>Edit User</h3>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="" class="form-control" value="{{ $user->name }}" />
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" name="email" id="" class="form-control" value="{{ $user->email }}" />
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Roles</label>
            <select multiple name="roles[]" id="" class="form-control">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" @if (in_array($role->id, $user->roles->pluck('id')->toArray())) selected @endif>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
            @error('roles')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark px-4">Update User</button>
    </form>
</body>

</html>
