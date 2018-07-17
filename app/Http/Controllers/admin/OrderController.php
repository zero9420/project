<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use App\Models\Home\OrderDetail;
use App\Models\Admin\Goods;
use App\Models\Admin\GoodsSpec;

class OrderController extends Controller
{



     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
 *　　　　　　　　┏┓　　　┏┓+ +
 *　　　　　　　┏┛┻━━━┛┻┓ + +
 *　　　　　　　┃　　　　　　　┃ 　
 *　　　　　　　┃　　　━　　　┃ ++ + + +
 *　　　　　　 ████━████ ┃+
 *　　　　　　　┃　　　　　　　┃ +
 *　　　　　　　┃　　　┻　　　┃
 *　　　　　　　┃　　　　　　　┃ + +
 *　　　　　　　┗━┓　　　┏━┛
 *　　　　　　　　　┃　　　┃　　　　　　　　　　　
 *　　　　　　　　　┃　　　┃ + + + +
 *　　　　　　　　　┃　　　┃　　　　Code is far away from bug with the animal protecting　　　　　　　
 *　　　　　　　　　┃　　　┃ + 　　　　神兽保佑,代码无bug　　
 *　　　　　　　　　┃　　　┃
 *　　　　　　　　　┃　　　┃　　+　　　　　　　　　
 *　　　　　　　　　┃　 　　┗━━━┓ + +
 *　　　　　　　　　┃ 　　　　　　　┣┓
 *　　　　　　　　　┃ 　　　　　　　┏┛
 *　　　　　　　　　┗┓┓┏━┳┓┏┛ + + + +
 *　　　　　　　　　　┃┫┫　┃┫┫
 *　　　　　　　　　　┗┻┛　┗┻┛+ + + +
 */



    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $res =  Order::with('orderdetail')->where('order_id','like','%'.$request->input('order_id').'%')->paginate($request->input('num',10));


                
        $arr = ['num'=>$request->input('num'),'order_id'=>$request->input('order_id')];


        $data = OrderDetail::get();


        return view('/admin/order.index',[

            'title'=>'订单浏览管理',
            'res'=>$res,
            'arr'=>$arr,
            'data'=>$data
        ]);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        
        $res = OrderDetail::where('order_id',$id)->get();
       
       

        

        return view('/admin/order/particulars',[
            'title'=>'后台订单详情',

            'res'=>$res

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        
        $res = Order::where('order_id',$id)->first();
               

       return view('/admin/order.edit',[

            'title'=>'订单状态管理',
            'res'=>$res,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {       

        // dd($request->update_at);

            $res = $request->except('_token','_method');

            $data = Order::where('order_id',$id)->update($res);

            if ($data) {
                return redirect('admin/order')->with('success','修改成功');
            } else {
                return back()->with('error','修改失败');
            } 



        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
