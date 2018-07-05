<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LunboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      


        $res = DB::table('lunbo')
                ->where('lunbo_title', 'like','%'.$request->input('lunbo_title').'%')
                ->paginate($request->input('num',5));
         $arr = $request['num'];       
       
        return view('/admin/lunbo/index',['res'=>$res,'title'=>'浏览轮播','arr'=>$arr]);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $res = DB::table('lunbo')->get();

       
        return view('/admin/lunbo/add',['title'=>'轮播添加','res'=>$res]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $file = $request->file();

        if (count($file) == 5) {
            
        

        $res = $request->except('_token');
        
        // dd($res);
        // dd($res['lunbo_image']->getClientOriginalExtension());
        
       

         if ($request->hasFile('lunbo_image1','lunbo_image2','lunbo_image3','lunbo_image4','lunbo_image5')) 
            {

                 //设置名字
                   $name1 =date('Y-m-d',time()).rand(1111,9999);
                   $name2 =date('Y-m-d',time()).rand(1111,9999);
                   $name3 =date('Y-m-d',time()).rand(1111,9999);
                   $name4 =date('Y-m-d',time()).rand(1111,9999);
                   $name5 =date('Y-m-d',time()).rand(1111,9999);
                   //获取后缀
                   $suffix = $request->file('lunbo_image1','lunbo_image2','lunbo_image3','lunbo_image4','lunbo_image5')->getClientOriginalExtension();
                   //移动文件
                   $request->file('lunbo_image1')->move('./image/',$name1.'.'.$suffix);
                   $request->file('lunbo_image2')->move('./image/',$name2.'.'.$suffix);
                   $request->file('lunbo_image3')->move('./image/',$name3.'.'.$suffix);
                   $request->file('lunbo_image4')->move('./image/',$name4.'.'.$suffix);
                   $request->file('lunbo_image5')->move('./image/',$name5.'.'.$suffix);
                 //需要再次随机一下 又不然随机的名字都是一样的
                    $res['lunbo_image1'] = '/image/'.$name1.'.'.$suffix;
                    $res['lunbo_image2'] = '/image/'.$name2.'.'.$suffix;
                    $res['lunbo_image3'] = '/image/'.$name3.'.'.$suffix;
                    $res['lunbo_image4'] = '/image/'.$name4.'.'.$suffix;
                    $res['lunbo_image5'] = '/image/'.$name5.'.'.$suffix;
           
            } 


          

        try{
            $data = DB::table('lunbo')->insert($res);

            if($data){
                return redirect('/admin/lunbo')->with('success','修改成功');
            }
        }catch(\Exception $e){

            return back()->with('error');

        }

       }   
       

       return redirect('/admin/lunbo')->with('error','上传失败'); 

        // dump($res);

        
           
    }

        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //echo
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = DB::table('lunbo')->where('lunbo_id', $id)->first();
       

       
        // dd($res);


        // dump($res);
        return view('/admin/lunbo/edit',['res'=>$res,'title'=>'轮播添加']);
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
       
       
      
        

        $res = $request->except('_token','_method');
        // dd($res);

        // dump($res);

            //判断, 允许单个修改



            if ($request->hasFile('lunbo_image1')) 
            {

                 //设置名字
                   $name1 =date('Y-m-d',time()).rand(1111,9999);
                 
                   //获取后缀
                   $suffix = $request->file('lunbo_image1')->getClientOriginalExtension();
                   //移动文件
                   $request->file('lunbo_image1')->move('./image/',$name1.'.'.$suffix);
                  
                 //赋值
                    $res['lunbo_image1'] = '/image/'.$name1.'.'.$suffix;
                   
           
            } 
            //判断, 允许单个修改

            if ($request->hasFile('lunbo_image2')) {

               $name2 =date('Y-m-d',time()).rand(1111,9999);

                //获取后缀
                   $suffix = $request->file('lunbo_image2')->getClientOriginalExtension();
                   //移动文件
                   $request->file('lunbo_image2')->move('./image/',$name2.'.'.$suffix);

                   //赋值
                    $res['lunbo_image2'] = '/image/'.$name2.'.'.$suffix;
            }

                //判断, 允许单个修改
             if ($request->hasFile('lunbo_image3')) {

               $name3 =date('Y-m-d',time()).rand(1111,9999);

                //获取后缀
                   $suffix = $request->file('lunbo_image3')->getClientOriginalExtension();
                   //移动文件
                   $request->file('lunbo_image3')->move('./image/',$name3.'.'.$suffix);

                   //赋值
                    $res['lunbo_image3'] = '/image/'.$name3.'.'.$suffix;
            }

            //判断, 允许单个修改
             if ($request->hasFile('lunbo_image4')) {

               $name4 =date('Y-m-d',time()).rand(1111,9999);

                //获取后缀
                   $suffix = $request->file('lunbo_image4')->getClientOriginalExtension();
                   //移动文件
                   $request->file('lunbo_image4')->move('./image/',$name4.'.'.$suffix);

                   //赋值
                    $res['lunbo_image4'] = '/image/'.$name4.'.'.$suffix;
            }


            //判断, 允许单个修改

             if ($request->hasFile('lunbo_image5')) {

               $name5=date('Y-m-d',time()).rand(1111,9999);

                //获取后缀
                   $suffix = $request->file('lunbo_image5')->getClientOriginalExtension();
                   //移动文件
                   $request->file('lunbo_image5')->move('./image/',$name5.'.'.$suffix);

                   //赋值
                    $res['lunbo_image5'] = '/image/'.$name5.'.'.$suffix;
            }
          

       
            $data = DB::table('lunbo')->where('lunbo_id',$id)->update($res);

            if($data){
                return view('/layout/jump')->with([
                        'message'=>'修改成功！',
                        'url' =>'/admin/lunbo',
                        'jumpTime'=>2
                    ]);
            }
       



         return view('/layout/jump')->with([
                        'message'=>'修改失败！',
                        'url' =>'/admin/lunbo/'.$id.'/edit',
                        'jumpTime'=>2
                    ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            

            $data =   DB::table('lunbo')->where('lunbo_id',$id)->delete();

            if($data){
                return redirect('/admin/lunbo')->with('success','删除成功');
            }
       
        
    }
}
