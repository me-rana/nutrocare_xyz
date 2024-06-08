@extends('backend.admin.theme.main')
@section('main')

 <!--  Content Begin Here -->
 <div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Profile Management</h5>
          <div class="card mb-0">
            <div class="card-body p-4">
                
                <form action="{{ route('Admin Profile Store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" value="{{ $profile->name }}" id="" class="form-control" placeholder="" aria-describedby="helpId"/>
                    </div>

                    <div class="mb-3">
                      <label for="" class="form-label">Choose file</label>
                      <input type="file" class="form-control" name="image" id="" placeholder="" aria-describedby="fileHelpId"/>
                      <img src="{{ asset($profile->profile_photo_path ?? 'assets/backend/images/profile/user-1.jpg') }}" height="70px" width="70px" style="border-radius: 50%" />
                    </div>
                    

                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" name="email" value="{{ $profile->email }}" id="" class="form-control" placeholder="" aria-describedby="helpId" disabled/>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">User Type</label>
                        <select class="form-select" name="role_id" id="" disabled>
                            <option selected>Select One</option>
                            <option value="1" @if($profile->role_id == 1) selected @endif>User</option>
                            <option value="2" @if($profile->role_id == 2) selected @endif>Admin</option>
                            <option value="" @if($profile->role_id == null) selected @endif>Suspend</option>
                        </select>
                    </div>
                        <h6 class="text-center"><strong>Password Change</strong></h6>
                        <p class="text-danger text-center">[ *Fill up when Change Password ]</p>
                        <hr>
                    <div class="mb-3">
                        <label for="" class="form-label">Old Password</label>
                        <input type="text" name="old_password" id="" class="form-control" placeholder="" aria-describedby="helpId"/>
                    </div>
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="text" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId"/>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="text" name="confirm_password" id="" class="form-control" placeholder="" aria-describedby="helpId"/>
                    </div>

                    <button type="submit" class="btn btn-primary"> Submit
                    </button>
                     
                </form>
                
                

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
