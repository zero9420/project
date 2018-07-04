@extends('layout.admins')

@section('title',$title)

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-user">后台轮播管理
            </i>
            
        </span>
    </div>

    <style>
				.pagination li{
                    float: left;
                    height: 20px;
                    padding: 0 10px;
                    display: block;
                    font-size: 12px;
                    line-height: 20px;
                    text-align: center;
                    cursor: pointer;
                    outline: none;
                    background-color: #444444;


                  
                    text-decoration: none;
                    border-right: 1px solid #232323;
                    border-left: 1px solid #666666;
                    border-right: 1px solid rgba(0, 0, 0, 0.5);
                    border-left: 1px solid rgba(255, 255, 255, 0.15);
                    -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                    -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                }

                .pagination li a{
                      color: #fff;
                }


                .pagination .active{
                    background-color: #88a9eb;
                    color: #323232;
                    border: none;
                    background-image: none;
                    box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                }

                .pagination .disabled{
                        color: #666666;
                        cursor: default;
                }

                #paginate ul{
                    
                    margin:0px;
                }

                img{
                	width:77PX;
                	height: 90px;
                }
			</style>

    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

			<form action="/admin/lunbo" method='get'>
	            <div id="DataTables_Table_1_length" class="dataTables_length">
	                <label>
	                    显示
	                    <select name="num" size="1" aria-controls="DataTables_Table_1">
	                        <option value="5" @if($arr == 5)   selected="selected" @endif>
	                            5
	                        </option>
	                        <option value="25" @if($arr == 15)   selected="selected" @endif >
	                            15
	                        </option>
	                        <option value="50" @if($arr == 20)   selected="selected" @endif>
	                            20
	                        </option>
	                        <option value="100" @if($arr == 30)   selected="selected" @endif>
	                            30
	                        </option>
	                    </select>
	                    条数据
	                </label>
	            </div>
	            <div class="dataTables_filter" id="DataTables_Table_1_filter">
	                <label>
	                    关键字:

	                    <input type="text" name='lunbo_title' value="{{$res['lunbo_title']}}" aria-controls="DataTables_Table_1">
	                </label>

	                <button class='btn btn-info'>搜索</button>
	            </div>
            </form>





            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 20px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            轮播ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 20px;" aria-label="Browser: activate to sort column ascending">
                            轮播标题
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 300px;" aria-label="Platform(s): activate to sort column ascending">
                            轮播图片
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 20px;" aria-label="Engine version: activate to sort column ascending">
                            添加时间
                        </th>
                       
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 20px;" aria-label="CSS grade: activate to sort column ascending">
                           当前状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width:80px;" aria-label="CSS grade: activate to sort column ascending">
                           操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

					@foreach($res as $k => $v)

                    <tr class="@if($k % 2 == 1)  odd   @else even  @endif">
                        <td class="">
                            {{$v->lunbo_id}}
                        </td>
                        <td class=" ">
                            {{$v->lunbo_title}}
                        </td>
                        <td class="">
                           
        
            
                                
                                <img src="{{$v->lunbo_image1}}" alt="..." class="img-rounded" >
                                <img src="{{$v->lunbo_image2}}" alt="..." class="img-rounded" >
                                <img src="{{$v->lunbo_image3}}" alt="..." class="img-rounded" >
                                <img src="{{$v->lunbo_image4}}" alt="..." class="img-rounded" >
                                <img src="{{$v->lunbo_image5}}" alt="..." class="img-rounded" >

    
        
       					
                        </td>
                         <td class=" ">
                            {{$v->lunbo_time}}
                            
                        </td>
                       
                         <td class=" ">
                            @if($v->lunbo_status == 1)
                            启用
                            @else
                            禁用
                            @endif
                            
                        </td >
                           <td  >
           					 <a href="/admin/lunbo/{{$v->lunbo_id}}/edit" class="btn btn-info">修改</a>

					            <form action="/admin/lunbo/{{$v->lunbo_id}}" method="post" style="display: inline;">
					                
					                {{method_field('DELETE')}}


					                {{csrf_field()}}


					                <button class="btn btn-danger">删除</button>
					            </form>
					        </td>
                    </tr>
                 
                    @endforeach
               
                </tbody>
            </table>

            <div class="dataTables_info" id="DataTables_Table_1_info">
               
            </div>

			<style>
				
			</style>


           <div class="dataTables_paginate paging_full_numbers" id="paginate">

				


              
               {{ $res->links() }}
                
               
            </div>
        </div>
    </div>
</div>

@endsection