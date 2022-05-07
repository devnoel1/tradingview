@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Orders</h1>
@stop
<link   href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
body{border:0}
.dataTables_scroll{position:relative}
.dataTables_scrollHead{margin-bottom:40px;}
.dataTables_scrollFoot{position:absolute; top:60px}
</style>

@section('content')
   
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Orders</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered"  id="order_table">
                <thead>
                <tr>
                  <th>ACTION</th>
                  <th>ORDER ID</th>
                  <th>CLIENT ID</th>
                  <th>ACOUNT</th>
                    <th>EXCHANGE</th>
                    <th>SYMBOL</th>
                    <th>AMOUNT</th>
                    <th>P/L</th>
                  <th>TYPE</th>
                  <th>WALLET</th>
                  <th>SPREAD</th>
                  <th>OPEN PRICE</th>
                  <th>CURRENT PRICE</th>
                  <th>CLOSE PRICE</th>
                  <th>CREATED</th>
                  <th>CLOSE DATE</th>
                  <th>STATUS</th>
                   
                </tr>
                </thead>
              
              
              
                
               
                <tbody>
                 
                  





                @foreach ($orders as $order)

                        @can('admin')
                        <tr>
                           <td> <div class="btn-group">
                                <a type="button" class="btn btn-info" href="{{route('crm.order.show', ['order' => $order->id])}}"><i class="fas fa-eye"></i></a>
{{--                                <a type="button" class="btn btn-info" href="{{route('crm.order.edit', ['order' => $order->id])}}"><i class="fas fa-pen"></i></a>--}}
{{--                                <form action="{{ route('crm.order.destroy', ['order' => $order->id]) }}" method="POST">--}}
{{--                                    @method('DELETE')--}}
{{--                                    @csrf--}}
{{--                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>--}}
{{--                                </form>--}}
                            </div></td>
                           <td>{{$order->id}}</td>
                           <td>{{$order->wallet->user->id}}</td>
                           <td>{{$order->wallet->user->name}}</td>
                            <td>{{$order->symbol->exchange->name}}</td>
                        <td>{{$order->symbol->description}}</td>
                        <td>{{$order->amount}} <span>{{round(((1 - $order->symbol_price / $order->symbol->last_value) * 100),2)}}%</span></td>
                          <td></td>
                           <td>{{$order->type}} </td>
                         
                           <td>{{$order->wallet->name}}</td>
                           <td>{{$order->spread}}</td>
                           <td>{{$order->limit_price}}</td>
                           <td></td>
                           <td>{{$order->stop_price}}</td>
                           <td>{{$order->created_at}}</td>
                           <td>{{$order->updated_at}}</td>
                           <td>@if($order->status == 'waiting_sell')waiting @else {{$order->status}} @endif</td>
                     
                        @endcan
                        @can('employee')
                        @foreach($order->wallets as $wallet)
                        @foreach($wallet->orders as $order)
                        <tr>
                        <td>
                            @if($order->type == 'buy')
                                +
                            @else
                                -
                            @endif
                        </td>
                        <td>{{$order->wallet->user->name}}</td>
                        <td>{{$order->symbol->exchange->name}}</td>
                        <td>{{$order->symbol->description}}</td>
                        <td>{{$order->amount}} <span>{{round(((1 - $order->symbol_price / $order->symbol->last_value) * 100),2)}}%</span></td>
                        <td>{{$order->limit_price}}</td>
                        <td>{{$order->stop_price}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>@if($order->status == 'waiting_sell')waiting @else {{$order->status}} @endif</td>
                        <td>
                            <div class="btn-group">
                                <a type="button" class="btn btn-info" href="{{route('crm.order.show', ['order' => $order->id])}}"><i class="fas fa-eye"></i></a>
{{--                                <a type="button" class="btn btn-info" href="{{route('crm.order.edit', ['order' => $order->id])}}"><i class="fas fa-pen"></i></a>--}}
{{--                                <form action="{{ route('crm.order.destroy', ['order' => $order->id]) }}" method="POST">--}}
{{--                                    @method('DELETE')--}}
{{--                                    @csrf--}}
{{--                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>--}}
{{--                                </form>--}}
                            </div>
                        </td>
                        @endforeach
                        @endforeach
                        @endcan
                    </tr>
                @endforeach
                   <tfoot>
                <tr>
                  <th>ACTION</th>
                  <th>ORDER ID</th>
                  <th>CLIENT ID</th>
                  <th>ACOUNT</th>
                    <th>EXCHANGE</th>
                    <th>SYMBOL</th>
                    <th>AMOUNT</th>
                    <th>P/L</th>
                  <th>TYPE</th>
                  <th>WALLET</th>
                  <th>SPREAD</th>
                  <th>OPEN PRICE</th>
                  <th>CURRENT PRICE</th>
                  <th>CLOSE PRICE</th>
                  <th>CREATED</th>
                  <th>CLOSE DATE</th>
                  <th>STATUS</th>
                   
                </tr>
                </tfoot>
                 
                 
                    
               
                </tbody>
            </table>
        </div>
      
        

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script  src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script  type="text/javascript">
  
  $('#order_table tfoot th').each( function () {
      var title = $(this).text();
    if(title=="ACTION" || title=="OPEN PRICE" || title=="CURRENT PRICE" || title=="CLOSE PRICE" || title=="SPREAD" || title=="P/L" )
        {
        
          var st_drop='';
          
          
          $(this).html( st_drop );
        }
    else
       if(title=="CREATED" || title=="CLOSE DATE" )
        {
        
          var st_drop='<input type="date"/>';
          
          
          $(this).html( st_drop );
        }
    else
       if(title=="TYPE")
        {
        
          const status=["Call", "Put"];
          var st_drop="<select><option hidden>Search "+title+"</option>";
          for(var i=0; i<status.length;i++)
          {
            st_drop+="<option>"+status[i]+"</option>";
          }
          st_drop+="</select>";
          $(this).html( st_drop );
        }
     else
       if(title=="ACOUNT")
        {
        
          const status=["Acount 1", "Acount 2"];
          var st_drop="<select><option hidden>Search "+title+"</option>";
          for(var i=0; i<status.length;i++)
          {
            st_drop+="<option>"+status[i]+"</option>";
          }
          st_drop+="</select>";
          $(this).html( st_drop );
        }
    else
      if(title=="STATUS" )
        {
        
          const status=["cancelled", "close"];
          var st_drop="<select><option hidden>Search "+title+"</option>";
          for(var i=0; i<status.length;i++)
          {
            st_drop+="<option>"+status[i]+"</option>";
          }
          st_drop+="</select>";
          $(this).html( st_drop );
        }
    else
    
       $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    	
    
  });
  
  
  var table="";
    table =$("#order_table").DataTable({
  ordering: false,
       initComplete: function () {
           this.api().columns().every( function () {
                    var that = this;
              $( 'input[type=text]', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
             
             $( 'input[type=date]', this.footer() ).on( 'change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
             
              $( 'select', this.footer() ).on( 'change', function () {
               that
                                .search( this.value )
                                .draw();
              });
             
             
           });
       },
    "scrollX": true,
        "sScrollXInner": "100%"
  });</script>
@stop
