@extends('adminform')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Them danh muc san pham
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
                        <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ten danh muc</label>
                            <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Ten danh muc muon tao">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mo ta danh muc san pham</label>
                            <textarea type="text" name="category_product_desc" style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" placeholder="Mo ta danh muc san pham"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hien thi</label>
                            <select name="category_product_status" class="form-control input-sm m-bot15">
                                <option value="0">Hien thi</option>
                                <option value="1">An</option>
                                
                            </select>
                        </div>
                        
                        <button type="submit" name="add_category_product" class="btn btn-info">Them danh muc</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection
