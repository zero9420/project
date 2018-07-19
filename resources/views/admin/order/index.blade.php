@extends('layout.admins')

@section('title',$title)

@section('content')
<script type="text/javascript" src="/homes/js/jquery.js"></script>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-user">后台订单管理
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

			<form action="/admin/order" method='get'>
	            <div id="DataTables_Table_1_length" class="dataTables_length">
	                <label>
	                    显示
	                     <select name="num" size="1" aria-controls="DataTables_Table_1">
                           <option value="10" @if($arr['num'] == 10)   selected="selected" @endif>
                                10
                            </option>
                            <option value="20" @if($arr['num'] == 20)   selected="selected" @endif>
                                20
                            </option>
                            <option value="30" @if($arr['num'] == 30)   selected="selected" @endif>
                                30
                            </option>
                        </select>
	                    条数据
	                </label>
	            </div>
	            <div class="dataTables_filter" id="DataTables_Table_1_filter">
	                <label>
	                    关键字:
                        

	                    <input type="text" name='order_id' value="{{$res['order_id']}}" aria-controls="DataTables_Table_1" placeholder="订单号查询">
	                </label>

	                <button class='btn btn-info' >订单搜索</button>
	            </div>
            </form>


          


            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                      
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 20px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" >
                            订单号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 20px;" aria-label="Browser: activate to sort column ascending">
                            付款金额
                        </th>
                        
                      
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 20px;" aria-label="CSS grade: activate to sort column ascending">
                           用户昵称
                        </th>
                          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 20px;" aria-label="CSS grade: activate to sort column ascending">
                           用户手机
                        </th>
                          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 20px;" aria-label="CSS grade: activate to sort column ascending">
                           用户地址
                        </th>
                          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 20px;" aria-label="CSS grade: activate to sort column ascending">
                           买家留言
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 20px;" aria-label="CSS grade: activate to sort column ascending">
                           退货申请
                        </th>
                        
                      
                          </th>
                          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 20px;" aria-label="CSS grade: activate to sort column ascending">
                           下单时间
                        </th>
                           <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 20px;" aria-label="CSS grade: activate to sort column ascending">
                           订单状态
                        </th>
                       
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width:80px;" aria-label="CSS grade: activate to sort column ascending">
                           操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
          
					@foreach($res as $k => $v)
            
           
           
                    
                      <tr>
                       
 
                        <td class="">{{$v->order_id}}</td>

                        <td class="">{{$v->order_payment}}</td>
               
                         
                        <td class=" ">{{$v->order_name}}</td>


                         <td class=" ">{{$v->order_phone}}</td>

                         
                         <td class=" ">{{$v->order_addr}}</td>

                         <td class=" ">{{$v->order_umsg}}</td>

                         
                        
                          <td class=" ">
                         
                          @if($v->order_return_goods == 0 )
                          无退款处理
                          @elseif($v->order_return_goods == 1 )
                          申请退款处理
                          @else($v->order_return_goods == 2 )
                          退款完成
                          @endif
                        
                        </td>
                        
                          <td class=" ">{{$v->order_create_time}}</td>
                        <td class="fahuo" onclick="to({{$v->order_id}})">
                            
                            @if($v->order_status == 0)

                            <input type="button" class="btn btn-default " value="未发货">
                             
                            @endif

                             @if($v->order_status == 1)
                            
                            <input type="button" class="btn btn-primary " value="已经发货">
                             
                            @endif

                            @if($v->order_status == 2)

                            <input type="button" class="btn btn-success " value="交易完成">
                             
                            @endif

                        </td>
                        
                       
					             
                    
                     
                        <td>
                             <a href="/admin/order/{{$v->order_id}}/edit" class="btn btn-warning">订单修改</a>
                             <a href="/admin/order/{{$v->order_id}}" class="btn btn-info">订单详情</a>

          
                           
                      </td>  
                    
                   
                     
                    </tr>  
               
                </tbody>
                    
                  @endforeach
            </table>
                
            <div class="dataTables_info" id="DataTables_Table_1_info">
              
            </div>

			<style>
				
			</style>


           <div class="dataTables_paginate paging_full_numbers" id="paginate">

				
              {{$res->links()}}

               
            </div>
        </div>
    </div>
</div>
                     <script>
                      function to(order_id){
                         var order_id = order_id;
                            
                          $.get('/admin/ajaxorder',{order_id:order_id},function(data){
                              
                                if (data) {

                                  window.location.reload();
                                }

                          })
                       
                     }
                
                    </script>
                 

@endsection

