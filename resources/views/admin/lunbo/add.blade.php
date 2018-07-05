@extends('layout.admins')

@section('title','轮播添加页面')



@section('content')
			
	
	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-pencil"></i>轮播管理</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/lunbo" method='post' class="" enctype='multipart/form-data'>
                        	<div class="mws-form-inline">
                            	<div class="mws-form-row" style="width:92%">
                                	<label class="mws-form-label">标题:</label>
                                	<div class="mws-form-item">
                                    	<input type="text" class="large" name="lunbo_title">
                                    </div>
                                </div>

                               
                           
                            	
                                <div class="mws-form-row">
                                    <label class="mws-form-label">图片1</label>
                                    <div class="mws-form-item" style="width:82.5%" readonly="readonly" placeholder="文件">
                                        <input class="large" name="lunbo_image1"  type="file" data-show-caption="true" placeholder="文件" >
                                	</div>

                            	</div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">图片2</label>
                                    <div class="mws-form-item" style="width:82.5%" readonly="readonly" placeholder="文件">
                                        <input class="large" name="lunbo_image2"  type="file" data-show-caption="true" placeholder="文件" >
                                    </div>

                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">图片3</label>
                                    <div class="mws-form-item" style="width:82.5%" readonly="readonly" placeholder="文件">
                                        <input class="large" name="lunbo_image3"  type="file" data-show-caption="true" placeholder="文件" >
                                    </div>

                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">图片4</label>
                                    <div class="mws-form-item" style="width:82.5%" readonly="readonly" placeholder="文件">
                                        <input class="large" name="lunbo_image4"  type="file" data-show-caption="true" placeholder="文件" >
                                    </div>

                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">图片5</label>
                                    <div class="mws-form-item" style="width:82.5%" readonly="readonly" placeholder="文件">
                                        <input class="large" name="lunbo_image5"  type="file" data-show-caption="true" placeholder="文件" >
                                    </div>

                                </div>

                            	 <div class="mws-form-row" style="width:92%" >
                                	<label class="mws-form-label">添加时间:</label>
                                	<div class="mws-form-item">
                                    	<input type="text" class="large" value="{{date('Y-m-d H:i:s',time())}}" name="lunbo_time">
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
						


						
   
                        </form>

                        <div class="mws-button-row">

    					{{csrf_field()}}
    					<input type="submit" class="btn btn-success" value="提交">
    				</div>   	
                    </div> 
                    
                </div>



@endsection