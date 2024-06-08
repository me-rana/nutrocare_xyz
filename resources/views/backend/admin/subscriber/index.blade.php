@extends('backend.admin.theme.main')
@section('main')

 <!--  Content Begin Here -->
 <div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Subscriber Management</h5>
          <div class="card mb-0">
            <div class="card-body p-4">

                <h5 class="text-center"><span style="border: 5px solid #000; border-radius: 2px;"><strong style="background: #000; color: #fff">Subscriber </strong> List</span></h5>
                <div class="table-responsive">
                    <table class="table table-white">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%">#Serial</th>
                                <th scope="col" style="width: 70%">Email</th>
                                <th scope="col" style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscribers as $key=>$subscriber)
                            <tr class="">
                                <input class="vid" type="hidden" name="id" value="{{ $subscriber->id }}">
                                <td scope="row">{{ $key+1 }}</td>
   
                                <td>{{ $subscriber->email }} </td>
    

                                <td>
                         
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
            var url = "/admin/subscriber/delete/" + id;
            window.location.href = url;
        }
    });


</script>

@endsection