<div>
    <div class="bar searchsymbol" wire:click="toggleSearch">
        <div class="grid grid-cols-2 gap-0 text-white d-flex items-center">
            <div class="symbol-search-desc text-uppercase">
                {{$currentViewSymbol->symbol->description}}
            </div>
            <div class="symbol-search-select text-bas">
                Select Market @if($show)
                    <svg viewBox="0 0 4 2" class="w-5 h-3">
                        <path fill="currentColor" style="transform: rotate(180deg); transform-origin: 40% 42%;"
                              fill-rule="nonzero"
                              d="M1.07300728,1.20793804 C1.11655333,1.20649597 1.15805215,1.18910636 1.18961767,1.15907377 L2.07805888,0.30617235 C2.1489002,0.238090554 2.15113725,0.125471111 2.08305546,0.0546297783 C2.01497367,-0.0162115547 1.90235423,-0.01844861 1.83151289,0.0496331753 L1.06634397,0.783707365 L0.301175756,0.0496331753 C0.230334418,-0.01844861 0.117714976,-0.0162115547 0.049633185,0.0546297783 C-0.0184486059,0.125471111 -0.0162115594,0.238090554 0.0546297682,0.30617235 L0.943070973,1.15907377 C0.977966554,1.19230519 1.02486148,1.20994064 1.07300728,1.20793804 L1.07300728,1.20793804 Z"
                              transform="translate(.994 .396)"/>
                    </svg>
                @else
                    <svg viewBox="0 0 4 2" class="w-5 h-3">
                        <path fill="currentColor" fill-rule="nonzero"
                              d="M1.07300728,1.20793804 C1.11655333,1.20649597 1.15805215,1.18910636 1.18961767,1.15907377 L2.07805888,0.30617235 C2.1489002,0.238090554 2.15113725,0.125471111 2.08305546,0.0546297783 C2.01497367,-0.0162115547 1.90235423,-0.01844861 1.83151289,0.0496331753 L1.06634397,0.783707365 L0.301175756,0.0496331753 C0.230334418,-0.01844861 0.117714976,-0.0162115547 0.049633185,0.0546297783 C-0.0184486059,0.125471111 -0.0162115594,0.238090554 0.0546297682,0.30617235 L0.943070973,1.15907377 C0.977966554,1.19230519 1.02486148,1.20994064 1.07300728,1.20793804 L1.07300728,1.20793804 Z"
                              transform="translate(.994 .396)"/>
                    </svg>
                @endif
            </div>
        </div>
    </div>

    @if($show)
        <div class="bg-gray-900 text-white submenu"
             style="width:100%;max-width: 450px; position: absolute; z-index: 2; height:calc(100vh - 158px); top: 126.5px;">
            <input type="text" class="form-input search" wire:model="searchTerm"/>
            <div class="grid grid-cols-7 gap-3">
                <div class="symbolsearch-tab @if($selectedType == 'fav') active @endif" wire:click="showType('fav')">
                    fav
                </div>
                <div class="symbolsearch-tab @if($selectedType == 'all') active @endif" wire:click="showType('all')">
                    all
                </div>
                <div class="symbolsearch-tab @if($selectedType == 'sto') active @endif" wire:click="showType('sto')">
                    sto
                </div>
                <div class="symbolsearch-tab @if($selectedType == 'com') active @endif" wire:click="showType('com')">
                    com
                </div>
                <div class="symbolsearch-tab @if($selectedType == 'ind') active @endif" wire:click="showType('ind')">
                    ind
                </div>
                <div class="symbolsearch-tab @if($selectedType == 'frx') active @endif" wire:click="showType('frx')">
                    frx
                </div>
                <div class="symbolsearch-tab @if($selectedType == 'cry') active @endif" wire:click="showType('cry')">
                    cry
                </div>
            </div>
            <ul style="height: calc(100vh - 275px); overflow: hidden; overflow-y: scroll; padding-top: 0px !important;margin-top: 15px !important;">
                @if($selectedType == 'fav')
                    @foreach($userSymbols as $symbol)
                        <li wire:click="addActiveSymbol({{$symbol->symbol_id}})" class="cursor-pointer">
                            <div class="grid grid-cols-8 gap-0 text-white search-symbol-row">
                                <div class="col-start-1 col-end-6">
                                    {{$symbol->symbol->description}}
                                </div>
                                <div class="col-start-7 col-end-7 text-right">
                                    @if($symbol->favorite)
                                        <a wire:click="removeSymbolFromFavorites({{$symbol->symbol_id}})" class="symbol-search-fav">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                                                 viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        </a>
                                    @else
                                        <a wire:click="addSymbolToFavorites({{$symbol->symbol_id}})" class="symbol-search-fav">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                                <div class="col-start-8 col-end-8 text-right">
                                    @if($symbol->active)
                                        <a wire:click="addActiveSymbol({{$symbol->symbol_id}})" class="symbol-search-eye">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                                                 viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                <path fill-rule="evenodd"
                                                      d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </a>
                                    @else
                                        <a wire:click="addActiveSymbol({{$symbol->symbol_id}})" class="symbol-search-eye">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    @foreach($symbols as $symbol)
                        <li wire:click="addActiveSymbol({{$symbol->id}})" class="cursor-pointer">
                            <div class="grid grid-cols-8 gap-0 text-white search-symbol-row">
                                <div class="col-start-1 col-end-6">
                                    {{$symbol->description}}
                                </div>
                                <div class="col-start-7 col-end-7 text-right">
                                    <a wire:click="addSymbolToFavorites({{$symbol->id}})" class="symbol-search-fav">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="col-start-8 col-end-8 text-right">
                                    <a wire:click="addActiveSymbol({{$symbol->id}})" class="symbol-search-eye">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    @endif
</div>
