<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admincart;
use App\Models\Admingood;


class AdminCartController extends Controller
{
   public function cartadd(Request $request){
   	if ($request->isMethod('POST')) {
   		$data=$request->except('_token');
   		$res=Admincart::create($data);
   		if ($res) {
   			return $resd=['font'=>'','code'=>1];
   		}else{
   			return $resd=['font'=>'加入购物车失败','code'=>2];
   		}
   		return json_encode($resd);
   	}
   }

   public function cartinfo(Request $request){
   		$data=$request->all();
   		// $adminCart=new Admincart;
   		$res=Admincart::join('admingoods','admincarts.goods_id','=','admingoods.goods_id')
   		->get();
      $json=json_encode($res);
      $arr=json_decode($json,true);

      $price=0;
      foreach($arr as $k=>$v) {
          $price+=$v['add_price']*$v['buy_number'];
      }
   		return view('admin.admin.cartinfo',['res'=>$res,'price'=>$price]);

   }

      public function delete (Request $request)
    {
         $data=$request->all();
         $res=Admincart::where(['cart_id'=>$data['cart_id']])->delete($data);
         // dd($data);
         if ($res) {
           return json_encode(['fond'=>'','msg'=>1]);
         }else{

          return json_encode(['fond'=>'删除失败','msg'=>2]);

         }

    }

       // 获取商品总价
      public function getTotal(Request $request){
        $goods_id=$request->goods_id;
        // dd($goods_id);
        if ($this->checkLogin()) {
            $total=$this->getTotalDb($goods_id);
        }else{
            $total=$this->getTotalCookie($goods_id);
        }
        echo $total;
      }

}
