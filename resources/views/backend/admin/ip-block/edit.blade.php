@extends('backend.admin.theme.main')
@section('main')


 <!--  Content Begin Here -->
 <div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Ip Block Edit</h5>
          <div class="card mb-0">
            <div class="card-body p-4">
           
                  <!-- Top Start -->
                  <div class="row justify-content-end align-item-centre">
                    <div class="col-md-6 text-end">
                        <a href="{{ url('admin/ip-block/manage') }}"><button class="btn btn-primary">Manage</button></a>
                    </div>
                </div>
                <!-- Top End-->
                
                <form action="{{ url('admin/ip-block/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="hidden_id" value="{{ $ip_block->id }}" hidden/>
                    <div class="mb-3">
                        <label for="" class="form-label">IP No</label>
                        <input type="text" name="ip_no" value="{{ $ip_block->ip_no }}" id="" class="form-control" placeholder="" aria-describedby="helpId" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Reason</label>
                        <input type="text" name="reason" value="{{ $ip_block->reason }}" id="" class="form-control" placeholder="" aria-describedby="helpId" />
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

