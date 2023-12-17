@extends('adminform')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cap nhat danh muc san pham
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
                        @foreach ( $edit_category_product as $key => $edit_value )
                            
    
                        <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ten danh muc</label>
                            <input type="text" value="{{$edit_value->category_name}}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Ten danh muc muon tao">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mo ta danh muc san pham</label>
                            <textarea type="text" name="category_product_desc" style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" >{{$edit_value->category_desc}}</textarea>
                        </div>
                        
                        
                        <button type="submit" name="update_category_product" class="btn btn-info">Cap nhat danh muc</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
</div>
@endsection
