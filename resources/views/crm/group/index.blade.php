@extends('layouts.main')
@section('headerfile')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<style>
body{border:0}
.dataTables_scroll{position:relative}
.dataTables_scrollHead{margin-bottom:40px;}
.dataTables_scrollFoot{position:absolute; top:41px}
</style>
@endsection

@section('content')

<div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-users icon-gradient bg-tempting-azure">
                                        </i>
                                    </div>
                                    <div>CRM-Affiliates
                                        <div class="page-title-subheading">
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                                        <i class="fa fa-star"></i>
                                    </button>
                                    <div class="d-inline-block dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-business-time fa-w-20"></i>
                                            </span>
                                            Buttons
                                        </button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-inbox"></i>
                                                        <span>
                                                            Inbox
                                                        </span>
                                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-book"></i>
                                                        <span>
                                                            Book
                                                        </span>
                                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-picture"></i>
                                                        <span>
                                                            Picture
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a disabled href="javascript:void(0);" class="nav-link disabled">
                                                        <i class="nav-link-icon lnr-file-empty"></i>
                                                        <span>
                                                            File Disabled
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>    </div>
                        </div>

                       
                       
                        <div class="main-card mb-3 card">
                     
                                    <div class="card-body"><h5 class="card-title">Affiliates</h5>
                                      
                                      
                                        <table id="user_table" class="mb-0 table table-responsive ">
                                            <thead>
                                              <tr>
                                                  <th>Action</th>
                                                  <th>Select</th>
                                                  <th>Affiliate Name</th>
                                                  <th>User Name</th>
                                                  <th>Password</th>
                                                  <th>Created at</th>
                                                  <th>Last Login </th>
                                                  <th>IP address</th>
                                              </tr>
                                            </thead>
                                           
                                          <tfoot>
                                            <tr>
                                                 <th>Action</th>
                                                  <th>Select</th>
                                                  <th>Affiliate Name</th>
                                                  <th>User Name</th>
                                                  <th>Password</th>
                                                  <th>Created at</th>
                                                  <th>Last Login </th>
                                                  <th>IP address</th>
                                            </tr>
                                          </tfoot>
                                           <tbody>
                                                    
                                             @foreach($groups as $group)
                                             <tr>
                                              <td>
                                                   <div class="btn-group">
                                                        
                                                            <a type="button" class="btn btn-info" href=""><i class="fas fa-pen"></i></a>
                                                        <a type="button" class="btn btn-danger del" href=""><i class="fas fa-trash"></i></a>
                                                        
                                                        </div>
                                                </td>
                                                 <td align="center"><input type="checkbox" /></td>
                                              <td>{{$group->name}}</td>
                                              <td>{{$group->username}}</td>
                                              <td>{{$group->password}}</td>
                                              <td>{{$group->created_at}}</td>
                                              <td></td>
                                               <td>{{$group->ip_address}}</td>
                                             </tr>
                                             @endforeach
                                            
                                            
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                
                                  
                        </div>
                        
                       

                       


                    </div>
@endsection

@section('footerfile')
<script type="text/javascript">
var table="";
   
  $( 'input[type=checkbox]').on( 'change', function () {
            if($('input[type=checkbox]').is(":checked"))   
            $("#actionbar").show();
       		 else
            $("#actionbar").hide();

                        
                    } );
  


$(document).ready( function () {
  
  $(".del").on("click", function (e) {
    if (!confirm("Are you Sure want to delete!")) {
        e.preventDefault();
    }
});
  
  $("#blockacc").on("click", function (e) {
    if (!confirm("Are you Sure want to Block Trader Account!")) {
        e.preventDefault();
    }
});
  
   $("#unblockacc").on("click", function (e) {
    if (!confirm("Are you Sure want to Unblock Trader Account!")) {
        e.preventDefault();
    }
});
  
  
   $("#actionbar").hide();
   

$('#user_table tfoot th').each( function () {
        var title = $(this).text();
  
   	if(title=="Action" )
        {
        
          var st_drop='<a style="color:white;" href="{{route('crm.group.create')}}" class=" col-md-12 btn-wide mb-2 mr-2 btn-icon btn btn-success"><i class="fa fa-plus btn-icon-wrapper" style="color:white;"> </i></a>';
          
          
          $(this).html( st_drop );
        }
  	else
      
      if(title=="Role")
        {
          const status=["Retension", "Conversion", "Credit", "Insrurance"];
          var st_drop="<select><option hidden>Search "+title+"</option>";
          for(var i=0; i<status.length;i++)
          {
            st_drop+="<option>"+status[i]+"</option>";
          }
          st_drop+="</select>";
          $(this).html( st_drop );
        }
  		else
   if(title=="Select")
        {
         
          var st_drop='<center><input id="check" type="checkbox" /></center>';
          
          $(this).html( st_drop );
        }else
  		
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

 var st=0;
    table =$('#user_table').DataTable({
			ordering: false,
      
      
            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;
                  
                  $( 'input[type=text]', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );

                    $( 'input[type=checkbox]', this.footer() ).on( 'change', function () {
                      if(st==0)
                      {
                        st=1
                         table.$('input:checkbox').prop('checked',true);
                         $("#actionbar").show();
                        
                      }
                      else{
                         st=0
                         table.$('input:checkbox').prop('checked',false);
                         $("#actionbar").hide();
                      }
                        
                    } );
                  
                  $( 'select', this.footer() ).on( 'change', function () {
                       
                       if ( that.search() !== this.value ) {
                        if(this.value=="High")
                        {
                          that
                         .order( ['asc' ])
                         .draw();
                        }
                         else
                           if(this.value=="Low")
                        {
                          that
                         .order( ['desc' ] )
                         .draw();
                        }
                        else{
                            that
                                .search( this.value )
                                .draw();
                        }
                        }
                    
                    	
                    } );
                } );
            },
        "scrollX": true,
        "sScrollXInner": "100%"

        // "scrollX": false
    });
});

</script>

@endsection