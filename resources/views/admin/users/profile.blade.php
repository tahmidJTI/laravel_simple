<x-admin-master>
    @section('content')
        <h3>User Profile : {{$user->name}}</h3>

        <div class="row">
            <div class="col-sm-6">

                <form action="{{route('user.profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <img class="img-profile rounded-circle" src="{{$user->avatar}}" height="80px" width="80px">
                            </div>

                            <div class="form-group">
                                <input type="file" name="avatar">
                            </div>

                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" name="username" class="form-control" @error('username') is-invalid @enderror id="username" value="{{$user->username}}">
                            </div>

                            @error('username')
                                <div class="invalid-feedback d-block">
                                    {{$message}}
                                </div>
                            @enderror

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="" value="{{$user->name}}">
                            </div>

                            @error('name')
                                <div class="invalid-feedback d-block" style="margin-top: -2%">
                                    {{$message}}
                                </div>
                            @enderror

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="" value="{{$user->email}}">
                            </div>

                            @error('email')
                                <div class="invalid-feedback d-block">
                                    <div class="invalid-feedback d-block" style="margin-top: -2%">
                                        {{$message}}
                                    </div>
                                </div>
                            @enderror

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" name="password" class="form-control" id="password" aria-describedby="">
                            </div>

                            <div class="form-group">
                                <label for="password-confirmation">Confirm Password</label>
                                <input type="text" name="password_confirmation" class="form-control" id="password-confirmation" aria-describedby="">
                            </div>

                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Options</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attach</th>
                                <th>Detach</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Options</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attach</th>
                                <th>Detach</th>

                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>
                                        <input type="checkbox" @foreach($user->roles as $user_role)
                                                    @if($user_role->slug == $role->slug)
                                                        checked
                                                    @endif
                                            @endforeach>
                                    </td>


                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->slug}}</td>
                                    <td>

                                        <form action="{{route('user.role.attach',$user)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="role" value="{{$role->id}}">
                                            <button class="btn btn-primary"@if($user->roles->contains($role->id)) disabled @endif>Attach</button>
                                        </form>

                                    </td>
                                    <td><form action="{{route('user.role.detach',$user)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="role" value="{{$role->id}}">
                                            <button class="btn btn-danger" @if(!$user->roles->contains($role->id)) disabled @endif>Detach</button>
                                        </form></td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection

        @section('scripts')

        <!-- Page level plugins -->
            <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

            <!-- Page level custom scripts -->
            <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

        @endsection
</x-admin-master>
