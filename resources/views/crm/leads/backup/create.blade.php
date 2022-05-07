@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM-Leads</h1>
@stop
<link   href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')

    <form class="form-horizontal" method="POST" action="{{route('crm.leads.upload')}}" enctype="multipart/form-data">
        @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Upload Leads</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group row">
                <label for="xlsx_file" class="col-md-4 control-label">XLSX file to import</label>
                <div class="col-md-4">
                    <input id="xlsx_file" type="file" class="form-control" name="xlsx_file" accept=".xlsx" required>
                    @if ($errors->has('xlsx_file'))
                        <span class="help-block">
                            <strong>{{ $errors->first('xlsx_file') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-4">
                  <a class="btn btn-warning" href="{{url('public/Demo Lead.xlsx')}}"> Click Here to Download an Example</a>
              </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <button type="submit" class="btn btn-info">Upload</button>
            <a href="{{route('crm.leads.index')}}" class="btn btn-default">Cancel</a>
        </div>
    </div>

    </form>

    <form autocomplete="off" class="form-horizontal" method="POST" action="{{route('crm.leads.store')}}">
        @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create a New Lead</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group row">
                <label for="inputFirstName" class="col-sm-2 col-form-label">First name</label>
                <div class="col-sm-10">
                    <input type="text" name="firstname" class="form-control" id="inputFirstName" placeholder="First name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputLastName" class="col-sm-2 col-form-label">Last name</label>
                <div class="col-sm-10">
                    <input type="text" name="lastname" class="form-control" id="inputLastName" placeholder="Last name" required>
                </div>
            </div>
            <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required>
                    </div>
                </div>
              <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" class="form-control"  placeholder="Phone Number" >
                    </div>
                </div>
            <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Reset Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="passowrd" class="form-control" autocomplete="new-password"  placeholder="Rest Password" >
                    </div>
                </div>
                  <hr/>
              <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Second Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="second_email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputAddressLine1" class="col-sm-2 col-form-label">Address Line 1</label>
                    <div class="col-sm-10">
                        <input type="text" name="address_line_1" class="form-control" id="inputAddressLine1" placeholder="Address Line 1" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputAddressLine2" class="col-sm-2 col-form-label">Address Line 2</label>
                    <div class="col-sm-10">
                        <input type="text" name="address_line_2" class="form-control" id="inputAddressLine2" placeholder="Address Line 2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputZipcode" class="col-sm-2 col-form-label">Zipcode</label>
                    <div class="col-sm-10">
                        <input type="text" name="zipcode" class="form-control" id="inputZipcode" placeholder="Zipcode" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputCity" class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" name="city" class="form-control" id="inputCity" placeholder="City" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-2 col-form-label">State</label>
                    <div class="col-sm-10">
                        <input type="text" name="state" class="form-control" id="inputState" placeholder="State">
                    </div>
                </div>
               <div class="form-group row">
                    <label for="inputDate" class="col-sm-2 col-form-label">Date Of Birth</label>
                    <div class="col-sm-10">
                        <input type="Date" name="date_of_birth" class="form-control" id="inputDate"  >
                    </div>
                </div>
            <div class="form-group row">
                <label for="inputCountry" class="col-sm-2 col-form-label">Country</label>
                <div class="col-sm-10">
                    <select class="form-control js-example-basic-single" name="country" >
                       <option>Select Country</option>
                        <option value="Afganistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bonaire">Bonaire</option>
                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Canary Islands">Canary Islands</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Channel Islands">Channel Islands</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos Island">Cocos Island</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote DIvoire">Cote DIvoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Curaco">Curacao</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="East Timor">East Timor</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands">Falkland Islands</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Ter">French Southern Ter</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Great Britain">Great Britain</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="India">India</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea North">Korea North</option>
                        <option value="Korea Sout">Korea South</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Laos">Laos</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macau">Macau</option>
                        <option value="Macedonia">Macedonia</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Midway Islands">Midway Islands</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Nambia">Nambia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherland Antilles">Netherland Antilles</option>
                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                        <option value="Nevis">Nevis</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau Island">Palau Island</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Phillipines">Philippines</option>
                        <option value="Pitcairn Island">Pitcairn Island</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                        <option value="Republic of Serbia">Republic of Serbia</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russia">Russia</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="St Barthelemy">St Barthelemy</option>
                        <option value="St Eustatius">St Eustatius</option>
                        <option value="St Helena">St Helena</option>
                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                        <option value="St Lucia">St Lucia</option>
                        <option value="St Maarten">St Maarten</option>
                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                        <option value="Saipan">Saipan</option>
                        <option value="Samoa">Samoa</option>
                        <option value="Samoa American">Samoa American</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syria</option>
                        <option value="Tahiti">Tahiti</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Erimates">United Arab Emirates</option>
                        <option value="United States of America">United States of America</option>
                        <option value="Uraguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vatican City State">Vatican City State</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                        <option value="Wake Island">Wake Island</option>
                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zaire">Zaire</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option></select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputIp" class="col-sm-2 col-form-label">IP</label>
                <div class="col-sm-10">
                    <input type="text" name="ip_address" class="form-control" id="inputIp" placeholder="0.0.0.0" value="0.0.0.0" >
                </div>
            </div>
           <div class="form-group row">
                    <label for="inputExchange" class="col-sm-2 col-form-label">Time Zone</label>
                    <div class="col-sm-10">
                        <select class="form-control " name="time_zone" >
                           <option>Select Time Zone</option>
                            <option value="-12:00">(GMT -12:00) Eniwetok, Kwajalein</option>
    <option value="-11:00">(GMT -11:00) Midway Island, Samoa</option>
    <option value="-10:00">(GMT -10:00) Hawaii</option>
    <option value="-09:50">(GMT -9:30) Taiohae</option>
    <option value="-09:00">(GMT -9:00) Alaska</option>
    <option value="-08:00">(GMT -8:00) Pacific Time (US &amp; Canada)</option>
    <option value="-07:00">(GMT -7:00) Mountain Time (US &amp; Canada)</option>
    <option value="-06:00">(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
    <option value="-05:00">(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
    <option value="-04:50">(GMT -4:30) Caracas</option>
    <option value="-04:00">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
    <option value="-03:50">(GMT -3:30) Newfoundland</option>
    <option value="-03:00">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
    <option value="-02:00">(GMT -2:00) Mid-Atlantic</option>
    <option value="-01:00">(GMT -1:00) Azores, Cape Verde Islands</option>
    <option value="+00:00" >(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
    <option value="+01:00">(GMT +1:00) Brussels, Copenhagen, Madrid, Paris</option>
    <option value="+02:00">(GMT +2:00) Kaliningrad, South Africa</option>
    <option value="+03:00">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
    <option value="+03:50">(GMT +3:30) Tehran</option>
    <option value="+04:00">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
    <option value="+04:50">(GMT +4:30) Kabul</option>
    <option value="+05:00">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
    <option value="+05:50">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
    <option value="+05:75">(GMT +5:45) Kathmandu, Pokhara</option>
    <option value="+06:00">(GMT +6:00) Almaty, Dhaka, Colombo</option>
    <option value="+06:50">(GMT +6:30) Yangon, Mandalay</option>
    <option value="+07:00">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
    <option value="+08:00">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
    <option value="+08:75">(GMT +8:45) Eucla</option>
    <option value="+09:00">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
    <option value="+09:50">(GMT +9:30) Adelaide, Darwin</option>
    <option value="+10:00">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
    <option value="+10:50">(GMT +10:30) Lord Howe Island</option>
    <option value="+11:00">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
    <option value="+11:50">(GMT +11:30) Norfolk Island</option>
    <option value="+12:00">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
    <option value="+12:75">(GMT +12:45) Chatham Islands</option>
    <option value="+13:00">(GMT +13:00) Apia, Nukualofa</option>
    <option value="+14:00">(GMT +14:00) Line Islands, Tokelau</option>
                        </select>
                    </div>
                </div>
          
           <div class="form-group row">
                    <label for="inputExchange" class="col-sm-2 col-form-label">Account Level</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="level">
                           <option>Select Account Level</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}" > {{ $level->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            <div class="form-group row">
                <label for="inputOwnerId" class="col-sm-2 col-form-label">Affiliate</label>
                <div class="col-sm-10">
                    <select class="form-control" name="owner_id" >
                       <option>Select Affiliate</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"> {{ $user->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputOwnerId" class="col-sm-2 col-form-label">Campaigns</label>
                <div class="col-sm-10">
                    <select class="form-control" name="group_id" >
                       <option>Select Campaigns</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}"> {{ $group->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputExternalId" class="col-sm-2 col-form-label">External id</label>
                <div class="col-sm-10">
                    <input type="text" name="external_id" class="form-control" autocomplete="off" id="inputExternalId" placeholder="External Id">
                </div>
            </div>
           <div class="form-group row">
                <label for="inputExternalId" class="col-sm-2 col-form-label">Comment</label>
                <div class="col-sm-10">
                    <input type="text" name="comment" class="form-control" id="inputExternalId" placeholder="Comment">
                </div>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">

            <button type="submit" class="btn btn-info">Create</button>
            <a href="{{route('crm.leads.index')}}" class="btn btn-default">Cancel</a>
        </div>
    </div>
    </form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script  src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>$("#lead_table").DataTable({});</script>

@stop