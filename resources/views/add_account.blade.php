@extends('adminform')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Them The Muon Sach
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
                        <form role="form" action="{{URL::to('/save-account')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{-- ten san pham --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ho va ten</label>
                            <input type="text" name="acc_name" class="form-control" id="exampleInputEmail1" placeholder="Ho va ten">
                        </div>

                            {{-- Ten tac gia --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="acc_email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Gioi Tinh</label>
                            <select name="acc_sex" class="form-control input-sm m-bot15">
                                <option value="Nam">Nam</option>
                                <option value="Nu">Nu</option>
                                
                            </select>
                        </div>

                            
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mat khau</label>
                            <input type="password" name="acc_password" class="form-control" id="exampleInputEmail1" placeholder="Password">
                        </div>

                            {{-- hinh anh san pham --}}
                        <div class="form-group">
                            <label for="exampleInputPassword1">Chan dung</label>
                            <input type="file" name="acc_image" style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" >
                        </div>


                            {{-- Gia san pham --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">So Dien Thoai</label>
                            <input type="text" name="acc_phone" class="form-control" id="exampleInputEmail1" placeholder="So dien thoai">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ma the</label>
                            <input type="text" name="acc_codecard" class="form-control" id="exampleInputEmail1" placeholder="Ma the">
                        </div>
                            

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngay dang ky</label>
                            <input type="date" name="acc_ngaydangky" class="form-control" id="exampleInputEmail1" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngay het han</label>
                            <input type="date" name="acc_ngayhethan" class="form-control" id="exampleInputEmail1" >
                        </div>
                        
                        <button type="submit" name="add_account" class="btn btn-info">Tao the</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection
