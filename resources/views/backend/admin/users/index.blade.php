@extends('backend.admin.theme.main')
@section('main')

 <!--  Content Begin Here -->
 <div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">User Management</h5>
          <div class="card mb-0">
            <div class="card-body p-4">
                <!-- Top Start -->
                <div class="row justify-content-end align-item-centre">
                    <div class="col-md-6 text-end">
                        <a href="{{ url('admin/user/create') }}"><button class="btn btn-primary">Create</button></a>
                    </div>
                </div>
                <!-- Top End-->
                <h5 class="text-center"><span style="border: 5px solid #000; border-radius: 2px;"><strong style="background: #000; color: #fff">Admin </strong> List</span></h5>
                <div class="table-responsive">
                    <table class="table table-white">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%">#Serial</th>
                                <th scope="col" style="width: 10%">Profile</th>
                                <th scope="col" style="width: 20%">Name</th>
                                <th scope="col" style="width: 40%">Email</th>
                                <th scope="col" style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $key=>$admin)
                            <tr class="">
                                <input class="vid" type="hidden" name="id" value="{{ $admin->id }}">
                                <td scope="row">{{ $key+1 }}</td>
                                <td><img src="{{ asset($admin->profile_photo_path ?? 'assets/backend/images/profile/user-1.jpg')  }}" height="35px" width="35px" style="border-radius: 50%" /></td>
                                <td>{{ $admin->name }} @if($admin->email_verified_at != null) <img src="{{ asset('assets/images/menu/quality.png') }}" alt="Verified Admin" height="20px" width="20px" /> @endif </td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <a href="{{ url('admin/user/edit/'.$admin->id) }}">
                                        <button class="btn btn-danger">
                                            Edit
                                        </button>
                                    </a>
                         
                                        <button class="btn btn-danger remove" @if(Auth::user()->id == $admin->id) disabled @endif>
                                            Delete
                                        </button>
                                
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <h5 class="text-center my-5"><span style="border: 5px solid #000; border-radius: 2px;"><strong style="background: #000; color: #fff">User </strong> List</span></h5>
                <div class="table-responsive">
                    <table class="table table-white">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%">#Serial</th>
                                <th scope="col" style="width: 15%">Profile</th>
                                <th scope="col" style="width: 20%">Name</th>
                                <th scope="col" style="width: 35%">Email</th>
                                <th scope="col" style="width: 30%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key=>$user)
                            <tr class="">
                                <input class="vid" type="hidden" name="id" value="{{ $user->id }}">
                                <td scope="row">{{ $key+1 }}</td>
                                <td><img src="{{ asset($user->profile_photo_path ?? 'assets/backend/images/profile/user-1.jpg') }}" height="35px" width="35px" style="border-radius: 50%" /></td>
                                <td>{{ $user->name }}  </td>
                                <td>{{ $user->email }} </td>
                                <td>
                                    <a href="{{ url('admin/user/edit/'.$user->id) }}">
                                        <button class="btn btn-danger">
                                            Edit
                                        </button>
                                    </a>
                             
                                        <button class="btn btn-danger remove">
                                            Delete
                                        </button>
                            
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h5 class="text-center my-5"><span style="border: 5px solid #000; border-radius: 2px;"><strong style="background: #000; color: #fff">Suspend </strong> List</span></h5>
                <div class="table-responsive">
                    <table class="table table-white">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%">#Serial</th>
                                <th scope="col" style="width: 10%">Profile</th>
                                <th scope="col" style="width: 20%">Name</th>
                                <th scope="col" style="width: 40%">Email</th>
                                <th scope="col" style="width: 30%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suspends as $key=>$suspend)
                            <tr class="">
                                <input class="vid" type="hidden" name="id" value="{{ $suspend->id }}">
                                <td scope="row">{{ $key+1 }}</td>
                                <td><img src="{{ asset($suspend->profile_photo_path ?? 'assets/backend/images/profile/user-1.jpg')  }}" height="35px" width="35px" style="border-radius: 50%" /></td>
                                <td>{{ $suspend->name }} </td>
                                <td>{{ $suspend->email }}</td>
                                <td>
                                    <a href="{{ url('admin/user/edit/'.$suspend->id) }}">
                                        <button class="btn btn-danger">
                                            Edit
                                        </button>
                                    </a>
                            
                                        <button class="btn btn-danger remove">
                                            Delete
                                        </button>
                             
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
 <!--  Content End Here -->

@endsection

@section('js')
<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents('tr').find('.vid').val();
        console.log(id);
        if(confirm('Are you sure to remove this record ?'))
        {
            var url = "/admin/user/delete/" + id;
            window.location.href = url;
        }
    });


</script>
@endsection
