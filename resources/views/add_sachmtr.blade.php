@extends('adminform')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Tao thong tin muon sach
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
                        <form role="form" action="{{URL::to('/save-sachmtr')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{-- ten san pham --}}
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ma muon sach</label>
                            <input type="text" name="sachmtr_codemuon" class="form-control" id="exampleInputEmail1" placeholder="Ma muon sach">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Nguoi Doc</label>
                            <select name="acc" class="form-control input-sm m-bot15">
                              @foreach ($acc as $key =>$a )
                                   
                                <option value="{{$a->acc_id}}">{{$a->acc_name}}</option>
                                
                              @endforeach 
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ten sach</label>
                            <select name="book" class="form-control input-sm m-bot15">
                              @foreach ($book as $key =>$b )
                                   
                                <option value="{{$b->book_id}}">{{$b->book_name}}</option>
                                
                              @endforeach 
                                
                            </select>
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


                        <div class="form-group">
                            <label for="exampleInputPassword1">Chu thich noi dung muon</label>
                            <textarea type="text" name="sachmtr_desc" style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" placeholder="Chu thich noi dung muon"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngay muon</label>
                            <input type="date" name="sachmtr_ngaymuon" class="form-control" id="exampleInputEmail1" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngay tra</label>
                            <input type="date" name="sachmtr_ngaytra" class="form-control" id="exampleInputEmail1" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Trang thai</label>
                            <input type="text" name="sachmtr_status" class="form-control" id="exampleInputEmail1" >
                        </div>


                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Hien thi</label>
                            <select name="book_status" class="form-control input-sm m-bot15">
                                <option value="0">Hien Thi</option>
                                <option value="1">An</option>
                                
                            </select>
                        </div> --}}


                           {{-- Gan san pham vao danh muc --}}
                           {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Danh muc san pham</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                              @foreach ($cate_product as $key =>$cate )
                                   
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                
                              @endforeach 
                                
                            </select>
                        </div> --}}
                        
                        <button type="submit" name="add_sachmtr" class="btn btn-info">Muon sach</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection
