@extends('adminform')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cap nhat thong tin muon/tra
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
                        @foreach ( $edit_sachmtr as $key => $es )
                            
    
                        <form role="form" action="{{URL::to('/update-sachmtr/'.$es->sachmtr_id)}}" method="post">
                            {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ma muon</label>
                            <input type="text" value="{{$es->sachmtr_codemuon}}" name="sachmtr_codemuon" class="form-control" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Doc gia</label>
                            <select name="acc" class="form-control input-sm m-bot15">

                                @foreach ( $acc as $key => $a )
                                
                                @if ($a->acc_id == $es->acc_id)

                                <option selected value="{{$a->acc_id}}">{{$a->acc_name}}</option>
                                
                                @else

                                <option value="{{$a->acc_id}}">{{$a->acc_name}}</option>
                                
                                @endif
                                @endforeach
                            
                                     
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Ten sach</label>
                            <select name="book" class="form-control input-sm m-bot15">

                                @foreach ( $book as $key => $b )
                                
                                @if ($b->book_id == $es->book_id)

                                <option selected value="{{$b->book_id}}">{{$b->book_name}}</option>
                                
                                @else

                                <option value="{{$b->book_id}}">{{$b->book_name}}</option>
                                
                                @endif
                                @endforeach
                            
                                     
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Tac gia</label>
                            <select name="tacgia" class="form-control input-sm m-bot15">

                                @foreach ( $tacgia as $key => $tg )
                                
                                @if ($tg->tacgia_id == $es->tacgia_id)

                                <option selected value="{{$tg->tacgia_id}}">{{$tg->tacgia_name}}</option>
                                
                                @else

                                <option value="{{$tg->tacgia_id}}">{{$tg->tacgia_name}}</option>
                                
                                @endif
                                @endforeach
                            
                                     
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Dau muc sach</label>
                            <select name="book_cate" class="form-control input-sm m-bot15">

                                @foreach ( $cate_book as $key => $cate )
                                
                                @if ($cate->category_id == $es->category_id)

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
                                
                                @if ($nhaxb->nxb_id == $es->nxb_id)

                                <option selected value="{{$nhaxb->nxb_id}}">{{$nhaxb->nxb_name}}</option>
                                
                                @else

                                <option value="{{$nhaxb->nxb_id}}">{{$nhaxb->nxb_name}}</option>
                                
                                @endif
                                @endforeach
                            
                                     
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Dau muc sach</label>
                            <select name="book_cate" class="form-control input-sm m-bot15">

                                @foreach ( $cate_book as $key => $cate )
                                
                                @if ($cate->category_id == $es->category_id)

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
                                
                                @if ($nhaxb->nxb_id == $es->nxb_id)

                                <option selected value="{{$nhaxb->nxb_id}}">{{$nhaxb->nxb_name}}</option>
                                
                                @else

                                <option value="{{$nhaxb->nxb_id}}">{{$nhaxb->nxb_name}}</option>
                                
                                @endif
                                @endforeach
                            
                                     
                            </select>
                        </div> --}}
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ghi chu muon sach</label>
                            <textarea type="text" name="sachmtr_desc" style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" >{{$es->sachmtr_desc}}</textarea>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngay muon</label>
                            <input type="date" value="{{$es->sachmtr_ngaymuon}}" name="sachmtr_ngaymuon" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngay tra</label>
                            <input type="date" value="{{$es->sachmtr_ngaytra}}" name="sachmtr_ngaytra" class="form-control" id="exampleInputEmail1">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Trang thai</label>
                            <input type="text" value="{{$es->sachmtr_status}}" name="sachmtr_status" class="form-control" id="exampleInputEmail1">
                        </div>
                        <button type="submit" name="update_sachmtr" class="btn btn-info">Cap nhat thong tin muon/tra</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
</div>
@endsection
