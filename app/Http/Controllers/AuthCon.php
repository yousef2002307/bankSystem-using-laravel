<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAcc;
use Illuminate\Support\Facades\DB;
class AuthCon extends Controller
{
    public function userlogin(Request $request){
        $email = $request->email;
        $pass = $request->password;
        $useracc = UserAcc::where("email",$email)->where("password",$pass)->get();
        $userid =  $useracc[0]->id;
        //see if record excist with such info and upon that create a seesion
        if(count($useracc) > 0){
            session(['user_id' => $userid]);
           
        }
        return redirect('/');
    }
    //////////////////show user account summmary///////////////
    public function accsum(){
     //  return url("/") === url()->current();
     $bal = $this->getbalance();
       $user_id =  session('user_id');
        
       $val1 = UserAcc::find(1);
      
       $val2 =  $val1->users;
       return view('acc',compact("val1","val2",'bal'));
    }
    public function notify(){
        $bal = $this->getbalance();
         
    $notify = DB::select('SELECT * FROM `notice` WHERE userId = ? ORDER BY id DESC ', [session('user_id')]);
   
    
        return view("notify",compact("notify",'bal'));
    }
    public function feedback(){
         
      
       
        
            return view("feedback");
        }
     public function feedbackRes(Request $request){
        $validated = $request->validate([
            'msg' => 'required|max:788|unique:App\Models\UserAcc,email'
            
        ]);
        $msg =  $request->msg;
        $user_id = session("user_id");
        DB::table('feedback')->insert([
            'message' => $msg,
            'userId' => $user_id
        ]);
        return  redirect()->back();
    }
    public function accsta(Request $request){
        $bal = $this->getbalance();
       $trans = DB::select('SELECT * FROM `transaction` WHERE userId = ? ORDER BY transactionId DESC ',[session('user_id')]);
       
        return view("accsta",compact("trans",'bal'));
    }
    public function fund(Request $request){
       $bal = $this->getbalance();
        $trans = DB::table('transaction')
            ->select('debit', 'other','date','action')
            ->where('action', '=', 'transfer')
            ->where('userId', '=', session('user_id'))
            ->orderByRaw('transactionId DESC')
            ->get();
           
        return view("fund",compact("trans",'bal'));
     }
     public function ajax(Request $request){
        $users = DB::table('otheraccounts')
            ->select('accountNo','holderName','bankName')
            ->where('accountNo', '=', $request->name)
            ->get();
            $count = count( $users);
        $TheUser = UserAcc::find(session('user_id'));

       
       $bool = $count >= 1 ? "ok" : "no";
       if($bool === "no")   return response()->json(["bool" => $bool]);
     
       
       return response()->json(["bool" => $bool,"balance" => $TheUser->balance,'accountNo' => $users[0]->accountNo,'holderName'=>$users[0]->holderName,'bankName'=> $users[0]->bankName]);
     }
     public function ajax2(Request $request){
        $balance = DB::table('useraccounts')
            ->select('balance')
            ->where("id",session('user_id'))
            ->get();
         $balval = intval($balance[0]->balance);
        DB::table('useraccounts')
              ->where('id', session('user_id'))
             ->update(['balance' =>   $balval - intval($request->amount)]);
       DB::insert("INSERT INTO `transaction` ( `action`, `debit`, `other`, `userId`) VALUES (?,?,?,?)", ['transfer', $request->amount, $request->otherNo, session('user_id')]);
       $request->session()->flash('message','transaction has been made');
      return  redirect()->back();
     }
     public function getbalance(){
        $users = DB::table('useraccounts')
        ->select('balance')
        ->where('id', '=', session('user_id'))
        
        ->get();
        return intval($users[0]->balance);
     }
}
