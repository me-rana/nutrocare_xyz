@extends('backend.admin.theme.main')
@section('main')

 <!--  Content Begin Here -->
 <div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Settings Management</h5>
          <div class="card mb-0">
            <div class="card-body p-4">
                
                <form action="{{ route('Admin Company Store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Company Name</label>
                        <input type="text" name="name" value="{{ $company->name ?? ''}}" id="" class="form-control" placeholder="" aria-describedby="helpId"/>
                    </div>

                    <div class="mb-3">
                      <label for="" class="form-label">Choose file</label>
                      <input type="file" class="form-control" name="logo" id="" placeholder="" aria-describedby="fileHelpId"/>
                      <img src="{{ asset($company->logo ?? 'assets/images/logo/logo.png')}}" height="70px" width="120px" />
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Choose file</label>
                        <input type="file" class="form-control" name="favicon" id="" placeholder="" aria-describedby="fileHelpId"/>
                        <img src="{{ asset($company->favicon ?? 'assets/images/logo/favicon.png')  }}" height="70px" width="70px" style="border-radius: 50%" />
                      </div>

                      <div class="mb-3">
                        <label for="others" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="" rows="3">{{ $company->description ?? ''}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Address</label>
                        <input type="text" name="address" value="{{ $company->address ?? ''}}" id="" class="form-control" placeholder="" aria-describedby="helpId"/>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Company Email</label>
                        <input type="text" name="email" value="{{ $company->email ?? ''}}" id="" class="form-control" placeholder="" aria-describedby="helpId"/>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Company Phone</label>
                        <input type="text" name="phone" value="{{ $company->phone ?? ''}}" id="" class="form-control" placeholder="" aria-describedby="helpId"/>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Support Phone</label>
                        <input type="text" name="support" value="{{ $company->support ?? ''}}" id="" class="form-control" placeholder="" aria-describedby="helpId"/>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Copyright</label>
                        <input type="text" name="copyright" value="{{ $company->copyright ?? ''}}" id="" class="form-control" placeholder="" aria-describedby="helpId"/>
                    </div>

                    <div class="mb-3">
                        <label for="others" class="form-label">Others Company</label>
                        <textarea class="form-control" name="others" id="" rows="3">{{ $company->others ?? ''}}</textarea>
                    </div>
                    
                    

                    <button type="submit" class="btn btn-primary"> Submit </button>
                     
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
