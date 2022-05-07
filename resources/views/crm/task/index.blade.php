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
.dataTables_scrollFoot{position:absolute; top:42px}
</style>
@endsection

@section('content')
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-display2 icon-gradient bg-tempting-azure">
                                        </i>
                                    </div>
                                    <div>CRM-Tasks
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

                       
                       
                        <div class="main-card mb-3 card table-responsive">
                     
                                    <div class="card-body"><h5 class="card-title">Tasks</h5>

                                      
                                       
                                     
                                        <table id="user_table" class="mb-0 table table-responsive ">
                                            <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>User Name</th>
                                                <th>Created User</th>
                                                <th>Owner User</th>
                                                <th>Due Date</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Type</th>
                                                <th>Created at</th>
                                                
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($tasks as $task)
                                            <tr>
                                                <td>
                                                <div class="btn-group">
                                                        <a type="button" class="btn btn-info"  target="_blank" href="#">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a type="button" class="btn btn-info" href="{{route('crm.task.edit',['task' => $task->id])}}"><i class="fas fa-pen"></i></a>
                                                        <a type="button" class="btn btn-danger del" href="{{route('crm.task.destroy',['task' => $task->id])}}"><i class="fas fa-trash"></i></a>
                                                        
                                                </td>
                                                <td><b>{{$task->user->name}}</b><br/>
                                                    {{$task->user->email}}
                                                </td>
                                                <td>{{$task->ownuser->name}}</td>
                                                <td>{{$task->due_date}}</td>
                                                <td>
                                                    {{$task->description}}
                                                </td>
                                                <td>
                                                    {{$task->status}}
                                                </td>
                                                <td>
                                                    {{$task->type}}
                                                </td>
                                                <td>
                                                {{$task->created_at}}
                                                <td>
                                            </tr>
                                            @endforeach
                                         
                                            
                                            
                                            </tbody>
                                          <tfoot>
                                            <tr>
                                                <th>Action</th>
                                                <th>User Name</th>
                                                <th>Created User</th>
                                                <th>Owner User</th>
                                                <th>Due Date</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Type</th>
                                                <th>Created at</th>
                                            
                                                
                                            </tr>
                                          </tfoot>
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
        
          var st_drop='<a style="color:white;" href="{{route('crm.account.create')}}" class=" col-md-12 btn-wide mb-2 mr-2 btn-icon btn btn-success"><i class="fa fa-plus btn-icon-wrapper" style="color:white;"> </i></a>';
          
          
          $(this).html( st_drop );
        }
  		else
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