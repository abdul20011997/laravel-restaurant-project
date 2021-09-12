<div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">
                @for($i=0;$i<count($data);$i++)
                    <div class="item" >
                        <div class='card card1' style="background:url({{url('storage/foodmenu',$data[$i]['image'])}})">
                            <div class="price"><h6>${{$data[$i]['price']}}</h6></div>
                            <div class='info'>
                              <h1 class='title'>{{$data[$i]['title']}}</h1>
                              <p class='description'>{{$data[$i]['description']}}</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                            
                        </div>
                        <form action="addtocart" method="POST">
                            @csrf
                        <input type="hidden" value="{{$data[$i]['id']}}" name="productid"/>
                        <div class="mb-3" style="margin-top: 10px;">
                            <input type="number" class="form-control" name="quantity" value="1" min="1" style="display:inline-block;width:114px;">
                            <button class="btn btn-success" style="display:inline-block;width:121px;">Add to Cart</button>
                        </div>
                        </form>
                    </div>
                    @endfor
                </div>
            </div>
        </div>