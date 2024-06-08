@extends('backend.admin.theme.main')
@section('main')

 <!--  Content Begin Here -->
 <div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Blog Management</h5>
          <div class="card mb-0">
           
            <div class="card-body p-4">
           
                <!-- Top Start -->
                <div class="row justify-content-end align-item-centre">
                  <div class="col-md-6 text-end">
                      <a href="{{ url('admin/blog/create') }}"><button class="btn btn-primary">Create</button></a>
                  </div>
              </div>
              <!-- Top End-->
              <h5 class="text-center"><span style="border: 5px solid #000; border-radius: 2px;"><strong style="background: #000; color: #fff">Blog </strong> List</span></h5>
              <div class="table-responsive">
                  <table class="table table-white">
                      <thead>
                          <tr>
                              <th scope="col" style="width: 5%">#Serial</th>
                              <th scope="col" style="width: 10%">Status</th>
                              <th scope="col" style="width: 10%">Image</th>
                              <th scope="col" style="width: 10%">Title</th>
                              <th scope="col" style="width: 25%">Description</th>
                              <th scope="col" style="width: 15%">Keywords</th>
                              <th scope="col" style="width: 25%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($banners as $key=>$blog)
                          <tr class="">
                              <input class="vid-blog" type="hidden" name="id" value="{{ $blog->id }}">
                              <td scope="row">{{ $key+1 }}</td>
                              <td>
                                @if($blog->status == 1)
                                    <form action="{{ route('Admin Blog Status') }}" method="post" class="statusForm">
                                        @csrf
                                        <input type="hidden" name="hidden_id" value="{{ $blog->id }}">
                                        <input type="hidden" name="status" value="0">
                                        <button style="border: 0px; background:transparent" type="submit" class="switchBtnBanner">
                                            <img src="../../../assets/images/button/switch-on.png" height="35px" />
                                        </button>
                                    </form>
                                    @else
                                    <form action="{{ route('Admin Blog Status') }}" method="post" class="statusForm">
                                        @csrf
                                        <input type="hidden" name="hidden_id" value="{{ $blog->id }}">
                                        <input type="hidden" name="status" value="1">
                                        <button style="border: 0px; background:transparent" type="submit" class="switchBtnBanner">
                                            <img src="../../../assets/images/button/switch-off.png" height="35px" />
                                        </button>
                                    </form>
                                    @endif
                              </td>
                              <td><img src="{{ asset($blog->image) }}" height="60px" width="120px"/> </td>
                              <td>{{ $blog->title }} </td>
                              <td>{{ Str::limit($blog->description, 50, '...') }} </td>
                              <td>{{ $blog->keywords }} </td>
                              <td>
                                  <a href="{{ url('admin/blog/edit/'.$blog->id) }}">
                                      <button class="btn btn-danger">
                                          Edit
                                      </button>
                                  </a>
                       
                                      <button class="btn btn-danger remove-blog">
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
            var url = "/admin/blog/delete-category/" + id;
            window.location.href = url;
        }
    });


</script>
<script type="text/javascript">
    $(".remove-blog").click(function(){
        var id = $(this).parents('tr').find('.vid-blog').val();
        console.log(id);
        if(confirm('Are you sure to remove this record ?'))
        {
            var url = "/admin/blog/delete/" + id;
            window.location.href = url;
        }
    });


</script>
@endsection