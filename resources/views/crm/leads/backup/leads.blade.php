@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Leads</h1>
@stop
<link   href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
body{border:0}
.dataTables_scroll{position:relative}
.dataTables_scrollHead{margin-bottom:40px;}
.dataTables_scrollFoot{position:absolute; top:40px}
</style>

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Leads</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
           <div class="row col-md-12" id="actionbar">
            <div class="col-md-2">
              
            </div>
            <div class="col-md-8">
              <label>Selected</label>
             
              <Select>
                
                <option>Block account </option>
                <option>unblock account </option>
                
               
              </Select>
              <label>Change Desk</label>
              <select>
                <option hidden="">Search Desk</option>
                <option>Not assigned(standard)</option>
                <option>Convertion</option>
                <option>rentention</option>
              </select>
               <?php
             $g=$user;
              $g=str_replace("[","",$g);
              $g=str_replace("]","",$g);
               $g=str_replace("\"","",$g);
             
              $gr=explode(",",$g);
              
              ?>
              <label>Change Agent</label>
              <select>
                <option hidden="">Search Agent</option>
               @foreach($gr as $grp)
                 <option value="{{$grp}}">{{$grp}}</option>
                @endforeach
              </select>
               
             
              <label>Change Affiliate</label>
              <Select>
                <option>Block account </option>
                <option>unblock account </option>
                <option>Change Desk</option>
                <option>Change Agent</option>
                <option>Change Affiliate</option>
                <option>Change Campaign</option>
               
              </Select>
               <?php
             $g=$group;
              $g=str_replace("[","",$g);
              $g=str_replace("]","",$g);
               $g=str_replace("\"","",$g);
             
              $gr=explode(",",$g);
              
              ?>
              <label>Change Campaign</label>
              <select>
                <option hidden="">Search Campaign</option>
               @foreach($gr as $grp)
                 <option value="{{$grp}}">{{$grp}}</option>
                @endforeach
              </select>
              <input type="submit" value="save"/>
              <input type="reset" value="cancel"/>
              
            </div>
            <div class="col-md-2">
              
            </div>
          </div>
            <table class="table table-bordered" id="lead_table">
                <thead>
                <tr>
                  <th>Action</th>
                       <th>Select</th>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                       <th>Verification</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Affiliate</th>
                      	<th>Campaign</th>
                      	<th>Agent</th>
                        <th>Desk</th>
                        <th>Country</th>
                        <th>Balance</th>
                  		<th>Total Deposit</th>
                      	
                        <th>Total Withdrawal</th>
                      	<th>Total Credit / Insurance</th>
                        <th>Pnl</th>
                        <th>Free</th>
                        <th>Equity</th>
                      	<th>Last Login</th>
                      	<th>Registration Date</th>
                  
                        
                    
                </tr>
                </thead>
              <tfoot>
                <tr>
                  <th>Action</th>
                       <th>Select</th>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                       <th>Verification</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Phone</th>
                   		<th>Affiliate</th>
                      	<th>Campaign</th>
                      	<th>Agent</th>
                        <th>Desk</th>
                        <th>Country</th>
                        <th>Balance</th>
                      	<th>Total Deposit</th>
                        <th>Total Withdrawal</th>
                      	<th>Total Credit / Insurance</th>
                        <th>Pnl</th>
                        <th>Free</th>
                        <th>Equity</th>
                      	<th>Last Login</th>
                      	<th>Registration Date</th>
                  
                        
                    
                </tr>
                </tfoot>
                <tbody>

                 @foreach ($affiliateleads as $user)
                <tr>
                   <td> 
                     <div class="btn-group">
                           <a type="button" class="btn btn-info" href="">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a type="button" class="btn btn-info" href="{{route('crm.leads.edit', ['lead' => $user->id])}}"><i class="fas fa-pen"></i></a>
                       <a type="button" class="btn btn-danger del" href="{{route('crm.leads.destroy', ['account' => $user->id])}}"><i class="fas fa-trash"></i></a>
						

                        </div>
                  </td>
                    <td align="center"><input type="checkbox" /></td>
                     <td>{{$user->id}}</td>
                     <td>{{$user->first_name}}</td>
                     <td>{{$user->last_name}}</td>
                     <td></td>
                     <td>{{ $user->lead_status }}</td>
                     <td>{{$user->email }}</td>
                   <td>{{ $user->phone }}</td>
                  <td></td>
                     <td>{{ $user->group_id }}</td>
                     <td>{{ $user->affiliate_user_id }}</td>
                     <td></td>
                     <td>{{$user->country}}</td>
                     <td>{{$user->balance}}</td>
                  	<td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                    
                    
                    

                </tr>
                @endforeach
                 
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
{{--            <ul class="pagination pagination-sm m-0 float-right">--}}
{{--                <li class="page-item"><a class="page-link" href="#">«</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">»</a></li>--}}
{{--            </ul>--}}
            {{-- {{ $affiliateleads->links() }} --}}
        </div>
         <a type="button" class="btn btn-info" href="{{route('crm.leads.create')}}">
            <i class="fas fa-plus"></i>
        </a>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script  src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
  
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
  
   $("#actionbar").hide();
  
  $('#lead_table tfoot th').each( function () {
   var title = $(this).text();
    		if(title=="Action" )
        {
        
          var st_drop='';
          
          
          $(this).html( st_drop );
        }
  		else
       if(title=="Last Login" || title=="Registration Date" || title=="Comments" )
        {
          const status=["Old", "New"];
          var st_drop="<select><option hidden>Search "+title+"</option>";
          for(var i=0; i<status.length;i++)
          {
            st_drop+="<option>"+status[i]+"</option>";
          }
          st_drop+="</select>";
          $(this).html( st_drop );
        }
  		else
          if(title=="Verification")
        {
          const status=["Not", "Partial", "Full"];
          var st_drop="<select><option hidden>Search "+title+"</option>";
          for(var i=0; i<status.length;i++)
          {
            st_drop+="<option>"+status[i]+"</option>";
          }
          st_drop+="</select>";
          $(this).html( st_drop );
        }
  		else
  
  		if(title=="Balance" || title=="Total Withdrawal" || title=="Total Deposit" || title=="Pnl" || title=="Free"|| title=="Equity" ||title=="Total Credit / Insurance")
        {
          const status=["High", "Low", "Old", "New"];
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
  		if(title=="Status")
        {
          const status=["New", "FTD", "Call Back", "NA", "Low potential", "High potential"];
          var st_drop="<select><option hidden>Search "+title+"</option>";
          for(var i=0; i<6;i++)
          {
            st_drop+="<option>"+status[i]+"</option>";
          }
          st_drop+="</select>";
          $(this).html( st_drop );
        }
  		else
  		if(title=="Campaign")
        {
          var list={!!$group!!};
          var options="<select><option hidden>Search "+title+"</option>";
          for(var i=0; i<list.length;i++)
          {
            options+="<option>"+list[i]+"</option>";
          }
          options+="</select>";
          $(this).html( options );
        }
  		else
  		if(title=="Agent")
        {
          const list={!!$user!!};
          var options="<select><option hidden>Search "+title+"</option>";
          for(var i=0; i<list.length;i++)
          {
            options+="<option>"+list[i]+"</option>";
          }
          options+="</select>";
          $(this).html( options );
        }
 		 else
  		if(title=="Desk")
        {
          const list=["Not assigned(standard)","Convertion","rentention"];
          var options="<select><option hidden>Search "+title+"</option>";
          for(var i=0; i<3;i++)
          {
            options+="<option>"+list[i]+"</option>";
          }
          options+="</select>";
          $(this).html( options );
        }
 		 else
  		if(title=="Country")
        {
          const list=["Afghanistan","Aland Islands","Albania","Algeria","American Samoa","Andorra","Angola","Anguilla","Antarctica","Antigua and Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bonaire, Sint Eustatius and Saba","Bosnia and Herzegovina","Botswana","Bouvet Island","Brazil","British Indian Ocean Territory","Brunei Darussalam","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central African Republic","Chad","Chile","China","Christmas Island","Cocos (Keeling) Islands","Colombia","Comoros","Congo","Congo, Democratic Republic of the Congo","Cook Islands","Costa Rica","Cote D'Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands (Malvinas)","Faroe Islands","Fiji","Finland","France","French Guiana","French Polynesia","French Southern Territories","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guadeloupe","Guam","Guatemala","Guernsey","Guinea","Guinea-Bissau","Guyana","Haiti","Heard Island and Mcdonald Islands","Holy See (Vatican City State)","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran, Islamic Republic of","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Korea, Democratic People's Republic of","Korea, Republic of","Kosovo","Kuwait","Kyrgyzstan","Lao People's Democratic Republic","Latvia","Lebanon","Lesotho","Liberia","Libyan Arab Jamahiriya","Liechtenstein","Lithuania","Luxembourg","Macao","Macedonia, the Former Yugoslav Republic of","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Martinique","Mauritania","Mauritius","Mayotte","Mexico","Micronesia, Federated States of","Moldova, Republic of","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauru","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","Niue","Norfolk Island","Northern Mariana Islands","Norway","Oman","Pakistan","Palau","Palestinian Territory, Occupied","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Pitcairn","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russian Federation","Rwanda","Saint Barthelemy","Saint Helena","Saint Kitts and Nevis","Saint Lucia","Saint Martin","Saint Pierre and Miquelon","Saint Vincent and the Grenadines","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Serbia and Montenegro","Seychelles","Sierra Leone","Singapore","Sint Maarten","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Georgia and the South Sandwich Islands","South Sudan","Spain","Sri Lanka","Sudan","Suriname","Svalbard and Jan Mayen","Swaziland","Sweden","Switzerland","Syrian Arab Republic","Taiwan, Province of China","Tajikistan","Tanzania, United Republic of","Thailand","Timor-Leste","Togo","Tokelau","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan","Turks and Caicos Islands","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","United States Minor Outlying Islands","Uruguay","Uzbekistan","Vanuatu","Venezuela","Viet Nam","Virgin Islands, British","Virgin Islands, U.s.","Wallis and Futuna","Western Sahara","Yemen","Zambia","Zimbabwe"];
          var options="<select><option hidden>Search "+title+"</option>";
          for(var i=0; i<list.length;i++)
          {
            options+="<option>"+list[i]+"</option>";
          }
          options+="</select>";
          $(this).html( options );
        }
  
  		
  		else
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    
  });
  
   var st=0;
  table=$("#lead_table").DataTable({
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
  });

});
</script>

@stop
