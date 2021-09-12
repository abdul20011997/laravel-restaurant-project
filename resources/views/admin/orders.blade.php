@extends('admin.master')
@section('admincontent')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">


            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List of Orders</h4>
                    <form method="post" action="search">
                      @csrf
                    <input type="text" name="search" placeholder="search here"/>
                    <button type="submit" class="btn btn-success">Search</button>
                    </form>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Sno </th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th> Product ID </th>
                            <th> Price </th>
                            <th> Quatity </th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          @for($i=0;$i<count($data);$i++)
                          <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$data[$i]['name']}}</td>
                            <td>{{$data[$i]['phoneno']}}</td>
                            <td>{{$data[$i]['address']}}</td>
                            <td>{{$data[$i]['product_id']}}</td>
                            <td>{{$data[$i]['price']}}</td>
                            <td>{{$data[$i]['quantity']}}</td>
                            <td>{{$data[$i]['price'] * $data[$i]['quantity']}}</td>

                         
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