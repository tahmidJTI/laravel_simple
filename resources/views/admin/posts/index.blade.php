<x-admin-master>
    @section('content')
        <h1>View All Posts</h1>
        @if(session('message'))
            <div class="alert alert-danger">{{session('message')}}</div>

        @elseif(session('create'))
            <div class="alert alert-success">{{session('create')}}</div>

        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Owner</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Update</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Owner</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Update</th>
                            <th>Delete</th>

                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->title}}</td>
                                <td><img src="{{$post->post_image}}" alt="No image" height="60px"></td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>
                                    @can('update',$post)
                                    <a href="{{route('post.edit',$post->id)}}"><button class="btn btn-info">Update</button></a>
{{--                                    @if(auth()->user()->name == $post->user->name)--}}
{{--                                        <a href="{{route('post.edit',$post->id)}}"><button class="btn btn-info">Update</button></a>--}}
{{--                                    @else--}}
{{--                                    <p>Unavailable</p>--}}
{{--                                    @endif--}}
                                    @endcan
                                </td>
                                <td>
{{--                                    @if(auth()->user()->name == $post->user->name)--}}
{{--                                        <form action="{{route('post.destroy',$post->id)}}" method="post" enctype="multipart/form-data">--}}
{{--                                            {{csrf_field()}}--}}
{{--                                            <input type="hidden" name="_method" value="DELETE">--}}
{{--                                            <button class="btn btn-danger">Delete</button>--}}
{{--                                        </form>--}}
{{--                                    @else--}}
{{--                                        <p>Unavailable</p>--}}
{{--                                    @endif--}}
                                    <form action="{{route('post.destroy',$post->id)}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
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
