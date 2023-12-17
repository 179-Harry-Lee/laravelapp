@extends('adminform')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cap nhat nha xuat ban
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
                        @foreach ( $edit_nxb as $key => $nxb )
                            
    
                        <form role="form" action="{{URL::to('/update-nxb/'.$nxb->nxb_id)}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ten nha xuat ban</label>
                            <input type="text" value="{{$nxb->nxb_name}}" name="nxb_name" class="form-control" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ma nha xuat ban</label>
                            <input type="text" value="{{$nxb->nxb_code}}" name="nxb_code" class="form-control" id="exampleInputEmail1">
                        </div>

                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Gioi Tinh</label>
                            <select  name="nxb_sex" class="form-control input-sm m-bot15">


                                <option selected value="Nam">Nam</option>
        
                                <option value="Nu">Nu</option>
                                
                                     
                            </select>
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Mat khau</label>
                            <input type="password" value="{{$nxb->nxb_password}}" name="nxb_password" class="form-control" id="exampleInputEmail1">
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Hinh anh</label>
                            <input type="file" name="nxb_image" class="form-control" id="exampleInputEmail1">
                            <img src="{{URL::to('upload/nxb/'.$nxb->nxb_image)}}" height="100" width="100">
                        </div> --}}


                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">So Dien Thoai</label>
                            <input type="text" value="{{$nxb->nxb_phone}}" name="nxb_phone" class="form-control" id="exampleInputEmail1">
                        </div> --}}
                        
                        
                        
                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Quyen</label>
                            <select  name="nxb_permission" class="form-control input-sm m-bot15">


                                <option selected value="1">Chu</option>
                                
                        

                                <option value="2">Nhan vien</option>
                                
                                     
                            </select>
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Hien thi</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Hien thi</option>
                                <option value="1">An</option>
                                
                            </select>
                        </div>  --}}
                        <button type="submit" name="update_nxb" class="btn btn-info">Cap nhat nha xuat ban</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
</div>
@endsection
