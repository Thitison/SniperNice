<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
 
class PlusController extends Controller
{
    public function index() {
        $a = 0;
        $b = 0;
    	$result = 0;
    	return view('plus',compact('result','a','b'));
    }
    public function plus() {
        $rules = array(
            'a' => array('required'),        
            'b' => array('required', 'min:3')
        );
        $message = array('a.required' => 'input a',
                            'b.required' => 'input b',
                            'b.min' => 'min 3',
        );
        $validator = Validator::make(Input::all(), $rules, $message);
        if ( $validator->passes()){
            $a = Input::get('a');
            $b = Input::get('b');
            $result = $a+$b;            
            return view('plus',compact('result','a','b'));
        }
        else
            return Redirect::to('plus')->withErrors($validator->messages());
    }
}