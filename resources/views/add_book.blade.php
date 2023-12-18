@extends('adminform')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Them Sach
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
                        <form role="form" action="{{URL::to('/save-book')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{-- ten san pham --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ten sach</label>
                            <input type="text" name="book_name" class="form-control" id="exampleInputEmail1" placeholder="Ten san pham muon tao">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Tac gia</label>
                            <select name="tacgia" class="form-control input-sm m-bot15">
                              @foreach ($tacgia as $key =>$tg )
                                   
                                <option value="{{$tg->tacgia_id}}">{{$tg->tacgia_name}}</option>
                                
                              @endforeach 
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Dau muc sach</label>
                            <select name="book_cate" class="form-control input-sm m-bot15">
                              @foreach ($cate_book as $key =>$cate )
                                   
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                
                              @endforeach 
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Nha xuat ban</label>
                            <select name="nxb" class="form-control input-sm m-bot15">
                              @foreach ($nxb as $key =>$nhaxb )
                                   
                                <option value="{{$nhaxb->nxb_id}}">{{$nhaxb->nxb_name}}</option>
                                
                              @endforeach 
                                
                            </select>
                        </div>



                            {{--  mo ta noi dung san pham --}}
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mo ta noi dung san pham</label>
                            <textarea type="text" name="book_desc" style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" placeholder="Mo ta noi dung danh muc san pham"></textarea>
                        </div>

                            {{-- hinh anh san pham --}}
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hinh san pham</label>
                            <input type="file" name="book_image" style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" >
                        </div>


                            

                         

                        <div class="form-group">
                            <label for="exampleInputPassword1">Hien thi</label>
                            <select name="book_status" class="form-control input-sm m-bot15">
                                <option value="0">Hien Thi</option>
                                <option value="1">An</option>
                                
                            </select>
                        </div>


                           {{-- Gan san pham vao danh muc --}}
                           {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Danh muc san pham</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                              @foreach ($cate_product as $key =>$cate )
                                   
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                
                              @endforeach 
                                
                            </select>
                        </div> --}}
                        
                        <button type="submit" name="add_product" class="btn btn-info">Them san pham</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection
