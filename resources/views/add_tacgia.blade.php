@extends('adminform')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Them Tac Gia
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
                        <form role="form" action="{{URL::to('/save-tacgia')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{-- ten san pham --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ten tac gia</label>
                            <input type="text" name="tacgia_name" class="form-control" id="exampleInputEmail1" placeholder="Ten tac gia">
                        </div>

                            {{-- Ten tac gia --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="tacgia_email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Gioi Tinh</label>
                            <select name="tacgia_sex" class="form-control input-sm m-bot15">
                                <option value="Nam">Nam</option>
                                <option value="Nu">Nu</option>
                                
                            </select>
                        </div>

                            
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ma tac gia</label>
                            <input type="text" name="tacgia_code" class="form-control" id="exampleInputEmail1" placeholder="Code">
                        </div>

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
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hien thi</label>
                                <select name="tacgia_status" class="form-control input-sm m-bot15">
                                    <option value="1">An</option>
                                    <option value="0">Hien thi</option>
                                    
                                </select>
                            </div>

                        
                        
                        <button type="submit" name="add_tacgia" class="btn btn-info">Them tac gia</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection
