@extends('admin.master')
@section('admincontent')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">


            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List of Reservation</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Sno </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Phone Number </th>
                            <th> Number of Guest </th>
                            <th> Date </th>
                            <th> Time </th>
                            <th> Message </th>


                          </tr>
                        </thead>
                        <tbody>
                          @for($i=0;$i<count($data);$i++)
                          <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$data[$i]['name']}}</td>
                            <td>{{$data[$i]['email']}}</td>
                            <td>{{$data[$i]['phoneno']}}</td>
                            <td>{{$data[$i]['guest']}}</td>
                            <td>{{$data[$i]['date']}}</td>
                            <td>{{$data[$i]['time']}}</td>
                            <td>{{$data[$i]['message']}}</td>


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