<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
	<title>Plus Example</title>
</head>
<body>
	div.container>(div.row>div.col-md-4*3)*4

	<div class="container">
		<h1>Plus Example</h1>
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif


		<form action="plusAction" method="post">
			<div class="row">
				<div class="col-md-1">a</div>
				<div class="col-md-4"><input type="text" name="a" value="{{$a}}" /></div>			
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-4">+</div>				
			</div>
			<div class="row">
				<div class="col-md-1">b</div>
				<div class="col-md-4"><input type="text" name="b" value="{{$b}} " /></div>				
			</div>
			<div class="row">
				<div class="col-md-1">Result: </div>
				<div class="col-md-4"> {{$result}} </div>				
			</div>
			<div class="row">
				<div class="col-md-1"> </div>
				<div class="col-md-4"> <button type="submit">Submit</button></div>			
			</div>
		</form>
	</div> 
</body>
</html>