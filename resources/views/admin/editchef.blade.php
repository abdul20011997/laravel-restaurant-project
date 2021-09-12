@extends('admin.master')
@section('admincontent')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">


            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Chef</h4>
                    <div class="table-responsive">
                    <form action="/updatechef" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$data['id']}}" name="id"/>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Enter name" value="{{$data['name']}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Speciality</label>
                            <input type="text" class="form-control" name="speciality" id="exampleFormControlInput2" placeholder="Enter speciality" value="{{$data['speciality']}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile3">Image</label>
                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile3">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile3">Old Image</label>
                            <img src={{url('storage/chef',$data['image'])}} alt={{$data['name']}} style="width:100px;height:100px"/>
                        </div>

                        <button type="submit" class="btn btn-success">Update Chef</button>
                    </form>
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