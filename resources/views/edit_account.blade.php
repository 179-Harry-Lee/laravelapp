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
			            echo '
                            
                                <span class="text-alert">'.$message.'</span>
                            
                            
                        ';
			            Session::put('message',null);
		                }
	                ?>
                    
                    <div class="position-center">
                        @foreach ( $edit_account as $key => $acc )
                            
    
                        <form role="form" action="{{URL::to('/update-account/'.$acc->acc_id)}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ho va ten</label>
                            <input type="text" value="{{$acc->acc_name}}" name="acc_name" class="form-control" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" value="{{$acc->acc_email}}" name="acc_email" class="form-control" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">So Dien Thoai</label>
                            <input type="text" value="{{$acc->acc_phone}}" name="acc_phone" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mat khau</label>
                            <input type="password" value="{{$acc->acc_password}}" name="acc_password" class="form-control" id="exampleInputEmail1">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gioi Tinh</label>
                            <select name="acc_sex" class="form-control input-sm m-bot15">
                                <option value="Nam">Nam</option>
                                <option value="Nu">Nu</option>
                                
                            </select>
                        </div> 

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ma the</label>
                            <input type="text" value="{{$acc->acc_codecard}}" name="acc_codecard" class="form-control" id="exampleInputEmail1">
                        </div>


                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Ngay dang ky</label>
                            <input type="date" value="{{$acc->acc_ngaydangky}}" name="acc_ngaydangky" class="form-control" id="exampleInputEmail1">
                        </div> --}}

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngay het han</label>
                            <input type="date" value="{{$acc->acc_ngayhethan}}" name="acc_ngayhethan" class="form-control" id="exampleInputEmail1">
                        </div>
                        <button type="submit" name="update_account" class="btn btn-info">Cap nhat tai khoan</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
</div>
@endsection
