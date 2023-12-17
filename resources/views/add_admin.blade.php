@extends('adminform')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Them Nhan Vien
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
                        <form role="form" action="{{URL::to('/save-admin')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{-- ten san pham --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ten nhan vien</label>
                            <input type="text" name="admin_name" class="form-control" id="exampleInputEmail1" placeholder="Ten nhan vien">
                        </div>

                            {{-- Ten tac gia --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="admin_email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Gioi Tinh</label>
                            <select name="admin_sex" class="form-control input-sm m-bot15">
                                <option value="Nam">Nam</option>
                                <option value="Nu">Nu</option>
                                
                            </select>
                        </div>

                            
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mat khau</label>
                            <input type="password" name="admin_password" class="form-control" id="exampleInputEmail1" placeholder="Password">
                        </div>

                            {{-- hinh anh san pham --}}
                        <div class="form-group">
                            <label for="exampleInputPassword1">Chan dung nhan vien</label>
                            <input type="file" name="admin_image" style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" >
                        </div>


                            {{-- Gia san pham --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">So Dien Thoai</label>
                            <input type="text" name="admin_phone" class="form-control" id="exampleInputEmail1" placeholder="So dien thoai">
                        </div>

                            {{-- Gan san pham vao danh muc --}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Quyen han</label>
                                <select name="admin_permission" class="form-control input-sm m-bot15">
                                    <option value="1">Chu</option>
                                    <option value="2">Nhan vien</option>
                                    
                                </select>
                            </div>

                        
                        
                        <button type="submit" name="add_admin" class="btn btn-info">Them nhan vien</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection
