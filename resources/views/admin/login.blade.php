@extends('admin.master')
@section('admincontent')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">


            <div class="row ">
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
                            <th> Email </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          @for($i=0;$i<count($data);$i++)
                          <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$data[$i]['name']}}</td>
                            <td>{{$data[$i]['email']}}</td>
                            @if($data[$i]['type']=='0')
                            <td>
                            <div class="badge badge-outline-success"><a href={{url('deleteuser',$data[$i]['id'])}} style="text-decoration:none;">Delete</a></div>
                            </td>
                            @else
                            <td>
                            <div class="badge badge-outline-success">Not Allow</div>
                            </td>
                            @endif
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