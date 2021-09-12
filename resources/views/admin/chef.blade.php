@extends('admin.master')
@section('admincontent')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">


            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Chef</h4>
                    <div class="table-responsive">
                    <form action="/addchef" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Speciality</label>
                            <input type="text" class="form-control" name="speciality" id="exampleFormControlInput2" placeholder="Enter speciality">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile3">Image</label>
                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile3">
                        </div>
                        <button type="submit" class="btn btn-success">Add Chef</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List of Users</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Sno </th>
                            <th> Name </th>
                            <th> Speciality </th>
                            <th> Image </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        @for($i=0;$i<count($data);$i++)
                          <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$data[$i]['name']}}</td>
                            <td>{{$data[$i]['speciality']}}</td>
                            <td><img src={{url('storage/chef',$data[$i]['image'])}} style="width:100px;height:100px;"/></td>
                            <td><a href={{url('editchef',$data[$i]['id'])}}>Edit</a></td>
                            <td><a href={{url('deletechef',$data[$i]['id'])}}>Delete</a></td>
                          </tr>
                          @endfor
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            
            </div>
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
   @endsection