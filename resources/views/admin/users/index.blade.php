<x-admin-master>

    @section('content')

        <h1>All Users</h1>

        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-danger"> {{session('message')}}</div>
        @endif


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="usertable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Avatar</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Registed User</th>
                            <th>Updated User Profile</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Avatar</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Registed User</th>
                            <th>Updated User Profile</th>
                            <th>Delete</th>

                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                    <img class="img-profile rounded-circle" width="65px" height="65" src="{{$user->avatar}}" alt="">
                                </td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->updated_at->diffForHumans()}}</td>
                                <td>
                                    <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE');
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>



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
                {{$users->links('pagination::bootstrap-4')}}
            </div>
        </div>
    @endsection

    @section('scripts')

        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->

    @endsection


</x-admin-master>
