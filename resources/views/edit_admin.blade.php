@extends('adminform')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cap nhat tai khoan
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
                        @foreach ( $edit_admin as $key => $ad )
                            
    
                        <form role="form" action="{{URL::to('/update-admin/'.$ad->admin_id)}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ho va ten</label>
                            <input type="text" value="{{$ad->admin_name}}" name="admin_name" class="form-control" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" value="{{$ad->admin_email}}" name="admin_email" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gioi Tinh</label>
                            <select  name="admin_sex" class="form-control input-sm m-bot15">


                                <option selected value="Nam">Nam</option>
        
                                <option value="Nu">Nu</option>
                                
                                     
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mat khau</label>
                            <input type="password" value="{{$ad->admin_password}}" name="admin_password" class="form-control" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hinh anh</label>
                            <input type="file" name="admin_image" class="form-control" id="exampleInputEmail1">
                            <img src="{{URL::to('upload/admin/'.$ad->admin_image)}}" height="100" width="100">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">So Dien Thoai</label>
                            <input type="text" value="{{$ad->admin_phone}}" name="admin_phone" class="form-control" id="exampleInputEmail1">
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Quyen</label>
                            <select  name="admin_permission" class="form-control input-sm m-bot15">


                                <option selected value="1">Chu</option>
                                
                        

                                <option value="2">Nhan vien</option>
                                
                                     
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Hien thi</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Hien thi</option>
                                <option value="1">An</option>
                                
                            </select>
                        </div>  --}}
                        <button type="submit" name="update_admin" class="btn btn-info">Cap nhat tai khoan</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
</div>
@endsection
