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
                    <form action="/addfoodmenu" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Price</label>
                            <input type="text" class="form-control" name="price" id="exampleFormControlInput2" placeholder="Enter price">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea3">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea3" rows="3" placeholder="Enter description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile3">Image</label>
                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile3">
                        </div>
                        <button type="submit" class="btn btn-success">Add Food Menu</button>
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
                            <th> Title </th>
                            <th> Price </th>
                            <th> Description </th>
                            <th> Image </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          @for($i=0;$i<count($data);$i++)
                          <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$data[$i]['title']}}</td>
                            <td>{{$data[$i]['price']}}</td>
                            <td>{{$data[$i]['description']}}</td>
                            <td><img src={{url('storage/foodmenu',$data[$i]['image'])}} style="width:100px;height:100px;"/></td>
                            <td><a href={{url('editfoodmenu',$data[$i]['id'])}}>Edit</a></td>
                            <td><a href={{url('deletefoodmenu',$data[$i]['id'])}}>Delete</a></td>
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
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
   @endsection