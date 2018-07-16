@extends('layout.admins')

@section('title',$title)

@section('content')
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
                  width:100PX;
                  height: 100px;
                }
      </style>

    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

    
           





            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                     
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" >
                            商品名称
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="Browser: activate to sort column ascending">
                            商品图片
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="Platform: activate to sort column ascending">
                            商品单价
                        </th>
                      
                      
                        
                          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="CSS grade: activate to sort column ascending">
                           购买数量
                        </th>
                        
                        
                          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 160px;" aria-label="CSS grade: activate to sort column ascending">
                           商品小计
                        </th>


                         
                          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="CSS grade: activate to sort column ascending">
                           商品颜色
                          </th>


                          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="CSS grade: activate to sort column ascending">
                           商品尺码
                          </th>

                          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="CSS grade: activate to sort column ascending">
                           退款处理
                          </th>


                    </tr>
                </thead>
    
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                        @foreach($res  as $k=>$v)
                         <tr class="">
                            <td class=""> {{$v->goods_name}}</td>

                           <td class="">
                            <img src="{{$v->goods_pic}}" alt="..." class="img-rounded" >
                           </td>

                            <td class=" "> {{$v->goods_price}}</td>


                            <td class=" ">{{$v->num}}</td>


                             <td class=" ">{{$v->goods_price * $v->num}}</td>
                             <td class=" ">{{$v->goods_color}}</td>
                             <td class=" ">{{$v->goods_size}}</td>
                            <td class=" ">
                              @if($v->order_return_goods == 0 )
                              无退款处理
                              @elseif($v->order_return_goods == 1 )
                              申请退款处理
                              @else($v->order_return_goods == 2)
                              退款完成
                              @endif

                                  @if($v->order_return_goods == 1)
                            <div display='block'>
                             
                                 <a href="/admin/orderstatus?id={{$v->id}}" class="btn btn-danger">同意退款</a>

                               </div>
                            
                              @endif

                              @if($v->order_return_goods == 2)
                              <div display='block'>
                             
                               <button class="btn btn-success " >退款成功</button>
                              @endif
                            </div>
                            
                             
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

        


              
               
                
               
            </div>
        </div>
    </div>
</div>

@endsection