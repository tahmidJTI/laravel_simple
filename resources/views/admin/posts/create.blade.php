<x-admin-master>
    @section('content')
        <h1>create post</h1>

        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title"></label>
                        <input type="text" name="title" class="form-control" id="" aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="file"></label>
                        <input type="file" name="post_image" class="form-control-file" id="" aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for=""></label>
                        <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
    @endsection
</x-admin-master>
