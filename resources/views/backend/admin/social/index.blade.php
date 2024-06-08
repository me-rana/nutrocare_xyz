@extends('backend.admin.theme.main')
@section('main')

 <!--  Content Begin Here -->
 <div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Socials Management</h5>
          <div class="card mb-0">
            <div class="card-body p-4">
           
                  <!-- Top Start -->
                  <div class="row justify-content-end align-item-centre">
                    <div class="col-md-6 text-end">
                        <a href="{{ url('admin/social/create') }}"><button class="btn btn-primary">Create</button></a>
                    </div>
                </div>
                <!-- Top End-->
                <h5 class="text-center"><span style="border: 5px solid #000; border-radius: 2px;"><strong style="background: #000; color: #fff">Social </strong> Link</span></h5>
                <div class="table-responsive">
                    <table class="table table-white">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%">#Serial</th>
                                <th scope="col" style="width: 10%">Name</th>
                                <th scope="col" style="width: 20%">Icon</th>
                                <th scope="col" style="width: 40%">Link</th>
                                <th scope="col" style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($socials as $key=>$social)
                            <tr class="">
                                <input class="vid" type="hidden" name="id" value="{{ $social->id }}">
                                <td scope="row">{{ $key+1 }}</td>
                                <td>{{ $social->name }} </td>
                                <td>{!! $social->icon !!} </td>
                                <td>{{ $social->link }} </td>
                                <td>
                                    <a href="{{ url('admin/social/edit/'.$social->id) }}">
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
            var url = "/admin/social/delete/" + id;
            window.location.href = url;
        }
    });


</script>

@endsection