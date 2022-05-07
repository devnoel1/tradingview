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
  body {
    border: 0
  }

  .dataTables_scroll {
    position: relative
  }

  .dataTables_scrollHead {
    margin-bottom: 40px;
  }

  .dataTables_scrollFoot {
    position: absolute;
    top: 41px
  }
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
          <i class="pe-7s-user icon-gradient bg-tempting-azure">
          </i>
        </div>
        <div>CRM-Leads
          <div class="page-title-subheading">
          </div>
        </div>
      </div>
      <div class="page-title-actions">
        <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
          class="btn-shadow mr-3 btn btn-dark">
          <i class="fa fa-star"></i>
        </button>
        <div class="d-inline-block dropdown">
          <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            class="btn-shadow dropdown-toggle btn btn-info">
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
      </div>
    </div>
  </div>



  <div class="main-card mb-3 card">

    <div class="card-body">
      <h5 class="card-title">Leads</h5>


      {{-- <div class="row col-md-12" id="actionbar">
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
          <input type="submit" value="save" />
          <input type="reset" value="cancel" />

        </div>

        <div class="col-md-2">

        </div>
      </div> --}}
      <div class="row">
        <div class="col-lg-2">
          <a style="color:white;" href="{{route('crm.leads.create')}}"
            class=" col-md-12 btn-wide mb-2 mr-2 btn-icon btn btn-success"><i class="fa fa-plus btn-icon-wrapper"
              style="color:white;"> </i> Create Lead</a>
        </div>
        <div class="col-md-8" id="actionbar" style="display: none">
          <div class="dropdown d-inline-block">
            <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"
              class="mb-2 mr-2 dropdown-toggle btn btn-light">Action</button>
            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" x-placement="bottom-start"
              style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 33px, 0px);">
              <a class="dropdown-item" id="blockacc" href="#" data-toggle="modal" data-target="#accBlckConfirm"> Block
                trader login</a>
              <a class="dropdown-item" id="unblockacc" href="#" data-toggle="modal" data-target="#accUnblock">Unblock
                trader login</a>
              <a class="dropdown-item" data-toggle="modal" data-target="#deskModal">Change desk</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#agentModal"> Change agent</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#affiliateModal">Change affiliate</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#verifyStatus">Change verification
                status</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changeLevel">Change account level</a>
            </div>
          </div>

          <div class="dropdown d-inline-block">
            <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"
              class="mb-2 mr-2 dropdown-toggle btn btn-light">Contact</button>
            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" x-placement="bottom-start"
              style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 33px, 0px);">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#emailTemplate"> Send Email By
                Template</a>

            </div>
          </div>

          <div class="dropdown d-inline-block">
            <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"
              class="mb-2 mr-2 dropdown-toggle btn btn-light">Contact</button>
            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" x-placement="bottom-start"
              style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 33px, 0px);">
              <a class="dropdown-item" data-toggle="modal" data-target="#creditCard">Add Credit </a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#insurance">Add Insurance</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deposite">Add Deposit</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#withdrawal"> Add Withdrawal</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#fee">Add Fee Refund</a>

            </div>
          </div>
        </div>
      </div>
      <table id="lead_table" class="mb-0 table table-responsive ">
        <thead>
          <tr>
            <th>Action</th>
            <th>
              <div class="d-flex justify-content-center">
                <input id="check" type="checkbox" />
              </div>
            </th>
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
        <tbody>
          @foreach ($affiliateleads as $user)
          <tr>
            <td>
              <div class="btn-group">
                <a type="button" class="btn btn-info" href="">
                  <i class="fas fa-eye"></i>
                </a>
                <a type="button" class="btn btn-info" href="{{route('crm.leads.edit', ['lead' => $user->id])}}"><i
                    class="fas fa-pen"></i></a>
                <a type="button" class="btn btn-danger del"
                  href="{{route('crm.leads.destroy', ['account' => $user->id])}}"><i class="fas fa-trash"></i></a>
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
      </table>
    </div>


  </div>






</div>
@section('modal-content')
@include('crm.modals.leadModal')
@endsection
@endsection

@section('footerfile')
<script type="text/javascript">
  var table="";
   
  $( 'input[type=checkbox]').on( 'change', function () {
   
   if($('input[type=checkbox]').is(":checked"))
   {
     $("#actionbar").show();
   }
   else{
     $("#actionbar").hide();
   }
   
 });
 
 $("#check").click(function(){
     $('input:checkbox').not(this).prop('checked', this.checked);
 });
 
  
  
$(document).ready( function () {
$(".del").on("click", function (e) {
if (!confirm("Are you Sure want to delete!")) {
e.preventDefault();
}
});

$("#actionbar").hide();

// $('#lead_table tfoot th').each( function () {
// var title = $(this).text();
// if(title=="Action" )
// {

// var st_drop='<a style="color:white;" href="{{route('crm.leads.create')}}"
//   class=" col-md-12 btn-wide mb-2 mr-2 btn-icon btn btn-success"><i class="fa fa-plus btn-icon-wrapper"
//     style="color:white;"> </i></a>';



// $(this).html( st_drop );
// }
// else
// if(title=="Last Login" || title=="Registration Date" || title=="Comments" )
// {
// const status=["Old", "New"];
// var st_drop="<select>
//   <option hidden>Search "+title+"</option>";
//   for(var i=0; i<status.length;i++) { st_drop+="<option>" +status[i]+"</option>";
//     }
//     st_drop+="
// </select>";
// $(this).html( st_drop );
// }
// else
// if(title=="Verification")
// {
// const status=["Not", "Partial", "Full"];
// var st_drop="<select>
//   <option hidden>Search "+title+"</option>";
//   for(var i=0; i<status.length;i++) { st_drop+="<option>" +status[i]+"</option>";
//     }
//     st_drop+="
// </select>";
// $(this).html( st_drop );
// }
// else

// if(title=="Balance" || title=="Total Withdrawal" || title=="Total Deposit" || title=="Pnl" || title=="Free"||
// title=="Equity" ||title=="Total Credit / Insurance")
// {
// const status=["High", "Low", "Old", "New"];
// var st_drop="<select>
//   <option hidden>Search "+title+"</option>";
//   for(var i=0; i<status.length;i++) { st_drop+="<option>" +status[i]+"</option>";
//     }
//     st_drop+="
// </select>";
// $(this).html( st_drop );
// }
// else

// if(title=="Select")
// {

// var st_drop='<center><input id="check" type="checkbox" /></center>';

// $(this).html( st_drop );
// }else
// if(title=="Status")
// {
// const status=["New", "FTD", "Call Back", "NA", "Low potential", "High potential"];
// var st_drop="<select>
//   <option hidden>Search "+title+"</option>";
//   for(var i=0; i<6;i++) { st_drop+="<option>" +status[i]+"</option>";
//     }
//     st_drop+="
// </select>";
// $(this).html( st_drop );
// }
// else
// if(title=="Campaign")
// {
// var list={!!$group!!};
// var options="<select>
//   <option hidden>Search "+title+"</option>";
//   for(var i=0; i<list.length;i++) { options+="<option>" +list[i]+"</option>";
//     }
//     options+="
// </select>";
// $(this).html( options );
// }
// else
// if(title=="Agent")
// {
// const list={!!$user!!};
// var options="<select>
//   <option hidden>Search "+title+"</option>";
//   for(var i=0; i<list.length;i++) { options+="<option>" +list[i]+"</option>";
//     }
//     options+="
// </select>";
// $(this).html( options );
// }
// else
// if(title=="Desk")
// {
// const list=["Not assigned(standard)","Convertion","rentention"];
// var options="<select>
//   <option hidden>Search "+title+"</option>";
//   for(var i=0; i<3;i++) { options+="<option>" +list[i]+"</option>";
//     }
//     options+="
// </select>";
// $(this).html( options );
// }
// else
// if(title=="Country")
// {
// const list=["Afghanistan","Aland Islands","Albania","Algeria","American
// Samoa","Andorra","Angola","Anguilla","Antarctica","Antigua and
// Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bonaire,
// Sint Eustatius and Saba","Bosnia and Herzegovina","Botswana","Bouvet Island","Brazil","British Indian Ocean
// Territory","Brunei Darussalam","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman
// Islands","Central African Republic","Chad","Chile","China","Christmas Island","Cocos (Keeling)
// Islands","Colombia","Comoros","Congo","Congo, Democratic Republic of the Congo","Cook Islands","Costa Rica","Cote
// D'Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican
// Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands
// (Malvinas)","Faroe Islands","Fiji","Finland","France","French Guiana","French Polynesia","French Southern
// Territories","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guadeloupe","Guam","Guatemala","Guernsey","Guinea","Guinea-Bissau","Guyana","Haiti","Heard
// Island and Mcdonald Islands","Holy See (Vatican City State)","Honduras","Hong
// Kong","Hungary","Iceland","India","Indonesia","Iran, Islamic Republic of","Iraq","Ireland","Isle of
// Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Korea, Democratic People's
// Republic of","Korea, Republic of","Kosovo","Kuwait","Kyrgyzstan","Lao People's Democratic
// Republic","Latvia","Lebanon","Lesotho","Liberia","Libyan Arab
// Jamahiriya","Liechtenstein","Lithuania","Luxembourg","Macao","Macedonia, the Former Yugoslav Republic
// of","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall
// Islands","Martinique","Mauritania","Mauritius","Mayotte","Mexico","Micronesia, Federated States of","Moldova, Republic
// of","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauru","Nepal","Netherlands","Netherlands
// Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","Niue","Norfolk Island","Northern Mariana
// Islands","Norway","Oman","Pakistan","Palau","Palestinian Territory, Occupied","Panama","Papua New
// Guinea","Paraguay","Peru","Philippines","Pitcairn","Poland","Portugal","Puerto
// Rico","Qatar","Reunion","Romania","Russian Federation","Rwanda","Saint Barthelemy","Saint Helena","Saint Kitts and
// Nevis","Saint Lucia","Saint Martin","Saint Pierre and Miquelon","Saint Vincent and the Grenadines","Samoa","San
// Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Serbia and Montenegro","Seychelles","Sierra
// Leone","Singapore","Sint Maarten","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Georgia and
// the South Sandwich Islands","South Sudan","Spain","Sri Lanka","Sudan","Suriname","Svalbard and Jan
// Mayen","Swaziland","Sweden","Switzerland","Syrian Arab Republic","Taiwan, Province of China","Tajikistan","Tanzania,
// United Republic of","Thailand","Timor-Leste","Togo","Tokelau","Tonga","Trinidad and
// Tobago","Tunisia","Turkey","Turkmenistan","Turks and Caicos Islands","Tuvalu","Uganda","Ukraine","United Arab
// Emirates","United Kingdom","United States","United States Minor Outlying
// Islands","Uruguay","Uzbekistan","Vanuatu","Venezuela","Viet Nam","Virgin Islands, British","Virgin Islands,
// U.s.","Wallis and Futuna","Western Sahara","Yemen","Zambia","Zimbabwe"];
// var options="<select>
//   <option hidden>Search "+title+"</option>";
//   for(var i=0; i<list.length;i++) { options+="<option>" +list[i]+"</option>";
//     }
//     options+="
// </select>";
// $(this).html( options );
// }


// else
// $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

// });

// var st=0;
// table=$("#lead_table").DataTable({
// ordering: false,


// initComplete: function () {
// // Apply the search
// this.api().columns().every( function () {
// var that = this;

// $( 'input[type=text]', this.footer() ).on( 'keyup change clear', function () {
// if ( that.search() !== this.value ) {
// that
// .search( this.value )
// .draw();
// }
// } );

// $( 'input[type=checkbox]', this.footer() ).on( 'change', function () {
// if(st==0)
// {
// st=1
// table.$('input:checkbox').prop('checked',true);
// $("#actionbar").show();

// }
// else{
// st=0
// table.$('input:checkbox').prop('checked',false);
// $("#actionbar").hide();
// }

// } );

// $( 'select', this.footer() ).on( 'change', function () {

// if ( that.search() !== this.value ) {
// if(this.value=="High")
// {
// that
// .order( ['asc' ])
// .draw();
// }
// else
// if(this.value=="Low")
// {
// that
// .order( ['desc' ] )
// .draw();
// }
// else{
// that
// .search( this.value )
// .draw();
// }
// }


// } );
// } );
// },
// "scrollX": true,
// "sScrollXInner": "100%"
// });

});

</script>

@endsection