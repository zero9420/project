@extends('layout.admins')

@section('title','轮播添加页面')


        <style>
            
            input::-webkit-input-placeholder { /* WebKit browsers */ 

            color: green; 

            } 

            
           img{

            height: 100px;
            widows: 100px;
           }
           
         </style>
@section('content')
            
           
    
    <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-pencil"></i>轮播管理</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admin/lunbo/{{$res->lunbo_id}}" method='post' class="" enctype='multipart/form-data'>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">标题:</label>
                                    <div class="mws-form-item" style="width:30%">
                                        <input type="text" class="large" value="{{$res->lunbo_title}}" name="lunbo_title">
                                    </div>
                                </div>
                            
                               
                            
                                
                                <div class="mws-form-row  " style="display: inline;" >
                                    <label class="mws-form-label">图片1</label>
                                    <div class="mws-form-item" pull-left style="width:30%" readonly="readonly" placeholder="文件">
                                         <img src="{{$res->lunbo_image1}}" alt="..." class="img-thumbnail">
                                        <input class="large" name="lunbo_image1" value="{{$res->lunbo_image1}}" type="file" placeholder="请输入用户名" data-show-caption="true"  >
                                    </div>

                                </div>
                                <div class="mws-form-row" >
                                    <label class="mws-form-label">图片2</label>
                                    <div class="mws-form-item " style="width:30% " readonly="readonly"  placeholder="文件 " >
                                         <img src="{{$res->lunbo_image2}}" alt="..." class="img-thumbnail">
                                        <input class="large" name="lunbo_image2"  type="file" data-show-caption="true" style="" placeholder="修改placeholder样式" >
                                    </div>

                                </div>
                               <div class="mws-form-row">
                                    <label class="mws-form-label">图片3</label>
                                    <div class="mws-form-item" style="width:30%" readonly="readonly" placeholder="文件">
                                         <img src="{{$res->lunbo_image3}}" alt="..." class="img-thumbnail">
                                        <input class="large" name="lunbo_image3"  value="{{$res->lunbo_image3}}" type="file" data-show-caption="true" placeholder="文件" >
                                </div>
                              </div>  
                                <div class="mws-form-row">
                                    <label class="mws-form-label">图片4</label>
                                    <div class="mws-form-item" style="width:30%" readonly="readonly" placeholder="文件">
                                         <img src="{{$res->lunbo_image4}}" alt="..." class="img-thumbnail">
                                        <input class="large" name="lunbo_image4"  type="file" data-show-caption="true" placeholder="文件" >
                                </div>
                              </div>

                               <div class="mws-form-row">
                                    <label class="mws-form-label">图片5</label>
                                    <div class="mws-form-item" style="width:30%" readonly="readonly" placeholder="文件">
                                         <img src="{{$res->lunbo_image5}}" alt="..." class="img-thumbnail">
                                        <input class="large" name="lunbo_image5"  type="file" data-show-caption="true" placeholder="文件" >
                                </div>
                              </div>    

                                 <div class="mws-form-row">
                                    <label class="mws-form-label">修改时间:</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="large" value=" {{date('Y-m-d H:i:s',time())}} " disabled name="lunbo_time">
                                    </div>
                                </div>

                                <div class="mws-form-row">
                                    <label class="mws-form-label">状态</label>
                                    <div class="mws-form-item clearfix">
                                    <ul class="mws-form-list inline">
                                      
                                        <li><input type="radio" name='lunbo_status' value=' 1 ' checked=""> <label>启动</label></li>
                                     
                                        <li><input type="radio" name='lunbo_status' value='0' > <label>禁止</label></li>
                                        
                                    </ul>
                                    </div>
                                </div>


                        <div class="mws-form-row">

                                {{csrf_field()}}

                                {{method_field('PUT')}}
                             <input type="submit" class="btn btn-success" value="修改fds">
                        </div>
   
                        </form>

                        
                    </div> 
                    
                </div>



@endsection