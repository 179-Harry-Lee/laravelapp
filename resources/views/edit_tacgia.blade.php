@extends('adminform')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cap nhat tac gia
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
                        @foreach ( $edit_tacgia as $key => $tacgia )
                            
    
                        <form role="form" action="{{URL::to('/update-tacgia/'.$tacgia->tacgia_id)}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ten tac gia</label>
                            <input type="text" value="{{$tacgia->tacgia_name}}" name="tacgia_name" class="form-control" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ma tac gia</label>
                            <input type="text" value="{{$tacgia->tacgia_code}}" name="tacgia_code" class="form-control" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" value="{{$tacgia->tacgia_email}}" name="tacgia_email" class="form-control" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Gioi Tinh</label>
                            <select  name="tacgia_sex" class="form-control input-sm m-bot15">


                                <option selected value="Nam">Nam</option>
        
                                <option value="Nu">Nu</option>
                                
                                     
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Mat khau</label>
                            <input type="password" value="{{$tacgia->tacgia_password}}" name="tacgia_password" class="form-control" id="exampleInputEmail1">
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Hinh anh</label>
                            <input type="file" name="tacgia_image" class="form-control" id="exampleInputEmail1">
                            <img src="{{URL::to('upload/tacgia/'.$tacgia->tacgia_image)}}" height="100" width="100">
                        </div> --}}


                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">So Dien Thoai</label>
                            <input type="text" value="{{$tacgia->tacgia_phone}}" name="tacgia_phone" class="form-control" id="exampleInputEmail1">
                        </div> --}}
                        
                        
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hien thi</label>
                            <select name="tacgia_status" class="form-control input-sm m-bot15">
                                <option value="0">Hien thi</option>
                                <option value="1">An</option>
                                
                            </select>
                        </div> 

                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Hien thi</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Hien thi</option>
                                <option value="1">An</option>
                                
                            </select>
                        </div>  --}}
                        <button type="submit" name="update_tacgia" class="btn btn-info">Cap nhat tac gia</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
</div>
@endsection
