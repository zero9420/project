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
                  width:77PX;
                  height: 90px;
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
                           付款金额
                        </th>


                         
                          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="CSS grade: activate to sort column ascending">
                           下单时间
                          </th>


                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                         <tr class="">
                            <td class=""> </td>

                            <td class=""> </td>

                            <td class=" "> </td>


                            <td class=" "></td>


                             <td class=" "></td>
                             <td class=" "></td>

                            
                       
         
                        </tr>
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