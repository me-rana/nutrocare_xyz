@extends('backend.admin.theme.main')
@section('main')

<style>
label.btn {
  padding: 0;
}

label.btn input {
  opacity: 0;
  position: absolute;
}

label.btn span {
  text-align: center;
  padding: 6px 12px;
  display: block;
}

label.btn input:checked+span {
  background-color: rgb(80, 110, 228);
  color: #fff;
}
</style>

 <!--  Content Begin Here -->
 <div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Banner Create</h5>
          <div class="card mb-0">
            <div class="card-body p-4">
           
                  <!-- Top Start -->
                  <div class="row justify-content-end align-item-centre">
                    <div class="col-md-6 text-end">
                        <a href="{{ url('admin/banner/manage') }}"><button class="btn btn-primary">Manage</button></a>
                    </div>
                </div>
                <!-- Top End-->
                
                <form action="{{ url('admin/banner/store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId" />
                    </div>

                    <div class="mb-3">
                      <label for="" class="form-label">Link</label>
                      <input type="text" name="link" id="link" class="form-control" placeholder="" aria-describedby="helpId" />
                  </div>

                  <div class="mb-3">
                    <label for="" class="form-label">Banner Category</label>
                    <select
                      class="form-select form-select"
                      name="banner_category_id"
                      id=""
                    >
                      <option selected>Select one</option>
                      @foreach ($banner_categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  

                  <div class="mb-3">
                    <label for="" class="form-label">Choose file</label>
                    <input type="file" class="form-control" name="image" id="" placeholder="" aria-describedby="fileHelpId" />
                  </div>
                  


                    <div>
                        <label for="" class="form-label">Status</label> <br>
                        <label class="btn" id="off"><input type="radio"  name="status" value="1" checked><img src="../../../assets/images/button/switch-off.png" height="50px" /></label>
                        <label class="btn" id="on"><input type="radio"  name="status" value="0"><img src="../../../assets/images/button/switch-on.png" height="50px" /></label>
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

@section('js')
    <script>
        $(document).ready(function(){
     /*        $('#on').hide(); */
            $('#off').hide();
            $('input[type="radio"]').click(function() {
                $('input[type="radio"]').not(this).prop('checked', false);
            });
            $('#off').on('click',function(){
                $('#on').show();
                $('#off').hide();
                console.log('On');
            });

            $('#on').on('click',function(){
                $('#off').show();
                $('#on').hide();
                console.log('Off');
            });
            
        });
    </script>

<script>

  $("#name").change(function(){
  
      $.ajax({
        url: '{{ route("Admin Banner Slug") }}',
        type: 'get',
        data: {name: $(this).val()},
        datatype: 'json',
        success: function(response){
          $("#link").val(response.link);

        }
      })
  });
  
  </script>
@endsection