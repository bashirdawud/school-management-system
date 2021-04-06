@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
     
      <!-- Main content -->
      <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Form Validation</h4>
             <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                     <div class="row">
                       <div class="col-12">	

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <h5>User Email <span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="email" value="{{ $editData->email }}" name="email" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <h5>Mobile <span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="text" value="{{ $editData->mobile }}" name="mobile" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <h5>Gender<span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="gender" id="select" required="" class="form-control" aria-invalid="false">
                    <option value="" selected disabled>Select Gender</option>
                    <option value="male" {{ $editData->gender === "male"? "selected" : "" }}>Male</option>
                    <option value="female" {{ $editData->gender === "female" ? "selected" : "" }}>Female</option>
                </select>
            <div class="help-block"></div></div>
        </div>
    </div>
    {{-- End of col 6  --}}

    <div class="col-md-6">
        <div class="form-group">
            <h5>User Name <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name" value="{{ $editData->name }}" class="form-control" required="" > <div class="help-block"></div></div>
            
        </div>
    </div>
    {{-- End of Col 6 --}}
</div>



<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <h5>Address <span class="text-danger">*</span></h5>
            <div class="controls">
            <input type="text" name="address" value="{{ $editData->address }}" class="form-control" required="" > <div class="help-block"></div></div>
            
        </div>
    </div>
    {{-- End of Col 6 --}}

    <div class="col-md-6">
        <div class="form-group">
            <h5>Profile Image <span class="text-danger">*</span></h5>
            <div class="controls">
            <input type="file"  id="choose-file" name="image" accept="image/*"  class="form-control" > <div class="help-block"></div></div>
            
        </div>

        <div class="form-group">
            <div id="img-preview">
                <div class="controls">
                    <img src="{{ (!empty($editData->image))? url('upload/user_images/'.$editData->image) : 
                    url('upload/no_image.jpg') }}" style="width: 100px; height: 100px; border: 1px solid #000000">
            </div>
            
            
        </div>
    </div>
</div>



                        


</div>   
                           
                           
                       
                           
                       <div class="text-xs-right">
                          <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update"> 
                       </div>
                   </form>

               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </section>
      <!-- /.content -->
    
    </div>
</div>



@endsection


{{-- <script type="text/javascripty">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result)
            }
            reader.readAsDataURL(e.target.file['0']);
        });
    });
</script> 
{{-- <script type="text/javascript">

    const chooseFile = document.getElementById('choose-file');
    const imgPreview = document.getElementById('img-preview');

    // event listener that detects a value change on the input field then calls function.
    chooseFile.addEventListener("change", function () {
        getImgData();
    });

    function getImgData() {
  const files = chooseFile.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
      imgPreview.style.display = "block";
      imgPreview.innerHTML = '<img src="' + this.result + '" />';
    });    
  }
}

</script>  --}}