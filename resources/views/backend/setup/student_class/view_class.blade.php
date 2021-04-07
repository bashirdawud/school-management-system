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
                <h3 class="box-title">Student Class</h3>
                <a href="{{ route('add.class') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student Class</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              
                              <th>Name</th>
                              
                              <th style="float: right;" width="5%">Action date</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allData as $key => $student )
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $student->name }}</td>
                              
                              <td>
                                <a href="{{ route('class.edit', $student->id) }}" class="btn  btn-info mb-5">Edit</a>
                                <a href="{{ route('class.delete', $student->id) }}" class="btn  btn-danger mb-5" id="delete">Delete</a>
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