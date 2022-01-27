<x-admin-master>

    @section('content')

        <h1>All Posts</h1>

        @if(\Illuminate\Support\Facades\Session::has('message'))
           <div class="alert alert-danger"> {{session('message')}}</div>
        @elseif(session('post-created-message'))
            <div class="alert alert-success"> {{session('post-created-message')}}</div>
        @elseif(session('post-updated'))
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
                            <th>Created By</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Created By</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->user->name}}</td>
                            <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</td>
                            <td>
                            <img width="100px" src="{{$post->post_image}}" alt="">
                            </td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td>
                                @can('view', $post)
                                <form action="{{ route('post.destroy',$post->id) }}" method="POST">
                                @csrf
                                    @method('DELETE');
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                @endcan


                            </td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

      <div class="d-flex">
          <div class="mx-auto">
              {{$posts->links('pagination::bootstrap-4')}}
          </div>
      </div>

    @endsection

    @section('scripts')

            <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

            <!-- Page level custom scripts -->

        @endsection

</x-admin-master>