@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
     
      <!-- Main content -->
      <section class="content">
        <div class="row">
            
          

         

          

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">User List</h3>
                <a href="{{ route('add.user') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add User</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>SL</th>
                              <th>Role</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Action date</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($alldata as $user)
                          <tr>
                              <td>{{ $user->id }}</td>
                              <td>{{ $user->usertype }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn  btn-info mb-5">Edit</a>
                                <a href="{{ route('user.delete', $user->id) }}" class="btn  btn-danger mb-5" id="delete">Delete</a>
                              </td>
                              
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>Name</th>
                              <th>Position</th>
                              <th>Office</th>
                              <th>Age</th>
                              <th>Start date</th>
                              <th>Salary</th>
                          </tr>
                      </tfoot>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

                    
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>

    	

@endsection