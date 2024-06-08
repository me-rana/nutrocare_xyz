@extends('backend.admin.theme.main')
@section('main')


 <!--  Content Begin Here -->
 <div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Social Edit</h5>
          <div class="card mb-0">
            <div class="card-body p-4">
           
                  <!-- Top Start -->
                  <div class="row justify-content-end align-item-centre">
                    <div class="col-md-6 text-end">
                        <a href="{{ url('admin/social/manage') }}"><button class="btn btn-primary">Manage</button></a>
                    </div>
                </div>
                <!-- Top End-->
                
                <form action="{{ url('admin/social/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="hidden_id" value="{{ $social->id }}" hidden/>
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" value="{{ $social->name }}" id="" class="form-control" placeholder="" aria-describedby="helpId" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Icon</label>
                        <input type="text" name="icon" value="{{ $social->icon }}" id="" class="form-control" placeholder="" aria-describedby="helpId" />
                    </div>

                    <div class="mb-3">
                      <label for="" class="form-label">Link</label>
                      <input type="text" name="link" value="{{ $social->link }}" id="" class="form-control" placeholder="" aria-describedby="helpId" />
                  </div>

                    
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Submit
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
