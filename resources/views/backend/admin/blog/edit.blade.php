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
          <h5 class="card-title fw-semibold mb-4">Blog Create</h5>
          <div class="card mb-0">
            <div class="card-body p-4">
           
                  <!-- Top Start -->
                  <div class="row justify-content-end align-item-centre">
                    <div class="col-md-6 text-end">
                        <a href="{{ url('admin/blog/manage') }}"><button class="btn btn-primary">Manage</button></a>
                    </div>
                </div>
                <!-- Top End-->
                
                <form action="{{ url('admin/blog/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="hidden_id" value="{{ $blog->id }}">
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $blog->title }}" />
                    </div>

                    <div class="mb-3">
                      <label for="" class="form-label">Slug</label>
                      <input type="text" name="slug" id="slug" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $blog->slug }}" disabled/>
                  </div>

                  <div class="mb-3">
                    <label for="" class="form-label">Blog Category</label>
                    <select
                      class="form-select form-select"
                      name="category"
                      id=""
                    >
                      <option selected>Select one</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $blog->category) selected @endif>{{ $category->category_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  

                  <div class="mb-3">
                    <label for="" class="form-label">Choose file</label>
                    <input type="file" class="form-control" name="image" id="" placeholder="" aria-describedby="fileHelpId" />
                    <img src="{{ asset($blog->image) }}" height="40px" width="60px" style="margin-top: 5px" alt="" srcset="">
                  </div>

                  <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="inp_editor1" rows="3">{!! $blog->description !!}</textarea>
                  </div>
                  
                  


                    <div>
                        <label for="" class="form-label">Status</label> <br>
                        <label class="btn" id="off"><input type="radio"  name="status" value="1" @if($blog->status == 1) checked @endif><img src="../../../assets/images/button/switch-off.png" height="50px" /></label>
                        <label class="btn" id="on"><input type="radio"  name="status" value="0" @if($blog->status == 0) checked @endif><img src="../../../assets/images/button/switch-on.png" height="50px" /></label>
                      </div>

                      <h6 class="text-center"><strong class="text-uppercase text-decoration-underline">SEO Tool</strong></h6>
                      <div class="mb-3">
                        <label for="" class="form-label">Keyword</label>
                        <input
                          type="text"
                          name="keyword"
                          id=""
                          class="form-control"
                          placeholder=""
                          aria-describedby="helpId"
                          value="{{ $blog->keywords }}"
                        />
                      </div>


                      <div class="mb-3">
                        <label for="" class="form-label">Short Description</label>
                        <textarea class="form-control" name="short_description" id="" rows="3">{{ $blog->short_description }}</textarea>
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
        var status = {{ $blog->status }}
        if(status == 0){
            $('#on').hide();
        }
        else{
            $('#off').hide();
        }
        
        
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

  $("#title").change(function(){
  
      $.ajax({
        url: '{{ route("Admin Blog Slug") }}',
        type: 'get',
        data: {title: $(this).val()},
        datatype: 'json',
        success: function(response){
          $("#slug").val(response.slug);

        }
      })
  });
  
  </script>
@endsection