@extends('admin.master')
@section('admincontent')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">


            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Food Menu</h4>
                    <div class="table-responsive">
                    <form action="/updatefoodmenu" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="{{$data['id']}}" name="id"/>
                    @csrf
                    <div class="form-group">
                            <label for="exampleFormControlInput1">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter title" value="{{$data['title']}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Price</label>
                            <input type="text" class="form-control" name="price" id="exampleFormControlInput2" placeholder="Enter price" value="{{$data['price']}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea3">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea3" rows="3" placeholder="Enter description" >{{$data['description']}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile3">Image</label>
                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile3">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile3">Old Image</label>
                            <img src={{url('storage/foodmenu/',$data['image'])}} style="height:100px;width:100px"/>
                        </div>
                        <button type="submit" class="btn btn-success">Update Food Menu</button>
                    </form>
                    </div>
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