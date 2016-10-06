<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Calculate;
class MulControllers extends Controller {
	public function index(){
		$calculate = Calculate::all();
		return view('TriTangle.index',compact('calculate'));
	}
	public function add(){
		$result = 0;
		return view('TriTangle.add',compact('result'));
	}

	public function Mul(){
			// Rules 
		$rule = array(
			'a' => array('required','min:0','max:123','integer'),
			'b' => array('required','min:0','max:123','integer')
			);
		$msg = array(
			'a.required' => 'กรุณาใส่ตัวเลขครับ',
			'b.required' => 'กรุณาใส่ตัวเลขครับ',
			'a.min' => ' min : 0',
			'a.min' => ' min : 0',
			'a.max' => ' max : 123',
			'b.max' => ' max : 123',
			'a.integer' => ' must input integer ',
			'b.integer' => ' must input integer ',
			);
		
		$validator = validator::make(Input::all(),$rule,$msg);
		if($validator->passes()){
			$a = Input::get('a');
			$b = Input::get('b');
			$result = $a * $b * 0.5 ;
			$dbsave = new Calculate;
			$dbsave->high = $a;
			$dbsave->base = $b;
			$dbsave->result = $result;
			$dbsave->save();
			return view('TriTangle.add',compact('result'));
		}else{
			return Redirect::to('/add')->withErrors($validator->messages());
		}
	}
}
?>

