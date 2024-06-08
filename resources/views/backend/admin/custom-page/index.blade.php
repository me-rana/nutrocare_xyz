@extends('backend.admin.theme.main')
@section('main')

 <!--  Content Begin Here -->
 <div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Custom Page Management</h5>
          <div class="card mb-0">
            <div class="card-body p-4">
           
                  <!-- Top Start -->
                  <div class="row justify-content-end align-item-centre">
                    <div class="col-md-6 text-end">
                        <a href="{{ url('admin/custom-page/create') }}"><button class="btn btn-primary">Create</button></a>
                    </div>
                </div>
                <!-- Top End-->
                <h5 class="text-center"><span style="border: 5px solid #000; border-radius: 2px;"><strong style="background: #000; color: #fff">Custom </strong> Page</span></h5>
                <div class="table-responsive">
                    <table class="table table-white">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%">#Serial</th>
                                <th scope="col" style="width: 10%">Status</th>
                                <th scope="col" style="width: 20%">Name</th>
                                <th scope="col" style="width: 40%">Description</th>
                                <th scope="col" style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($custom_pages as $key=>$page)
                            <tr class="">
                                <input class="vid" type="hidden" name="id" value="{{ $page->id }}">
                                <td scope="row">{{ $key+1 }}</td>
                                <td>
                                    @if($page->status == 1)
                                    <form action="{{ route('Admin Page Status') }}" method="post" class="statusForm">
                                        @csrf
                                        <input type="hidden" name="hidden_id" value="{{ $page->id }}">
                                        <input type="hidden" name="status" value="0">
                                        <button style="border: 0px; background:transparent" type="submit" class="switchBtn">
                                            <img src="../../../assets/images/button/switch-on.png" height="35px" />
                                        </button>
                                    </form>
                                    @else
                                    <form action="{{ route('Admin Page Status') }}" method="post" class="statusForm">
                                        @csrf
                                        <input type="hidden" name="hidden_id" value="{{ $page->id }}">
                                        <input type="hidden" name="status" value="1">
                                        <button style="border: 0px; background:transparent" type="submit" class="switchBtn">
                                            <img src="../../../assets/images/button/switch-off.png" height="35px" />
                                        </button>
                                    </form>
                                    @endif
                                </td>
                                <td>{{ $page->name }} </td>
                                <td class="text-truncate">{{ substr($page->description, 0, 50) }} </td>
                                <td>
                                    <a href="{{ url('admin/custom-page/edit/'.$page->id) }}">
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
            var url = "/admin/custom-page/delete/" + id;
            window.location.href = url;
        }
    });


</script>

@endsection