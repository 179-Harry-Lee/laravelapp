@extends('adminform')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Them dau muc sach
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
                        <form role="form" action="{{URL::to('/save-category-book')}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ten Dau Muc</label>
                            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Ten danh muc muon tao">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mo ta dau muc sach </label>
                            <textarea type="text" name="category_desc" style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" placeholder="Mo ta danh muc san pham"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hien thi</label>
                            <select name="category_status" class="form-control input-sm m-bot15">
                                <option value="0">Hien thi</option>
                                <option value="1">An</option>
                                
                            </select>
                        </div>
                        
                        <button type="submit" name="add_category_book" class="btn btn-info">Them danh muc</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection
