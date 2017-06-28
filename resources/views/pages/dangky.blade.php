  @extends('layout.index')
  @section('title')
  Đăng ký
  @endsection
  @section('content')
  <!-- Page Content -->
  <div class="container">

  	<!-- slider -->
  	<div class="row carousel-holder">
  		<div class="col-md-2">
  		</div>
  		<div class="col-md-8">
  			<div class="panel panel-default">
  				<div class="panel-heading">Đăng ký tài khoản</div>
  				<div class="panel-body">
  					<form method="post" action="dangky">
  						@if(count($errors)>0)
  						<div class="alert alert-danger">
  							<strong>Whoops!</strong>There were some problems with your input! <br><br>
  							<ul>
  								@foreach($errors->all() as $error)
  								<li>{{$error}}</li>
  								@endforeach
  							</ul> 
  						</div>
  						@endif

  						@if(session('thongbao'))
  						<div class="alert alert-success">
  							<strong>{{session('thongbao')}}</strong>
  						</div>
  						@endif
  						<input type="hidden" name="_token" value="{{csrf_token()}}">
  						<div>
  							<label>Họ tên</label>
  							<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1">
  						</div>
  						<br>
  						<div>
  							<label>Email</label>
  							<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
  							>
  						</div>
  						<br>	
  						<div>
  							
  							<label>Nhập mật khẩu</label>
  							<input type="password" class="form-control" name="password" aria-describedby="basic-addon1">
  						</div>
  						<br>
  						<div>
  							<label>Nhập lại mật khẩu</label>
  							<input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1">
  						</div>
  						<br>
  						<button type="submit" class="btn btn-default">Đăng ký
  						</button>

  					</form>
  				</div>
  			</div>
  		</div>
  		<div class="col-md-2">
  		</div>
  	</div>
  	<!-- end slide -->
  </div>
  <!-- end Page Content -->
  @endsection