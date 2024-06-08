@extends('backend.admin.theme.main')
@section('main')

 <!--  Content Begin Here -->
 <div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Banner Management</h5>
          <div class="card mb-0">
            <div class="card-body p-4">
           
                  <!-- Top Start -->
                  <div class="row justify-content-end align-item-centre">
                    <div class="col-md-6 text-end">
                        <a href="{{ url('admin/banner/create-category') }}"><button class="btn btn-primary">Create</button></a>
                    </div>
                </div>
                <!-- Top End-->
                <h5 class="text-center"><span style="border: 5px solid #000; border-radius: 2px;"><strong style="background: #000; color: #fff">Banner </strong> Category</span></h5>
                <div class="table-responsive">
                    <table class="table table-white">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%">#Serial</th>
                                <th scope="col" style="width: 10%">Status</th>
                                <th scope="col" style="width: 30%">Name</th>
                                <th scope="col" style="width: 30%">Slug</th>
                                <th scope="col" style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banner_categories as $key=>$banner_category)
                            <tr class="">
                                <input class="vid" type="hidden" name="id" value="{{ $banner_category->id }}">
                                <td scope="row">{{ $key+1 }}</td>
                                <td>
                                    @if($banner_category->status == 1)
                                    <form action="{{ route('Admin Banner Category Status') }}" method="post" class="statusForm">
                                        @csrf
                                        <input type="hidden" name="hidden_id" value="{{ $banner_category->id }}">
                                        <input type="hidden" name="status" value="0">
                                        <button style="border: 0px; background:transparent" type="submit" class="switchBtn">
                                            <img src="../../../assets/images/button/switch-on.png" height="35px" />
                                        </button>
                                    </form>
                                    @else
                                    <form action="{{ route('Admin Banner Category Status') }}" method="post" class="statusForm">
                                        @csrf
                                        <input type="hidden" name="hidden_id" value="{{ $banner_category->id }}">
                                        <input type="hidden" name="status" value="1">
                                        <button style="border: 0px; background:transparent" type="submit" class="switchBtn">
                                            <img src="../../../assets/images/button/switch-off.png" height="35px" />
                                        </button>
                                    </form>
                                    @endif
                                </td>
                                <td>{{ $banner_category->name }} </td>
                                <td>{{ $banner_category->slug }} </td>
                                <td>
                                    <a href="{{ url('admin/banner/edit-category/'.$banner_category->id) }}">
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

            <div class="card-body p-4">
           
                <!-- Top Start -->
                <div class="row justify-content-end align-item-centre">
                  <div class="col-md-6 text-end">
                      <a href="{{ url('admin/banner/create') }}"><button class="btn btn-primary">Create</button></a>
                  </div>
              </div>
              <!-- Top End-->
              <h5 class="text-center"><span style="border: 5px solid #000; border-radius: 2px;"><strong style="background: #000; color: #fff">Banner </strong> List</span></h5>
              <div class="table-responsive">
                  <table class="table table-white">
                      <thead>
                          <tr>
                              <th scope="col" style="width: 5%">#Serial</th>
                              <th scope="col" style="width: 10%">Status</th>
                              <th scope="col" style="width: 15%">Image</th>
                              <th scope="col" style="width: 15%">Name</th>
                              <th scope="col" style="width: 25%">Link</th>
                              <th scope="col" style="width: 20%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($banners as $key=>$banner)
                          <tr class="">
                              <input class="vid-banner" type="hidden" name="id" value="{{ $banner->id }}">
                              <td scope="row">{{ $key+1 }}</td>
                              <td>
                                @if($banner->status == 1)
                                    <form action="{{ route('Admin Banner Status') }}" method="post" class="statusForm">
                                        @csrf
                                        <input type="hidden" name="hidden_id" value="{{ $banner->id }}">
                                        <input type="hidden" name="status" value="0">
                                        <button style="border: 0px; background:transparent" type="submit" class="switchBtnBanner">
                                            <img src="../../../assets/images/button/switch-on.png" height="35px" />
                                        </button>
                                    </form>
                                    @else
                                    <form action="{{ route('Admin Banner Status') }}" method="post" class="statusForm">
                                        @csrf
                                        <input type="hidden" name="hidden_id" value="{{ $banner->id }}">
                                        <input type="hidden" name="status" value="1">
                                        <button style="border: 0px; background:transparent" type="submit" class="switchBtnBanner">
                                            <img src="../../../assets/images/button/switch-off.png" height="35px" />
                                        </button>
                                    </form>
                                    @endif
                              </td>
                              <td><img src="{{ asset($banner->image) }}" height="60px" width="120px"/> </td>
                              <td>{{ $banner->name }} </td>
                              <td>{{ $banner->link }} </td>
                              <td>
                                  <a href="{{ url('admin/banner/edit/'.$banner->id) }}">
                                      <button class="btn btn-danger">
                                          Edit
                                      </button>
                                  </a>
                       
                                      <button class="btn btn-danger remove-banner">
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
            var url = "/admin/banner/delete-category/" + id;
            window.location.href = url;
        }
    });


</script>
<script type="text/javascript">
    $(".remove-banner").click(function(){
        var id = $(this).parents('tr').find('.vid-banner').val();
        console.log(id);
        if(confirm('Are you sure to remove this record ?'))
        {
            var url = "/admin/banner/delete/" + id;
            window.location.href = url;
        }
    });


</script>
@endsection