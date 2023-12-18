@extends('adminform')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sachs the muon sach 
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="1">Con Han</option>
            <option value="2">Het han</option>

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
              <th>Ho Va Ten</th>
              <th>Email</th>
              <th>Gioi Tinh</th>
              <th>Password</th>
              <th>Hinh anh</th>
              <th>SDT</th>
              <th>Ma The</th>
              <th>Ngay dang ky</th>
              <th>Ngay het han</th>

              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_account as $key => $acc)
            <tr>    
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$acc->acc_name}}</td>
              <td>{{$acc->acc_email}}</td>
              <td>{{$acc->acc_sex}}</td>
              <td>{{$acc->acc_password}}</td>
              <td><img src="upload/nguoidoc/{{$acc->acc_image}}" height="100px" width="100px"></td>
              <td>{{$acc->acc_phone}}</td>
              <td>{{$acc->acc_codecard}}</td>
              <td>{{$acc->acc_ngaydangky}}</td>
              <td>{{$acc->acc_ngayhethan}}</td>

              
              
            
              <td>
                <a href="{{URL::to('/edit-account/'.$acc->acc_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <a onclick="return confirm('Ban co chac muon xoa ko???')" href="{{URL::to('/delete-account/'.$acc->acc_id)}}" class="active" ui-toggle-class="">
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
