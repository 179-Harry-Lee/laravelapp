@extends('adminform')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cap nhat sach
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
                        @foreach ( $edit_book as $key => $eb )
                            
    
                        <form role="form" action="{{URL::to('/update-book/'.$eb->book_id)}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ten sach</label>
                            <input type="text" value="{{$eb->book_name}}" name="book_name" class="form-control" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Tac gia</label>
                            <select name="tacgia" class="form-control input-sm m-bot15">

                                @foreach ( $tacgia as $key => $tg )
                                
                                @if ($tg->tacgia_id == $eb->tacgia_id)

                                <option selected value="{{$tg->tacgia_id}}">{{$tg->tacgia_name}}</option>
                                
                                @else

                                <option value="{{$tg->tacgia_id}}">{{$tg->tacgia_name}}</option>
                                
                                @endif
                                @endforeach
                            
                                     
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hinh anh</label>
                            <input type="file" name="book_image" class="form-control" id="exampleInputEmail1">
                            <img src="{{URL::to('upload/book/'.$eb->book_image)}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mo ta san pham</label>
                            <textarea type="text" name="book_desc" style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" >{{$eb->book_desc}}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Dau muc sach</label>
                            <select name="book_cate" class="form-control input-sm m-bot15">

                                @foreach ( $cate_book as $key => $cate )
                                
                                @if ($cate->category_id == $eb->category_id)

                                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                
                                @else

                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                
                                @endif
                                @endforeach
                            
                                     
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Nha xuat ban</label>
                            <select name="nxb" class="form-control input-sm m-bot15">

                                @foreach ( $nxb as $key => $nhaxb )
                                
                                @if ($nhaxb->nxb_id == $eb->nxb_id)

                                <option selected value="{{$nhaxb->nxb_id}}">{{$nhaxb->nxb_name}}</option>
                                
                                @else

                                <option value="{{$nhaxb->nxb_id}}">{{$nhaxb->nxb_name}}</option>
                                
                                @endif
                                @endforeach
                            
                                     
                            </select>
                        </div>

                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hien thi</label>
                            <select name="book_status" class="form-control input-sm m-bot15">
                                <option value="0">Hien thi</option>
                                <option value="1">An</option>
                                
                            </select>
                        </div> 
                        <button type="submit" name="update_book" class="btn btn-info">Cap nhat san pham</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
</div>
@endsection
