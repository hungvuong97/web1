
@extends('page_admin.layout1.index')
@section('content')
<div class="header">
		<div class="header-main">
		       <h1>BKCS Login Form</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
						@if(count($errors)>0)
				  		<div class="alert alert-danger">
				  			@foreach($errors->all() as $err)
				  			{{$err}}<br>
				  			@endforeach
				  		</div>
				  		@endif
				  		@if(session('thongbao'))
							<div class="alert alert-danger">
				  		{{session('thongbao')}}
				  			</div>
				  		@endif
					 <form action="dangnhap" method="POST">
					 	<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="text" name="tendn" placeholder="nhập tên đăng nhập" />
						<input type="password" name="password" placeholder="password" />
						<input type="submit" value="Login" name="dangnhap">
					</form>
				</div>
				</div>
			</div>
		</div>
</div>
<!--header end here-->
@endsection