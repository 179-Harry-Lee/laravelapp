@extends('adminform')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Sach
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Hai huoc</option>
            <option value="1">Phieu luu</option>
            <option value="2">Tam ly tinh cam</option>
            <option value="3">Kinh di</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
                  <?php
		                $message = Session::get('message');
		                if ($message) {
			            echo $message;
			            Session::put('message',null);
		                }
	                ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Ten sach</th>
              <th>Ten tac gia</th>
              <th>Hinh anh san pham</th>
              <th>Mo ta sach</th>
              <th>Dau muc sach</th>
              <th>Nha xuat ban</th>
              <th>Hien thi</th>

              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_book as $key => $book)
            <tr>    
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$book->book_name}}</td>
              <td>{{$book->tacgia_name}}</td>
              <td><img src="upload/book/{{$book->book_image}}" height="100" width="100"></td>
              <td>{{$book->book_desc}}</td>
              <td>{{$book->category_name}}</td>
              <td>{{$book->nxb_name}}</td>
            
              <td><span class="text-ellipsis">
                <?php
              if($book->book_status==0){
                ?>
                <a href="{{URL::to('/unactive-book/'.$book->book_id)}}"><span class="icon-eye-close"></span></a> 
                <?php
              }else {
                ?>
                  <a href="{{URL::to('/active-book/'.$book->book_id)}}"><span class="fa fa-eye"></span></a>
                <?php  
              }
                ?>
              </span>
              </td>
            
              <td>
                <a href="{{URL::to('/edit-book/'.$book->book_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <a onclick="return confirm('Ban cos chac muon xoa  ko???')" href="{{URL::to('/delete-book/'.$book->book_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i>
                </a>
              </td>
            </tr>
            @endforeach

            
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection
