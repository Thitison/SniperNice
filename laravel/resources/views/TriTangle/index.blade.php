@extends('template')
@section('content')
<h1>ประวัติการคำนวณพื้นที่สามเหลี่ยม</h1>
@foreach($calculate as $e)
<div class="container">
  <div class="well well-sm">รายการที่ {{ $e->id}}  ความสูง  {{ $e->high}}  ฐาน {{ $e->base}}  พื้นที่ที่คำนวณได้ {{ $e->result}}</br></div>
</div>
@endforeach 
    
    <a href= "add"><button type="button" class="btn btn-primary">ย้อนกลับ</button></a></br>
@endsection