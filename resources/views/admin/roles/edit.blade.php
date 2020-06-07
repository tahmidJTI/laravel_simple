<x-admin-master>
    @section('content')
        <h1>{{$role->name}}</h1>

        <form action="{{route('roles.update',$role->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$role->name}}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    @if(!$permissions->isEmpty())
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Checkbox</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Checkbox</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Delete</th>

                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>
                                    <input type="checkbox" @foreach($role->permissions as $role_permission)
                                    @if($role_permission->slug == $permission->slug)
                                    checked
                                        @endif
                                        @endforeach>
                                </td>
                                <td>{{$permission->id}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->slug}}</td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif

    @endsection
</x-admin-master>
