@extends('master')
@section('content')
<!-- ***** Preloader Start ***** -->
<div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
     <!-- ***** Main Banner Area Start ***** -->
     <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="font-size: 30px;text-align: center;">Cart Page</div>
                @if(count($data) > 0)
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Sub Total</th>
                        <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0;$i<count($data);$i++)
                        <tr>
                        <th scope="row">{{$i+1}}</th>
                        <td>{{$data[$i]['title']}}</td>
                        <td>{{$data[$i]['price']}}</td>
                        <td>{{$data[$i]['Qty']}}</td>
                        <td>{{$data[$i]['Qty'] * $data[$i]['price']}}</td>
                        <td><a href="{{url('removecart',$data[$i]['ID'])}}" class="btn btn-danger">Remove</a></td>
                        </tr>
                        <tr>
                        @endfor
                        <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>{{$totalamount}}</td>
                        <td></td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
                <button class="btn btn-success" style="margin:auto" onclick="showorder()">Order Now</button>
                <div style="display:none;margin:auto;" class="col-sm-12" id="orderform">
                <form  action="/order" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone Number</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Phonenumber" name="phoneno"
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2">Address</label>
                        <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Enter Address" name="address">
                    </div>
                    <button class="btn btn-primary" style="margin:auto" type="submit">Place Order</button>

                </form>
                </div>
                @else
                <div class="col-sm-12" style="font-size: 26px;">No products in cart</div>
                @endif
            </div>
        </div>
     </div>
     <script>
         function showorder(){
            var x=document.getElementById('orderform');
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
         }
 
    </script>
@endsection