@extends('adminform')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cap nhat san pham
                </header>
                <div class="panel-body">
                    <?php
		                $message = Session::get('message');
		                if ($message) {
			            echo $message;
			            Session::put('message',null);
		                }
	                ?>
                    
                    <div class="position-center">
                        @foreach ( $edit_product as $key => $pro )
                            
    
                        <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ten san pham</label>
                            <input type="text" value="{{$pro->product_name}}" name="product_name" class="form-control" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ten tac gia</label>
                            <input type="text" value="{{$pro->product_author}}" name="product_author" class="form-control" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Gia san pham</label>
                            <input type="text" value="{{$pro->product_price}}" name="product_price" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hinh anh</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                            <img src="{{URL::to('upload/product/'.$pro->product_image)}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mo ta san pham</label>
                            <textarea type="text" name="product_desc" style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" >{{$pro->product_desc}}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh muc san pham</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">

                                @foreach ( $cate_product as $key => $cate )
                                
                                @if ($cate->category_id == $pro->category_id)

                                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                
                                @else

                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                
                                @endif
                                @endforeach
                            
                                     
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Hien thi</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Hien thi</option>
                                <option value="1">An</option>
                                
                            </select>
                        </div> 
                        <button type="submit" name="update_product" class="btn btn-info">Cap nhat san pham</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
</div>
@endsection
