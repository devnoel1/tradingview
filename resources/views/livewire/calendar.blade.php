<style>
    .flag {
	width: 16px;
	height: 11px;
	background:url("../flags.png") no-repeat;
}
[type='checkbox']:checked{
    background-color: rgb(16, 185, 129) !important;
}
.tradingview-widget-copyright{
    display: none;
}
</style>
<link rel="stylesheet" href="../css/calendar.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div>
    <section class="py-10 px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <!-- <div class="flex mb-3 px-6">
                    
                    <x-jet-dropdown align="left" width="full">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 bg-gray-700 hover:text-gray-400 focus:outline-none transition" onclick="hideDates()">
                                    <i class="fas fa-star text-gray-400"></i>&nbsp;<span class="hidden sm:block">Impact&nbsp;</span>
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>
    
                        <x-slot name="content" >
                        
                            <ul class="dropdown-menu px-2" id="importance_checkbox_list">
                                <a noref="" class="cursor-pointer" onclick="setCalendarImportance('1');">
                                <li>
                                    
                                        <input type="checkbox" class="form-check-input importance_checkbox_input" id="importance_checkbox_1" checked="" autocomplete="off">
                                        <i class="fas fa-star text-gray-400"></i>
                                </li>
                                </a>
                                <a noref="" class="cursor-pointer" onclick="setCalendarImportance('2');">
                                <li>
                                        <input type="checkbox" class="form-check-input importance_checkbox_input" id="importance_checkbox_2" autocomplete="off">
                                        <i class="fas fa-star text-gray-400"></i><i class="fas fa-star text-gray-400"></i>
                                </li>
                                </a>
                                <a noref="" class="cursor-pointer" onclick="setCalendarImportance('3');">
                                <li>
                                        <input type="checkbox" class="form-check-input importance_checkbox_input" id="importance_checkbox_3" autocomplete="off">
                                        <i class="fas fa-star text-gray-400"></i><i class="fas fa-star text-gray-400"></i><i class="fas fa-star text-gray-400"></i>
                                    
                                </li>
                                </a>
                            </ul>
                            
                        </x-slot>
                    </x-jet-dropdown>
                    
                    <span class="inline-flex rounded-md ml-4">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 bg-gray-700 hover:text-gray-400 focus:outline-none transition" onclick="showDates()">
                            <svg class="w-5 text-gray-400 dark:text-gray-400" style="height:16px;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>&nbsp;<span class="hidden sm:block">Dates&nbsp;</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                    <span class="inline-flex rounded-md ml-4">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 bg-gray-700 hover:text-gray-400 focus:outline-none transition" onclick="toggleMainCountrySelection();">
                            <i class="fas fa-globe text-gray-400"></i>&nbsp;<span class="hidden sm:block">Countries&nbsp;</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                </div>
                
                <div class="flex bg-gray-700 flex-col sm:flex-row sm:mx-6 lg:mx-8 px-4 py-3 rounded-md hidden" id="dates_container">
                    <div date-rangepicker="" datepicker-format="yyyy-mm-dd" class="flex items-center">
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input name="start" id="startDate" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Select date start">
                        </div>
                        <span class="mx-4 text-gray-500">to</span>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input name="end" id="endDate" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Select date end">
                        </div>
                    </div>
                    <div class="flex items-center ml-4 mt-2 sm:mt-0">
                          <input id="checkbox_with_importance" aria-describedby="checkbox_with_importance" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                          <label for="checkbox_with_importance" id="label_checkbox_with_importance" class="ml-3 text-sm font-medium text-gray-200 dark:text-gray-300">With Importance</label>
                          
                            <select id="importance" class="hidden ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                            </select>
                          
                    </div>
                    <div class="mt-2 sm:mt-0 text-right">
                        <button type="button" class="py-2 px-4 ml-4 text-sm font-medium text-gray-900 bg-gray-50 rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" onclick="setCalendarDate()">SEARCH</button>
                        <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-md text-sm px-5 py-2.5 text-center ml-4 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" onclick="getData()">RESET</button>
                    </div>
                </div>
                
                <span id="te-c-main-countries" class="hidden">
                    <div class="bg-gray-700 panel panel-default table-responsive text-gray-300" style="margin-bottom: 0px;">
                        <div class="flex flex-col sm:flex-row justify-between">
                            
                            <div class="inline-flex rounded-md shadow-sm" role="group" style="padding: 10px; z-index: 2;">
                              <button type="button" class="te-c-option-world py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" onclick="calendarSelecting(this, event, 'World', true);">
                                    All
                              </button>
                              <button type="button" class="te-c-option-g20 py-2 px-4 text-sm border-r font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" onclick="calendarSelecting(this, event, 'G20', true);">
                                  Major
                              </button>
                              <button type="button" class="te-c-option-africa py-2 px-4 text-sm border-r font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" onclick="calendarSelecting(this, event, 'Africa', true);">
                                  Africa
                              </button>
                              <button type="button" class="te-c-option-america py-2 px-4 text-sm border-r font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" onclick="calendarSelecting(this, event, 'America', true);">
                                  America
                              </button>
                              <button type="button" class="te-c-option-asia py-2 px-4 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" onclick="calendarSelecting(this, event, 'Asia', true);">
                                  Asia
                              </button>
                              <button type="button" class="te-c-group-selected py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" onclick="calendarSelecting(this, event, 'Europe', true);">
                                  Europe
                              </button>
                            </div>
                    
                            <div class="inline-flex rounded-md shadow-sm" role="group" style="padding: 10px; z-index: 2;">
                                <a noref="" class="te-c-option py-2 px-4 text-white cursor-pointer bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-md text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" onclick="clearSelection();" style="text-decoration: none;">Clear</a>
                                <a noref="" class="te-c-option py-2 px-4 text-sm font-medium text-gray-900 bg-gray-50 cursor-pointer rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" onclick="toggleMainCountrySelection();" style="text-decoration: none;">Close</a>
                                <a noref="" class="te-c-option py-2 px-4 text-white bg-blue-700 cursor-pointer hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="saveSelectionAndGO();" style="text-decoration: none;"><i class="fas fa-save"></i></i>&nbsp;Search</a>
                            </div>
                        </div>
                
                        <span id="te-c-all" class="flex flex-col justify-between p-6 sm:flex-row"> 
                            
                            <ul class="list-unstyled col-md-3">
                                
                                <li class="te-c-option te-c-option-afg" onclick="calendarSelecting(this, event, 'AFG');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Afghanistan</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-alb" onclick="calendarSelecting(this, event, 'ALB');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Albania</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-dza" onclick="calendarSelecting(this, event, 'DZA');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Algeria</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-ago" onclick="calendarSelecting(this, event, 'AGO');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Angola</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-arg" onclick="calendarSelecting(this, event, 'ARG');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">Argentina</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-arm" onclick="calendarSelecting(this, event, 'ARM');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Armenia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-aus" onclick="calendarSelecting(this, event, 'AUS');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">Australia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-aut" onclick="calendarSelecting(this, event, 'AUT');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Austria</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-aze" onclick="calendarSelecting(this, event, 'AZE');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Azerbaijan</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-bhr" onclick="calendarSelecting(this, event, 'BHR');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Bahrain</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-bgd" onclick="calendarSelecting(this, event, 'BGD');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Bangladesh</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-blr" onclick="calendarSelecting(this, event, 'BLR');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Belarus</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-bel" onclick="calendarSelecting(this, event, 'BEL');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Belgium</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-bol" onclick="calendarSelecting(this, event, 'BOL');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Bolivia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-bih" onclick="calendarSelecting(this, event, 'BIH');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Bosnia and Herzegovina</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-bwa" onclick="calendarSelecting(this, event, 'BWA');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Botswana</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-bra" onclick="calendarSelecting(this, event, 'BRA');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">Brazil</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-brn" onclick="calendarSelecting(this, event, 'BRN');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Brunei</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-bgr" onclick="calendarSelecting(this, event, 'BGR');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Bulgaria</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-khm" onclick="calendarSelecting(this, event, 'KHM');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Cambodia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-cmr" onclick="calendarSelecting(this, event, 'CMR');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Cameroon</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-can" onclick="calendarSelecting(this, event, 'CAN');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">Canada</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-cpv" onclick="calendarSelecting(this, event, 'CPV');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Cape Verde</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-chl" onclick="calendarSelecting(this, event, 'CHL');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Chile</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-chn" onclick="calendarSelecting(this, event, 'CHN');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">China</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-col" onclick="calendarSelecting(this, event, 'COL');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Colombia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-cod" onclick="calendarSelecting(this, event, 'COD');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Congo</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-cri" onclick="calendarSelecting(this, event, 'CRI');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Costa Rica</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-hrv" onclick="calendarSelecting(this, event, 'HRV');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Croatia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-cub" onclick="calendarSelecting(this, event, 'CUB');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Cuba</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-cyp" onclick="calendarSelecting(this, event, 'CYP');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Cyprus</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-cze" onclick="calendarSelecting(this, event, 'CZE');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Czech Republic</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-dnk" onclick="calendarSelecting(this, event, 'DNK');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Denmark</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-ecu" onclick="calendarSelecting(this, event, 'ECU');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Ecuador</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-egy" onclick="calendarSelecting(this, event, 'EGY');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Egypt</a>
                                </li>
                
                                
                            </ul>
                            <ul class="list-unstyled col-md-3">
                                
                                <li class="te-c-option te-c-option-slv" onclick="calendarSelecting(this, event, 'SLV');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">El Salvador</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-est" onclick="calendarSelecting(this, event, 'EST');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Estonia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-eth" onclick="calendarSelecting(this, event, 'ETH');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Ethiopia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-emu" onclick="calendarSelecting(this, event, 'EMU');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">Euro Area</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-fin" onclick="calendarSelecting(this, event, 'FIN');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Finland</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-fra" onclick="calendarSelecting(this, event, 'FRA');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">France</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-geo" onclick="calendarSelecting(this, event, 'GEO');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Georgia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-deu" onclick="calendarSelecting(this, event, 'DEU');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">Germany</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-gha" onclick="calendarSelecting(this, event, 'GHA');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Ghana</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-grc" onclick="calendarSelecting(this, event, 'GRC');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Greece</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-hnd" onclick="calendarSelecting(this, event, 'HND');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Honduras</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-hkg" onclick="calendarSelecting(this, event, 'HKG');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Hong Kong</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-hun" onclick="calendarSelecting(this, event, 'HUN');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Hungary</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-isl" onclick="calendarSelecting(this, event, 'ISL');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Iceland</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-ind" onclick="calendarSelecting(this, event, 'IND');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">India</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-idn" onclick="calendarSelecting(this, event, 'IDN');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">Indonesia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-irn" onclick="calendarSelecting(this, event, 'IRN');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Iran</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-irl" onclick="calendarSelecting(this, event, 'IRL');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Ireland</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-isr" onclick="calendarSelecting(this, event, 'ISR');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Israel</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-ita" onclick="calendarSelecting(this, event, 'ITA');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">Italy</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-civ" onclick="calendarSelecting(this, event, 'CIV');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Ivory Coast</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-jam" onclick="calendarSelecting(this, event, 'JAM');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Jamaica</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-jpn" onclick="calendarSelecting(this, event, 'JPN');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">Japan</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-jor" onclick="calendarSelecting(this, event, 'JOR');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Jordan</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-kaz" onclick="calendarSelecting(this, event, 'KAZ');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Kazakhstan</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-ken" onclick="calendarSelecting(this, event, 'KEN');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Kenya</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-unk" onclick="calendarSelecting(this, event, 'UNK');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Kosovo</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-kwt" onclick="calendarSelecting(this, event, 'KWT');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Kuwait</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-kgz" onclick="calendarSelecting(this, event, 'KGZ');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Kyrgyzstan</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-lva" onclick="calendarSelecting(this, event, 'LVA');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Latvia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-lbn" onclick="calendarSelecting(this, event, 'LBN');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Lebanon</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-ltu" onclick="calendarSelecting(this, event, 'LTU');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Lithuania</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-lux" onclick="calendarSelecting(this, event, 'LUX');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Luxembourg</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-mac" onclick="calendarSelecting(this, event, 'MAC');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Macau</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-mkd" onclick="calendarSelecting(this, event, 'MKD');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Macedonia</a>
                                </li>
                
                                
                            </ul>
                            <ul class="list-unstyled col-md-3">
                                
                                <li class="te-c-option te-c-option-mdg" onclick="calendarSelecting(this, event, 'MDG');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Madagascar</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-mys" onclick="calendarSelecting(this, event, 'MYS');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Malaysia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-mli" onclick="calendarSelecting(this, event, 'MLI');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Mali</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-mlt" onclick="calendarSelecting(this, event, 'MLT');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Malta</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-mus" onclick="calendarSelecting(this, event, 'MUS');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Mauritius</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-mex" onclick="calendarSelecting(this, event, 'MEX');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">Mexico</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-mda" onclick="calendarSelecting(this, event, 'MDA');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Moldova</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-mng" onclick="calendarSelecting(this, event, 'MNG');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Mongolia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-mne" onclick="calendarSelecting(this, event, 'MNE');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Montenegro</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-mar" onclick="calendarSelecting(this, event, 'MAR');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Morocco</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-moz" onclick="calendarSelecting(this, event, 'MOZ');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Mozambique</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-mmr" onclick="calendarSelecting(this, event, 'MMR');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Myanmar</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-nam" onclick="calendarSelecting(this, event, 'NAM');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Namibia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-nld" onclick="calendarSelecting(this, event, 'NLD');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Netherlands</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-nzl" onclick="calendarSelecting(this, event, 'NZL');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">New Zealand</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-nic" onclick="calendarSelecting(this, event, 'NIC');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Nicaragua</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-nga" onclick="calendarSelecting(this, event, 'NGA');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Nigeria</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-nor" onclick="calendarSelecting(this, event, 'NOR');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Norway</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-omn" onclick="calendarSelecting(this, event, 'OMN');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Oman</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-pak" onclick="calendarSelecting(this, event, 'PAK');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Pakistan</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-pse" onclick="calendarSelecting(this, event, 'PSE');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Palestine</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-pan" onclick="calendarSelecting(this, event, 'PAN');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Panama</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-pry" onclick="calendarSelecting(this, event, 'PRY');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Paraguay</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-per" onclick="calendarSelecting(this, event, 'PER');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Peru</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-phl" onclick="calendarSelecting(this, event, 'PHL');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Philippines</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-pol" onclick="calendarSelecting(this, event, 'POL');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Poland</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-prt" onclick="calendarSelecting(this, event, 'PRT');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Portugal</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-pri" onclick="calendarSelecting(this, event, 'PRI');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Puerto Rico</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-qat" onclick="calendarSelecting(this, event, 'QAT');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Qatar</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-cog" onclick="calendarSelecting(this, event, 'COG');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Republic of the Congo</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-rou" onclick="calendarSelecting(this, event, 'ROU');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Romania</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-rus" onclick="calendarSelecting(this, event, 'RUS');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">Russia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-rwa" onclick="calendarSelecting(this, event, 'RWA');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Rwanda</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-stp" onclick="calendarSelecting(this, event, 'STP');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Sao Tome and Principe</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-sau" onclick="calendarSelecting(this, event, 'SAU');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">Saudi Arabia</a>
                                </li>
                
                                
                            </ul>
                            <ul class="list-unstyled col-md-3">
                                
                                <li class="te-c-option te-c-option-sen" onclick="calendarSelecting(this, event, 'SEN');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Senegal</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-srb" onclick="calendarSelecting(this, event, 'SRB');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Serbia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-sle" onclick="calendarSelecting(this, event, 'SLE');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Sierra Leone</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-sgp" onclick="calendarSelecting(this, event, 'SGP');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Singapore</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-svk" onclick="calendarSelecting(this, event, 'SVK');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Slovakia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-svn" onclick="calendarSelecting(this, event, 'SVN');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Slovenia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-som" onclick="calendarSelecting(this, event, 'SOM');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Somalia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-zaf" onclick="calendarSelecting(this, event, 'ZAF');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">South Africa</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-kor" onclick="calendarSelecting(this, event, 'KOR');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">South Korea</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-esp" onclick="calendarSelecting(this, event, 'ESP');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">Spain</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-lka" onclick="calendarSelecting(this, event, 'LKA');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Sri Lanka</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-sdn" onclick="calendarSelecting(this, event, 'SDN');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Sudan</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-swe" onclick="calendarSelecting(this, event, 'SWE');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Sweden</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-che" onclick="calendarSelecting(this, event, 'CHE');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Switzerland</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-twn" onclick="calendarSelecting(this, event, 'TWN');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Taiwan</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-tjk" onclick="calendarSelecting(this, event, 'TJK');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Tajikistan</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-tza" onclick="calendarSelecting(this, event, 'TZA');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Tanzania</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-tha" onclick="calendarSelecting(this, event, 'THA');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Thailand</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-tto" onclick="calendarSelecting(this, event, 'TTO');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Trinidad and Tobago</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-tun" onclick="calendarSelecting(this, event, 'TUN');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Tunisia</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-tur" onclick="calendarSelecting(this, event, 'TUR');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">Turkey</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-uga" onclick="calendarSelecting(this, event, 'UGA');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Uganda</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-ukr" onclick="calendarSelecting(this, event, 'UKR');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Ukraine</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-are" onclick="calendarSelecting(this, event, 'ARE');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">United Arab Emirates</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-gbr" onclick="calendarSelecting(this, event, 'GBR');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">United Kingdom</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-usa" onclick="calendarSelecting(this, event, 'USA');">
                                    <input type="checkbox" class="form-check-input" checked="" autocomplete="off">
                                    <a noref="">United States</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-ury" onclick="calendarSelecting(this, event, 'URY');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Uruguay</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-uzb" onclick="calendarSelecting(this, event, 'UZB');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Uzbekistan</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-ven" onclick="calendarSelecting(this, event, 'VEN');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Venezuela</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-vnm" onclick="calendarSelecting(this, event, 'VNM');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Vietnam</a>
                                </li>
                
                                
                                <li class="te-c-option te-c-option-zwe" onclick="calendarSelecting(this, event, 'ZWE');">
                                    <input type="checkbox" class="form-check-input" autocomplete="off">
                                    <a noref="">Zimbabwe</a>
                                </li>
                
                                
                            </ul>
                        </span>
                    </div>
                </span> -->
                
                <div class="inline-block py-2 min-w-full min-h-screen sm:px-6 lg:px-8 relative">
                    <!-- <div class="absolute bg-gray-800 flex h-full items-center justify-center opacity-70 w-full" id="calendar_loader">
                        <div class="animate-spin rounded-full h-32 w-32 border-b-2"></div>
                    </div> -->
                    <div class="overflow-hidden shadow-md sm:rounded-lg">
                        <!-- <table class="min-w-full" id="financial_table">
                            <thead class="bg-gray-700 dark:bg-gray-700">
                                
                            </thead>
                            <tbody>
        
                            </tbody>
                        </table> -->

                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/currencies/economic-calendar/" rel="noopener" target="_blank"><span class="blue-text">Economic Calendar</span></a> by TradingView</div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-events.js" async>
                            {
                            "width": "100%",
                            "height": "100%",
                            "colorTheme": "dark",
                            "isTransparent": false,
                            "locale": "en",
                            "importanceFilter": "-1,0,1"
                            }
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/datepicker.bundle.js"></script> -->
    
    <script>
        // console.log("/controls/calendaruc 20201213")
        var COUNTRIES_COOKIE_NAME = "calendar-countries";
        var RANGE_COOKIE_NAME = "calendar-range";
        var IMPORTANCE_COOKIE_NAME = "calendar-importance";
        var CUSTOM_RANGE_COOKIE_NAME = "cal-custom-range";
        var selected_countries = ['arg','aus','bra','can','chn','emu','eun','fra','deu','ind','idn','ita','jpn','mex','rus','sau','zaf','kor','esp','tur','gbr','usa'];
        var WORLD_ISOS = ['afg','alb','dza','asm','and','ago','aia','atg','arg','arm','abw','aus','aut','aze','bhs','bhr','bgd','brb','blr','bel','blz','ben','bmu','btn','bol','bih','bwa','bra','brn','bgr','bfa','bdi','khm','cmr','can','cpv','cym','caf','tcd','chi','chl','chn','cxr','col','ccc','com','cod','cok','cri','null','hrv','cub','cyp','cze','dnk','dji','dma','dom','eap','tls','ecu','egy','slv','gnq','eri','est','eth','emu','eca','eun','flk','fro','fji','fin','null','fra','pyf','gab','gmb','geo','deu','gha','gib','grc','grl','grd','gum','gtm','gin','gnb','guy','hti','hpc','hic','noc','oec','hnd','hkg','hun','isl','ind','idn','irn','irq','irl','imy','isr','ita','civ','jam','jpn','jor','kaz','ken','kir','unk','kwt','kgz','lao','lac','lva','ldc','lbn','lso','lbr','lby','lie','ltu','lmy','lic','lmc','lux','mac','mkd','mdg','mwi','mys','mdv','mli','mlt','mhl','mrt','mus','myt','mex','fsm','mna','mic','mda','mco','mng','mne','msr','mar','moz','mmr','nam','npl','nld','ant','ncl','nzl','nic','ner','nga','nfk','prk','mnp','nor','omn','oth','pak','plw','pse','pan','png','pry','per','phl','pcn','pol','prt','pri','qat','null','cog','reu','rou','rus','rwa','wsm','smr','stp','sau','sen','srb','syc','sle','sgp','svk','svn','slb','som','zaf','sas','kor','ssd','esp','lka','shn','kna','lca','spm','vct','ssa','sdn','sur','swz','swe','che','syr','twn','tjk','tza','tha','tgo','tkl','ton','tto','tun','tur','tkm','tuv','uga','ukr','are','gbr','usa','umc','ury','uzb','vut','ven','vnm','vir','wlf','wbg','wld','yem','zmb','zwe'];
        var G20_ISOS = ['arg','aus','bra','can','chn','emu','eun','fra','deu','ind','idn','ita','jpn','mex','rus','sau','zaf','kor','esp','tur','gbr','usa'];
        var AFRICA_ISOS = ['dza','ago','ben','bwa','bfa','bdi','cmr','cpv','caf','tcd','com','cod','dji','egy','gnq','eri','eth','gab','gmb','gha','gin','gnb','civ','ken','lso','lbr','lby','mdg','mwi','mli','mrt','mus','myt','mar','moz','nam','ner','nga','cog','reu','rwa','stp','sen','syc','sle','som','zaf','ssd','shn','sdn','swz','tza','tgo','tun','uga','zmb','zwe'];
        var AMERICA_ISOS = ['aia','atg','arg','abw','bhs','brb','blz','bmu','bol','bra','can','cym','chl','col','cri','cub','dma','dom','ecu','slv','flk','grl','grd','gtm','guy','hti','hnd','jam','mex','msr','ant','nic','pan','pry','per','pri','kna','lca','spm','vct','sur','tto','usa','ury','ven','vir'];
        var ASIA_ISOS = ['afg','arm','aze','bhr','bgd','btn','brn','khm','chn','cxr','tls','geo','hkg','ind','idn','irn','irq','isr','jpn','jor','kaz','kwt','kgz','lao','lbn','mac','mys','mdv','mng','mmr','npl','prk','mnp','omn','pak','pse','phl','qat','sau','sgp','kor','lka','syr','twn','tjk','tha','tkm','are','uzb','vnm','wbg','yem'];
        var EUROPE_ISOS = ['alb','and','aut','blr','bel','bih','bgr','chi','hrv','cyp','cze','dnk','est','emu','eun','fro','fin','fra','deu','gib','grc','hun','isl','irl','imy','ita','unk','lva','lie','ltu','lux','mkd','mlt','mda','mco','mne','nld','nor','pol','prt','rou','rus','smr','srb','svk','svn','esp','swe','che','tur','ukr','gbr'];
        var GLOBALS = ['world', 'g20', 'africa', 'america', 'asia', 'europe'];
        
        var selected_countries_name = ['argentina', 'australia', 'brazil', 'canada', 'china', 'euro area', 'france', 'germany', 'india', 'indonesia', 'italy', 'japan', 'mexico', 'russia', 'saudi arabia', 'south africa', 'south korea', 'spain', 'turkey', 'united kingdom', 'united states'];
        
        Array.prototype.differenceTE = function (a) {
            return this.filter(function (i) { return a.indexOf(i) < 0; });
        };
        
    </script>
    
    <!-- <script>
    
    document.addEventListener('livewire:load', function () {
        
        getData();
        
    });
    
    $(document).ready(function(){
        // $('[data-toggle="datepicker"]').datepicker();
        
        $('#checkbox_with_importance').change(function() {
            if($(this).prop('checked')) {
                $('#label_checkbox_with_importance').addClass('w-56')
                $('#importance').removeClass('hidden');
            } else {
                $('#importance').addClass('hidden');
                $('#label_checkbox_with_importance').removeClass('w-56')
            }
        })
    })
    function toggleMainCountrySelection(instruction) {
        
        if (instruction && instruction == 'off') {
            $("#te-c-main-countries").addClass("hidden");
            return;
        }
        $('#dates_container').addClass('hidden');
        $("#te-c-main-countries").toggleClass("hidden");
    }
    function showDates(){
        $('#dates_container').toggleClass('hidden');
        toggleMainCountrySelection('off');
    }
    function hideDates(){
        
        toggleMainCountrySelection('off');
        $('#dates_container').addClass('hidden');
    }
    function showLoading()
    {
        $('#calendar_loader').removeClass('hidden');
    }
    function hideLoading()
    {
        $('#calendar_loader').addClass('hidden');
    }
    function setCalendarImportance(str_imptt)
    {
            $('#importance_checkbox_list').find('.importance_checkbox_input:checked').attr('checked', false)
            $(`#importance_checkbox_${str_imptt}`).attr('checked',true);
            
            showLoading();
            getData('importance',str_imptt);
    }
    
    function setCalendarDate()
    {
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        
        var api_url_by_date = 'https://api.tradingeconomics.com/calendar/country/All/'+startDate+'/'+endDate+'?c=ygprahwjzg5p8lb:io15ulm6lcs48mp';
        
        if($('#checkbox_with_importance').is(':checked'))
        {
            var importanceVal = $('#importance').val();
            console.log(importanceVal);
            
            api_url_by_date = 'https://api.tradingeconomics.com/calendar/country/All/'+startDate+'/'+endDate+'?c=ygprahwjzg5p8lb:io15ulm6lcs48mp&importance='+importanceVal;
            if(startDate == '' && endDate == '')
            {
                api_url_by_date = 'https://api.tradingeconomics.com/calendar/?c=ygprahwjzg5p8lb:io15ulm6lcs48mp&importance='+importanceVal;
            }
            
        }
        
        showLoading();
        hideDates();
        getData('dates',api_url_by_date);
    }
    
    function clearSelection(e) {
        var _options = $(".te-c-option").each(function (i, item) {
            //console.log('i', i, 'item', item);
            var _input = $(item).find('input');
            _input.prop('checked', false);
        });
        
        selected_countries = [];
    }
    
    function saveSelectionAndGO(){
        
        
        
        selected_countries_name_lower = [];
        
        selected_countries_name.map(function(cn , key)
        {
            if(cn != '')
            {
                selected_countries_name_lower.push(cn.toLowerCase());
            }
        })
        
        var api_url_by_country = 'https://api.tradingeconomics.com/calendar/country/'+selected_countries_name_lower.join(',')+'?c=ygprahwjzg5p8lb:io15ulm6lcs48mp';
        
        toggleMainCountrySelection('off');
        showLoading();
        getData('country', api_url_by_country)
    }
    
    function getData(type , value){
            
            var api_url = '';
            
            if(type == 'importance'){
                
                api_url = 'https://api.tradingeconomics.com/calendar?c=ygprahwjzg5p8lb:io15ulm6lcs48mp&importance='+value;
                
            }
            else if(type == 'dates'){
                
                api_url = value;
                
            }
            else if(type == 'country'){
                
                api_url = value;
                
            }
            else
            {
                api_url = 'https://api.tradingeconomics.com/calendar/country/new zealand,sweden,thailand,argentina,australia,brazil,canada,china,euro area,france,germany,india,indonesia,italy,japan,mexico,russia,saudi arabia,pakistan,south africa,south korea,spain,turkey,united kingdom,united states?c=ygprahwjzg5p8lb:io15ulm6lcs48mp';
            }
            
            fetch(api_url,{
                      method: "GET"
                    })
            .then(response => response.text())
            .then(function(data)
                {
                    let DataSet = JSON.parse(data);
                    console.log(DataSet);
                    
                if(DataSet.length > 0){
                    
                 
                    var htmldata = '';
                    var StartDate;
                    var CustomClass = '';
                    var cCode;
                    
                    
                    DataSet.map(function(item , key){
                        
                        let temp = 0;
                        let countryCode = getCCode(item.Country) ;
                            if(countryCode.length > 0)
                            {
                                cCode = countryCode[0].Code.toLowerCase(); 
                            }else{
                                cCode = item.Country.toLowerCase();
                            }
                        
                        if(item.Importance == 2)
                        {
                            CustomClass = 'calendar-date-1 font-extrabold text-gray-300';
                        }
                        else if(item.Importance == 3){
                            CustomClass = 'bg-red-800 calendar-date-1 font-extrabold px-1 py-0.5 text-gray-300';
                        }
                        else
                        {
                            CustomClass = 'calendar-date-1';
                        }
                        
                        if(key == 0)
                        {
                            htmldata += `<thead class="bg-gray-700 dark:bg-gray-700">
                                            <tr style="white-space: nowrap">
                                                <th colspan="3" class="py-3 px-6 text-lg text-left font-medium tracking-wider text-left text-gray-200 uppercase dark:text-gray-400">
                                                    ${ moment(item.Date).format("dddd, MMMM Do YYYY") }
                                                </th>
                                                <th class="py-3 px-2 text-xs font-medium tracking-wider text-left text-gray-200 uppercase dark:text-gray-400" style="min-width: 75px;">
                                                    Actual</th>
                                                <th class="py-3 px-2 text-xs font-medium tracking-wider text-left text-gray-200 uppercase dark:text-gray-400" style="min-width: 75px;">
                                                    Previous</th>
                                                <th class="py-3 px-2 text-xs font-medium tracking-wider text-left text-gray-200 uppercase dark:text-gray-400">
                                                    Consensus</th>
                                                <th class="py-3 px-2 text-xs font-medium tracking-wider text-left text-gray-200 uppercase dark:text-gray-400">
                                                    Forecast</th>
                                                <th></th>
                                                <th class="hidden-sm hidden-xs"></th>
                                            </tr>
                                        </thead>`;
                                        
                            htmldata += `<tbody>
                                        <tr class="border-b border-gray-600 dark:bg-gray-800 dark:border-gray-700" data-url="${item.URL}" data-id="${item.CalendarId}" data-country="${item.Country.toLowerCase()}" data-category="${item.Category.toLowerCase()}" data-event="${item.Event.toLowerCase()}" data-symbol="${item.Symbol}">
                
                                    <td style="white-space: nowrap;" class="py-4 px-2 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        <span class="${CustomClass}">
                                            
                                            ${ moment(item.Date).format("hh:mm A") }
                                        </span>
                                    </td>
                                    <td class="calendar-item" style="white-space: nowrap" class="py-4 px-2 text-sm text-gray-100 whitespace-nowrap dark:text-gray-400">
                                        <table style="padding: 0px;">
                                            <tbody><tr>
                                                <td style="padding-left: 5px;">
                                                    <div title="${item.Country}" class="flag flag-${ cCode }"></div>
                                                </td>
                                                <td title="${ cCode }" style="padding-left: 5px;" class="calendar-iso text-gray-100">${ cCode }</td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                    <td style="max-width: 250px; overflow-x: hidden;" class="py-4 px-2 text-md font-semibold text-gray-100 whitespace-nowrap dark:text-white">
                                        ${ item.Event } <span>${ item.Reference.toUpperCase() }</span>
                                    </td>
                                    <td class="calendar-item calendar-item-positive py-4 px-2 text-sm text-gray-100 whitespace-nowrap dark:text-gray-400">
                                        
                                        <span id="actual"></span>
                                        
                                         
                                    </td>
                                    <td class="calendar-item calendar-item-positive py-4 px-2 text-sm text-gray-100 whitespace-nowrap dark:text-gray-400">
                                        ${ item.Previous }
                                    </td>
                                    <td class="calendar-item calendar-item-positive py-4 px-2 text-sm text-gray-100 whitespace-nowrap dark:text-gray-400">
                                        ${ item.Forecast }
                                    </td>
                                    <td class="calendar-item calendar-item-positive py-4 px-2 text-sm text-gray-100 whitespace-nowrap dark:text-gray-400">
                                        ${ item.TEForecast }
                                    </td>
                                </tr>`;
                                
                                temp++;
                        }
                        if(key > 0 && moment(item.Date).format('YYYY-MM-DD') != StartDate && item.CalendarId != "")
                        {
                            
                            htmldata += `<thead class="bg-gray-700 dark:bg-gray-700">
                                            <tr style="white-space: nowrap">
                                                <th colspan="3" class="py-3 px-6 text-lg text-left font-medium tracking-wider text-left text-gray-200 uppercase dark:text-gray-400">
                                                    ${ moment(item.Date).format("dddd, MMMM Do YYYY") }
                                                </th>
                                                <th class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase dark:text-gray-400" style="min-width: 75px;">
                                                    Actual</th>
                                                <th class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase dark:text-gray-400" style="min-width: 75px;">
                                                    Previous</th>
                                                <th class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase dark:text-gray-400">
                                                    Consensus</th>
                                                <th class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase dark:text-gray-400">
                                                    Forecast</th>
                                                <th></th>
                                                <th class="hidden-sm hidden-xs"></th>
                                            </tr>
                                        </thead>`;
                                        
                                htmldata += `<tbody>
                                        <tr class="border-b border-gray-600 dark:bg-gray-800 dark:border-gray-700" data-url="${item.URL}" data-id="${item.CalendarId}" data-country="${item.Country.toLowerCase()}" data-category="${item.Category.toLowerCase()}" data-event="${item.Event.toLowerCase()}" data-symbol="${item.Symbol}">
                
                                    <td style="white-space: nowrap;" class="py-4 px-2 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        <span class="${CustomClass}">
                                            
                                            ${ moment(item.Date).format("hh:mm A") }
                                        </span>
                                    </td>
                                    <td class="calendar-item" style="white-space: nowrap" class="py-4 px-2 text-sm text-gray-100 whitespace-nowrap dark:text-gray-400">
                                        <table style="padding: 0px;">
                                            <tbody><tr>
                                                <td style="padding-left: 5px;">
                                                    <div title="${item.Country}" class="flag flag-${ cCode }"></div>
                                                </td>
                                                <td title="${ cCode }" style="padding-left: 5px;" class="calendar-iso text-gray-100">${ cCode }</td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                    <td style="max-width: 250px; overflow-x: hidden;" class="py-4 px-2 text-md font-semibold text-gray-100 whitespace-nowrap dark:text-white">
                                        ${ item.Event } <span>${ item.Reference.toUpperCase() }</span>
                                    </td>
                                    <td class="calendar-item calendar-item-positive py-4 px-2 text-sm text-gray-100 whitespace-nowrap dark:text-gray-400">
                                        
                                        <span id="actual"></span>
                                        
                                         
                                    </td>
                                    <td class="calendar-item calendar-item-positive py-4 px-2 text-sm text-gray-100 whitespace-nowrap dark:text-gray-400">
                                        ${ item.Previous }
                                    </td>
                                    <td class="calendar-item calendar-item-positive py-4 px-2 text-sm text-gray-100 whitespace-nowrap dark:text-gray-400">
                                        ${ item.Forecast }
                                    </td>
                                    <td class="calendar-item calendar-item-positive py-4 px-2 text-sm text-gray-100 whitespace-nowrap dark:text-gray-400">
                                        ${ item.TEForecast }
                                    </td>
                                </tr>`;
                                temp++;
                        }
                        
                        if(temp == 0 && item.CalendarId != "")
                        {
                            htmldata += `<tr class="border-b border-gray-600 dark:bg-gray-800 dark:border-gray-700" data-url="${item.URL}" data-id="${item.CalendarId}" data-country="${item.Country.toLowerCase()}" data-category="${item.Category.toLowerCase()}" data-event="${item.Event.toLowerCase()}" data-symbol="${item.Symbol}">
                    
                                        <td style="white-space: nowrap;" class="py-4 px-2 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            <span class="${CustomClass}">
                                                
                                                ${ moment(item.Date).format("hh:mm A") }
                                            </span>
                                        </td>
                                        <td class="calendar-item" style="white-space: nowrap" class="py-4 px-2 text-sm text-gray-100 whitespace-nowrap dark:text-gray-400">
                                            <table style="padding: 0px;">
                                                <tbody><tr>
                                                    <td style="padding-left: 5px;">
                                                        <div title="${item.Country}" class="flag flag-${ cCode }"></div>
                                                    </td>
                                                    <td title="${ cCode }" style="padding-left: 5px;" class="calendar-iso text-gray-100">${ cCode }</td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                        <td style="max-width: 250px; overflow-x: hidden;" class="py-4 px-2 text-md font-semibold text-gray-100 whitespace-nowrap dark:text-white">
                                            ${ item.Event } <span>${ item.Reference.toUpperCase() }</span>
                                        </td>
                                        <td class="calendar-item calendar-item-positive py-4 px-2 text-sm text-gray-100 whitespace-nowrap dark:text-gray-400">
                                            
                                            <span id="actual"></span>
                                            
                                             
                                        </td>
                                        <td class="calendar-item calendar-item-positive py-4 px-2 text-sm text-gray-100 whitespace-nowrap dark:text-gray-400">
                                            ${ item.Previous }
                                        </td>
                                        <td class="calendar-item calendar-item-positive py-4 px-2 text-sm text-gray-100 whitespace-nowrap dark:text-gray-400">
                                            ${ item.Forecast }
                                        </td>
                                        <td class="calendar-item calendar-item-positive py-4 px-2 text-sm text-gray-100 whitespace-nowrap dark:text-gray-400">
                                            ${ item.TEForecast }
                                        </td>
                                    </tr>`;
                        }
                        else
                        {
                            
                            if(key != 0 && item.CalendarId != "" && moment(item.Date).format('YYYY-MM-DD') == StartDate)
                            {
                                htmldata += `</tbody>`;
                            }
                        }
                        
                        StartDate  = moment(item.Date).format('YYYY-MM-DD');
                        
                        $('#financial_table').empty().html(htmldata);
                        
                        hideLoading();
                        
                    })
                }
                else
                {
                    toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": true,
                      "progressBar": true,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "3000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    }
                    
                    toastr.info('No Data Found');
                    
                    hideLoading();
                   
                }
                
                });
            
        }
        
    function calendarSelecting(dom, e, _c, isGlobal) {
        //console.log('arguments', arguments);
        e.stopPropagation();
        e.preventDefault();
        if (isGlobal) {
            clearSelection();
            selected_countries = [];
            selected_countries_name = [];
            switch (_c.toUpperCase()) {
                case 'G20':
                    selected_countries = G20_ISOS.slice();
                    break;
                case 'WORLD':
                    //console.log('SELECT', WORLD_ISOS);
                    selected_countries = WORLD_ISOS.slice();
                    break;
                case 'AFRICA':
                    selected_countries = AFRICA_ISOS.slice();
                    break;
                case 'ASIA':
                    selected_countries = ASIA_ISOS.slice();
                    break;
                case 'AMERICA':
                    selected_countries = AMERICA_ISOS.slice();
                    break;
                case 'EUROPE':
                    selected_countries = EUROPE_ISOS.slice();
                    break;
                default:
                    console.log('uncaught:', _c);
            }
            
            for (var wi in selected_countries) {
                // console.log('SELECT:', selected_countries[wi]);
                if (typeof selected_countries[wi] != 'string') {
                    continue;
                }
                
                // console.log($('.te-c-option-' + WORLD_ISOS[wi]).length);
                if ($('.te-c-option-' + selected_countries[wi]).length) {
                    var _input = $('.te-c-option-' + selected_countries[wi]).find('input');
                    _input.prop('checked', true);
                    
                    var _inputText = $('.te-c-option-' + selected_countries[wi]).find('a');
                    
                    if(_inputText.length > 0)
                    {
                        selected_countries_name.push(_inputText.text());    
                    }
                }
            }

        }

        var _input = $(dom).find('input');
        var _inputText = $(dom).find('a');
        
        console.log(_inputText);
        
        selected_countries_name.push(_inputText.text());
        
        var c = '';
        if (_c) {
            c = _c.toLowerCase();
        }
        if (selected_countries.indexOf(c) > -1) {
            selected_countries.splice(selected_countries.indexOf(c), 1);
            setTimeout(function(){_input.prop('checked', false)},100);
        } else {
            if (!isGlobal) {
                selected_countries.push(c);
                setTimeout(function () { _input.prop('checked', true) }, 100);
            }
        }

        highlightGroupsSelection();
    }

    function highlightGroupsSelection(){
        //console.log('G20', selected_countries.differenceTE(G20_ISOS).length, G20_ISOS.differenceTE(selected_countries).length)
        if (selected_countries.differenceTE(G20_ISOS).length == 0 && selected_countries.differenceTE(G20_ISOS).length == G20_ISOS.differenceTE(selected_countries).length) {
            $(".te-c-option-g20").addClass("te-c-group-selected");
        } else {
            $(".te-c-option-g20").removeClass("te-c-group-selected");
        }

        if (selected_countries.differenceTE(WORLD_ISOS).length == 0 && selected_countries.differenceTE(WORLD_ISOS).length == WORLD_ISOS.differenceTE(selected_countries).length) {
            $(".te-c-option-world").addClass("te-c-group-selected");
        } else {
            $(".te-c-option-world").removeClass("te-c-group-selected");
        }

        if (selected_countries.differenceTE(AFRICA_ISOS).length == 0 && selected_countries.differenceTE(AFRICA_ISOS).length == AFRICA_ISOS.differenceTE(selected_countries).length) {
            $(".te-c-option-africa").addClass("te-c-group-selected");
        } else {
            $(".te-c-option-africa").removeClass("te-c-group-selected");
        }

        if (selected_countries.differenceTE(AMERICA_ISOS).length == 0 && selected_countries.differenceTE(AMERICA_ISOS).length == AMERICA_ISOS.differenceTE(selected_countries).length) {
            $(".te-c-option-america").addClass("te-c-group-selected");
        } else {
            $(".te-c-option-america").removeClass("te-c-group-selected");
        }

        if (selected_countries.differenceTE(ASIA_ISOS).length == 0 && selected_countries.differenceTE(ASIA_ISOS).length == ASIA_ISOS.differenceTE(selected_countries).length) {
            $(".te-c-option-asia").addClass("te-c-group-selected");
        } else {
            $(".te-c-option-asia").removeClass("te-c-group-selected");
        }

        if (selected_countries.differenceTE(EUROPE_ISOS).length == 0 && selected_countries.differenceTE(EUROPE_ISOS).length == EUROPE_ISOS.differenceTE(selected_countries).length) {
            $(".te-c-option-europe").addClass("te-c-group-selected");
        } else {
            $(".te-c-option-europe").removeClass("te-c-group-selected");
        }
    }
    
    function getCCode(param){
        
        var codesStr = `[{"Code": "AF", "Name": "Afghanistan"},{"Code": "AX", "Name": "\u00c5land Islands"},{"Code": "AL", "Name": "Albania"},{"Code": "DZ", "Name": "Algeria"},{"Code": "AS", "Name": "American Samoa"},{"Code": "AD", "Name": "Andorra"},{"Code": "AO", "Name": "Angola"},{"Code": "AI", "Name": "Anguilla"},{"Code": "AQ", "Name": "Antarctica"},{"Code": "AG", "Name": "Antigua and Barbuda"},{"Code": "AR", "Name": "Argentina"},{"Code": "AM", "Name": "Armenia"},{"Code": "AW", "Name": "Aruba"},{"Code": "AU", "Name": "Australia"},{"Code": "AT", "Name": "Austria"},{"Code": "AZ", "Name": "Azerbaijan"},{"Code": "BS", "Name": "Bahamas"},{"Code": "BH", "Name": "Bahrain"},{"Code": "BD", "Name": "Bangladesh"},{"Code": "BB", "Name": "Barbados"},{"Code": "BY", "Name": "Belarus"},{"Code": "BE", "Name": "Belgium"},{"Code": "BZ", "Name": "Belize"},{"Code": "BJ", "Name": "Benin"},{"Code": "BM", "Name": "Bermuda"},{"Code": "BT", "Name": "Bhutan"},{"Code": "BO", "Name": "Bolivia, Plurinational State of"},{"Code": "BQ", "Name": "Bonaire, Sint Eustatius and Saba"},{"Code": "BA", "Name": "Bosnia and Herzegovina"},{"Code": "BW", "Name": "Botswana"},{"Code": "BV", "Name": "Bouvet Island"},{"Code": "BR", "Name": "Brazil"},{"Code": "IO", "Name": "British Indian Ocean Territory"},{"Code": "BN", "Name": "Brunei Darussalam"},{"Code": "BG", "Name": "Bulgaria"},{"Code": "BF", "Name": "Burkina Faso"},{"Code": "BI", "Name": "Burundi"},{"Code": "KH", "Name": "Cambodia"},{"Code": "CM", "Name": "Cameroon"},{"Code": "CA", "Name": "Canada"},{"Code": "CV", "Name": "Cape Verde"},{"Code": "KY", "Name": "Cayman Islands"},{"Code": "CF", "Name": "Central African Republic"},{"Code": "TD", "Name": "Chad"},{"Code": "CL", "Name": "Chile"},{"Code": "CN", "Name": "China"},{"Code": "CX", "Name": "Christmas Island"},{"Code": "CC", "Name": "Cocos (Keeling) Islands"},{"Code": "CO", "Name": "Colombia"},{"Code": "KM", "Name": "Comoros"},{"Code": "CG", "Name": "Congo"},{"Code": "CD", "Name": "Congo, the Democratic Republic of the"},{"Code": "CK", "Name": "Cook Islands"},{"Code": "CR", "Name": "Costa Rica"},{"Code": "CI", "Name": "C\u00f4te d'Ivoire"},{"Code": "HR", "Name": "Croatia"},{"Code": "CU", "Name": "Cuba"},{"Code": "CW", "Name": "Cura\u00e7ao"},{"Code": "CY", "Name": "Cyprus"},{"Code": "CZ", "Name": "Czech Republic"},{"Code": "DK", "Name": "Denmark"},{"Code": "DJ", "Name": "Djibouti"},{"Code": "DM", "Name": "Dominica"},{"Code": "DO", "Name": "Dominican Republic"},{"Code": "EC", "Name": "Ecuador"},{"Code": "EG", "Name": "Egypt"},{"Code": "SV", "Name": "El Salvador"},{"Code": "GQ", "Name": "Equatorial Guinea"},{"Code": "ER", "Name": "Eritrea"},{"Code": "EE", "Name": "Estonia"},{"Code": "ET", "Name": "Ethiopia"},{"Code": "FK", "Name": "Falkland Islands (Malvinas)"},{"Code": "FO", "Name": "Faroe Islands"},{"Code": "FJ", "Name": "Fiji"},{"Code": "FI", "Name": "Finland"},{"Code": "FR", "Name": "France"},{"Code": "GF", "Name": "French Guiana"},{"Code": "PF", "Name": "French Polynesia"},{"Code": "TF", "Name": "French Southern Territories"},{"Code": "GA", "Name": "Gabon"},{"Code": "GM", "Name": "Gambia"},{"Code": "GE", "Name": "Georgia"},{"Code": "DE", "Name": "Germany"},{"Code": "GH", "Name": "Ghana"},{"Code": "GI", "Name": "Gibraltar"},{"Code": "GR", "Name": "Greece"},{"Code": "GL", "Name": "Greenland"},{"Code": "GD", "Name": "Grenada"},{"Code": "GP", "Name": "Guadeloupe"},{"Code": "GU", "Name": "Guam"},{"Code": "GT", "Name": "Guatemala"},{"Code": "GG", "Name": "Guernsey"},{"Code": "GN", "Name": "Guinea"},{"Code": "GW", "Name": "Guinea-Bissau"},{"Code": "GY", "Name": "Guyana"},{"Code": "HT", "Name": "Haiti"},{"Code": "HM", "Name": "Heard Island and McDonald Islands"},{"Code": "VA", "Name": "Holy See (Vatican City State)"},{"Code": "HN", "Name": "Honduras"},{"Code": "HK", "Name": "Hong Kong"},{"Code": "HU", "Name": "Hungary"},{"Code": "IS", "Name": "Iceland"},{"Code": "IN", "Name": "India"},{"Code": "ID", "Name": "Indonesia"},{"Code": "IR", "Name": "Iran, Islamic Republic of"},{"Code": "IQ", "Name": "Iraq"},{"Code": "IE", "Name": "Ireland"},{"Code": "IM", "Name": "Isle of Man"},{"Code": "IL", "Name": "Israel"},{"Code": "IT", "Name": "Italy"},{"Code": "JM", "Name": "Jamaica"},{"Code": "JP", "Name": "Japan"},{"Code": "JE", "Name": "Jersey"},{"Code": "JO", "Name": "Jordan"},{"Code": "KZ", "Name": "Kazakhstan"},{"Code": "KE", "Name": "Kenya"},{"Code": "KI", "Name": "Kiribati"},{"Code": "KP", "Name": "Korea, Democratic People's Republic of"},{"Code": "KR", "Name": "Korea, Republic of"},{"Code": "KW", "Name": "Kuwait"},{"Code": "KG", "Name": "Kyrgyzstan"},{"Code": "LA", "Name": "Lao People's Democratic Republic"},{"Code": "LV", "Name": "Latvia"},{"Code": "LB", "Name": "Lebanon"},{"Code": "LS", "Name": "Lesotho"},{"Code": "LR", "Name": "Liberia"},{"Code": "LY", "Name": "Libya"},{"Code": "LI", "Name": "Liechtenstein"},{"Code": "LT", "Name": "Lithuania"},{"Code": "LU", "Name": "Luxembourg"},{"Code": "MO", "Name": "Macao"},{"Code": "MK", "Name": "Macedonia, the Former Yugoslav Republic of"},{"Code": "MG", "Name": "Madagascar"},{"Code": "MW", "Name": "Malawi"},{"Code": "MY", "Name": "Malaysia"},{"Code": "MV", "Name": "Maldives"},{"Code": "ML", "Name": "Mali"},{"Code": "MT", "Name": "Malta"},{"Code": "MH", "Name": "Marshall Islands"},{"Code": "MQ", "Name": "Martinique"},{"Code": "MR", "Name": "Mauritania"},{"Code": "MU", "Name": "Mauritius"},{"Code": "YT", "Name": "Mayotte"},{"Code": "MX", "Name": "Mexico"},{"Code": "FM", "Name": "Micronesia, Federated States of"},{"Code": "MD", "Name": "Moldova, Republic of"},{"Code": "MC", "Name": "Monaco"},{"Code": "MN", "Name": "Mongolia"},{"Code": "ME", "Name": "Montenegro"},{"Code": "MS", "Name": "Montserrat"},{"Code": "MA", "Name": "Morocco"},{"Code": "MZ", "Name": "Mozambique"},{"Code": "MM", "Name": "Myanmar"},{"Code": "NA", "Name": "Namibia"},{"Code": "NR", "Name": "Nauru"},{"Code": "NP", "Name": "Nepal"},{"Code": "NL", "Name": "Netherlands"},{"Code": "NC", "Name": "New Caledonia"},{"Code": "NZ", "Name": "New Zealand"},{"Code": "NI", "Name": "Nicaragua"},{"Code": "NE", "Name": "Niger"},{"Code": "NG", "Name": "Nigeria"},{"Code": "NU", "Name": "Niue"},{"Code": "NF", "Name": "Norfolk Island"},{"Code": "MP", "Name": "Northern Mariana Islands"},{"Code": "NO", "Name": "Norway"},{"Code": "OM", "Name": "Oman"},{"Code": "PK", "Name": "Pakistan"},{"Code": "PW", "Name": "Palau"},{"Code": "PS", "Name": "Palestine, State of"},{"Code": "PA", "Name": "Panama"},{"Code": "PG", "Name": "Papua New Guinea"},{"Code": "PY", "Name": "Paraguay"},{"Code": "PE", "Name": "Peru"},{"Code": "PH", "Name": "Philippines"},{"Code": "PN", "Name": "Pitcairn"},{"Code": "PL", "Name": "Poland"},{"Code": "PT", "Name": "Portugal"},{"Code": "PR", "Name": "Puerto Rico"},{"Code": "QA", "Name": "Qatar"},{"Code": "RE", "Name": "R\u00e9union"},{"Code": "RO", "Name": "Romania"},{"Code": "RU", "Name": "Russian Federation"},{"Code": "RW", "Name": "Rwanda"},{"Code": "BL", "Name": "Saint Barth\u00e9lemy"},{"Code": "SH", "Name": "Saint Helena, Ascension and Tristan da Cunha"},{"Code": "KN", "Name": "Saint Kitts and Nevis"},{"Code": "LC", "Name": "Saint Lucia"},{"Code": "MF", "Name": "Saint Martin (French part)"},{"Code": "PM", "Name": "Saint Pierre and Miquelon"},{"Code": "VC", "Name": "Saint Vincent and the Grenadines"},{"Code": "WS", "Name": "Samoa"},{"Code": "SM", "Name": "San Marino"},{"Code": "ST", "Name": "Sao Tome and Principe"},{"Code": "SA", "Name": "Saudi Arabia"},{"Code": "SN", "Name": "Senegal"},{"Code": "RS", "Name": "Serbia"},{"Code": "SC", "Name": "Seychelles"},{"Code": "SL", "Name": "Sierra Leone"},{"Code": "SG", "Name": "Singapore"},{"Code": "SX", "Name": "Sint Maarten (Dutch part)"},{"Code": "SK", "Name": "Slovakia"},{"Code": "SI", "Name": "Slovenia"},{"Code": "SB", "Name": "Solomon Islands"},{"Code": "SO", "Name": "Somalia"},{"Code": "ZA", "Name": "South Africa"},{"Code": "GS", "Name": "South Georgia and the South Sandwich Islands"},{"Code": "SS", "Name": "South Sudan"},{"Code": "ES", "Name": "Spain"},{"Code": "LK", "Name": "Sri Lanka"},{"Code": "SD", "Name": "Sudan"},{"Code": "SR", "Name": "Suriname"},{"Code": "SJ", "Name": "Svalbard and Jan Mayen"},{"Code": "SZ", "Name": "Swaziland"},{"Code": "SE", "Name": "Sweden"},{"Code": "CH", "Name": "Switzerland"},{"Code": "SY", "Name": "Syrian Arab Republic"},{"Code": "TW", "Name": "Taiwan, Province of China"},{"Code": "TJ", "Name": "Tajikistan"},{"Code": "TZ", "Name": "Tanzania, United Republic of"},{"Code": "TH", "Name": "Thailand"},{"Code": "TL", "Name": "Timor-Leste"},{"Code": "TG", "Name": "Togo"},{"Code": "TK", "Name": "Tokelau"},{"Code": "TO", "Name": "Tonga"},{"Code": "TT", "Name": "Trinidad and Tobago"},{"Code": "TN", "Name": "Tunisia"},{"Code": "TR", "Name": "Turkey"},{"Code": "TM", "Name": "Turkmenistan"},{"Code": "TC", "Name": "Turks and Caicos Islands"},{"Code": "TV", "Name": "Tuvalu"},{"Code": "UG", "Name": "Uganda"},{"Code": "UA", "Name": "Ukraine"},{"Code": "AE", "Name": "United Arab Emirates"},{"Code": "GB", "Name": "United Kingdom"},{"Code": "US", "Name": "United States"},{"Code": "UM", "Name": "United States Minor Outlying Islands"},{"Code": "UY", "Name": "Uruguay"},{"Code": "UZ", "Name": "Uzbekistan"},{"Code": "VU", "Name": "Vanuatu"},{"Code": "VE", "Name": "Venezuela, Bolivarian Republic of"},{"Code": "VN", "Name": "Viet Nam"},{"Code": "VG", "Name": "Virgin Islands, British"},{"Code": "VI", "Name": "Virgin Islands, U.S."},{"Code": "WF", "Name": "Wallis and Futuna"},{"Code": "EH", "Name": "Western Sahara"},{"Code": "YE", "Name": "Yemen"},{"Code": "ZM", "Name": "Zambia"},{"Code": "ZW", "Name": "Zimbabwe"}]`;
        
        var codesArr = JSON.parse(codesStr);
        return codesArr.filter(v => v.Name === `${param}`);
        
    }
    </script> -->
    
    
</div>