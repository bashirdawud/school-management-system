@extends('admin.admin_master')

@section('admin')

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
                   <form action="{{ route('users.update', $editData->id) }}" method="POST">
                       @csrf
                     <div class="row">
                       <div class="col-12">	

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <h5>User Role <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="usertype" id="select" required="" class="form-control" aria-invalid="false">
                    <option value="" selected disabled>Select Role</option>
                    <option value="Admin" {{ $editData->usertype === "Admin"? "selected" : "" }}>Admin</option>
                    <option value="User" {{ $editData->usertype === "User" ? "selected" : "" }}>User</option>
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
            <h5>User Email <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="email" value="{{ $editData->email }}" name="email" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
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
