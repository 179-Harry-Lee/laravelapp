@extends('adminform')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Them Nha xuat ban
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
                        <form role="form" action="{{URL::to('/save-nxb')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{-- ten san pham --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ten nha xuat ban</label>
                            <input type="text" name="nxb_name" class="form-control" id="exampleInputEmail1" placeholder="Ten nha xuat ban">
                        </div>

                            {{-- Ten tac gia --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ma nha xuat ban</label>
                            <input type="text" name="nxb_code" class="form-control" id="exampleInputEmail1" placeholder="Ma nha san xuat">
                        </div>

                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Gioi Tinh</label>
                            <select name="admin_sex" class="form-control input-sm m-bot15">
                                <option value="Nam">Nam</option>
                                <option value="Nu">Nu</option>
                                
                            </select>
                        </div> --}}

                            
                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Mat khau</label>
                            <input type="password" name="admin_password" class="form-control" id="exampleInputEmail1" placeholder="Password">
                        </div> --}}

                            {{-- hinh anh san pham --}}
                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Chan dung nhan vien</label>
                            <input type="file" name="admin_image" style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" >
                        </div> --}}


                            {{-- Gia san pham --}}
                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">So Dien Thoai</label>
                            <input type="text" name="admin_phone" class="form-control" id="exampleInputEmail1" placeholder="So dien thoai">
                        </div> --}}

                            {{-- Gan san pham vao danh muc --}}
                            {{-- <div class="form-group">
                                <label for="exampleInputPassword1">Quyen han</label>
                                <select name="admin_permission" class="form-control input-sm m-bot15">
                                    <option value="1">Chu</option>
                                    <option value="2">Nhan vien</option>
                                    
                                </select>
                            </div> --}}

                        
                        
                        <button type="submit" name="add_nxb" class="btn btn-info">Them nha xuat ban</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection
