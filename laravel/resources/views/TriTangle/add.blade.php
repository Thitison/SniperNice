@extends('template')
@section('content')
 
 <br>
 <center><img src = "{{URL::asset('Image/pt2.png')}}"></center><br>
 
<form action="add" method="post">
    <center>
       High <input type="text" name = "a" placeholder="High">
       Base <input type="text" name = "b" placeholder="Base">
    <input type="submit" value="calculate">
    </center><br>
</form>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<center>ผลจากการคำนวณ = {{ $result }}</center>
<center><a href="./"><input type="submit" value="Show"></a></center>

@endsection