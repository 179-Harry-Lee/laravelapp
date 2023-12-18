@extends('adminform')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sach thong tin muon
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
              <th>Ma muon</th>
              <th>Nguoi Doc</th>
              <th>Ten sach</th>
              <th>Ten tac gia</th>
              <th>Dau muc sach</th>
              <th>Nha xuat ban</th>
              <th>Chu thich</th>
              <th>Ngay muon</th>
              <th>Ngay tra</th>
              <th>trang thai</th>

              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_sachmtr as $key => $sach)
            <tr>    
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$sach->sachmtr_codemuon}}</td>
              <td>{{$sach->acc_name}}</td>
              <td>{{$sach->book_name}}</td>
              <td>{{$sach->tacgia_name}}</td>
              <td>{{$sach->category_name}}</td>
              <td>{{$sach->nxb_name}}</td>
              <td>{{$sach->sachmtr_desc}}</td>
              <td>{{$sach->sachmtr_ngaymuon}}</td>
              <td>{{$sach->sachmtr_ngaytra}}</td>
              <td>{{$sach->sachmtr_status}}</td>
              
            
              <td>
                <a href="{{URL::to('/edit-sachmtr/'.$sach->sachmtr_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <a onclick="return confirm('Ban co chac muon xoa  ko???')" href="{{URL::to('/delete-sachmtr/'.$sach->sachmtr_id)}}" class="active" ui-toggle-class="">
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
