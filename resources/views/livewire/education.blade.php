@section('style')
<style>
.education_main_category_img{
    width: 100% !important;
    height: 243px !important;
}
.education_main_category_video{
    width: 100% !important;
    height: 243px !important;
}
.video_play_button{
    position: absolute;
    display: block;
    height: 40px;
    width: 40px;
    top: 46%;
    left: 50%;
    margin: -20px 0 0 -20px;
}

.ytp-large-play-button-bg{
    fill: #212121;
    fill-opacity: .8;
}
</style>
@endsection
<div>
    <section class="py-10 px-4 sm:px-6 lg:px-8" x-data="{ showModal1: false }">
        @if($educationCategory)
        <div class="container mx-auto mb-4 space-y-2 lg:space-y-0 lg:gap-4 lg:grid lg:grid-cols-3">
            <div class="w-full">
                <a wire:click="showTechnical" class="no-underline cursor-pointer">
                    <img class="rounded-t-lg shadow-md education_main_category_img" src="{{ asset('storage/technicalanalysis.jpeg')}}" alt="Technical Analysis" />
                    <div class="bg-gray-800 px-4 py-3 rounded-b-lg text-center text-gray-200">
                        <h2 class="font-normal text-2xl text-gray-100">Technical Analysis</h2>
                    </div>
                </a>
            </div>
            <div class="w-full">
                <a wire:click="showFundamental" class="no-underline cursor-pointer">
                    <img class="rounded-t-lg shadow-md education_main_category_img" src="{{ asset('storage/fundamentalanalysis.jpeg')}}" alt="Fundamental Analysis" />
                    <div class="bg-gray-800 px-4 py-3 rounded-b-lg text-center text-gray-200">
                        <h2 class="font-normal text-2xl text-gray-100">Fundamental Analysis</h2>
                    </div>
                </a>
            </div>
            <div class="w-full">
                <a wire:click="showRisk" class="no-underline cursor-pointer">
                    <img class="rounded-t-lg shadow-md education_main_category_img" src="{{ asset('storage/riskmanagement.jpeg')}}" alt="Risk Management" />
                    <div class="bg-gray-800 px-4 py-3 rounded-b-lg text-center text-gray-200">
                        <h2 class="font-normal text-2xl text-gray-100">Risk Management</h2>
                    </div>
                </a>
            </div>
        </div>
        @endif
        @if($technicalCategory || $fundamentalCategory || $riskCategory)
        <button wire:click="goBack" class="bg-gray-800 border border-gray-700 focus:outline-none font-medium inline-flex items-center mb-3 p-2 rounded-lg text-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="15" height="15"
                viewBox="0 0 171 171"
                style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,171.99544v-171.99544h171.99544v171.99544z" fill="none"></path><g fill="#ffffff"><path d="M120.23438,17.01094c-2.56759,-0.08915 -5.09003,0.69151 -7.1584,2.21543l-79.8,57c-2.99303,2.14051 -4.76897,5.59396 -4.76897,9.27363c0,3.67967 1.77594,7.13313 4.76897,9.27363l79.8,57c3.30735,2.50951 7.71739,3.02283 11.51272,1.34006c3.79532,-1.68277 6.37592,-5.2956 6.73681,-9.43153c0.36089,-4.13593 -1.55497,-8.14112 -5.00148,-10.45579l-66.81914,-47.72637l66.81914,-47.72637c4.03511,-2.79822 5.82529,-7.86567 4.44329,-12.57759c-1.382,-4.71192 -5.62566,-8.00966 -10.53294,-8.1851z"></path></g></g>
            </svg>
            Go Back
        </button>
        
        <div class="container mx-auto grid grid-cols-1 gap-4 md:grid-cols-2 lg:space-y-0 lg:gap-4 lg:grid lg:grid-cols-4">
            <span @click="showModal1 = true" id="showModalTrue" class="hidden"></span>
        @foreach($educationData as $key => $data)
            <div class="w-full relative">
                <span onclick="showModals('video_data_{{ $key }}')" data-video="{{ json_encode($data) }}" class="no-underline cursor-pointer" id="video_data_{{$key}}">
                
                    <!-- <iframe class="rounded-t-lg shadow-md education_main_category_video"
                            src="https://youtu.be/tWvnAfT4yAk">
                    </iframe> -->
                    <svg class="video_play_button" height="100%" version="1.1" viewBox="0 0 68 48" width="100%"><path class="ytp-large-play-button-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" fill="#f00"></path><path d="M 45,24 27,14 27,34" fill="#fff"></path></svg>
                    <!-- <img class="video_play_button" src="{{ asset('play-button-svgrepo-com.svg') }}" /> -->
                    <img src="{{ asset($data['srcId']).'.jpg' }}" class="rounded-t-lg shadow-md education_main_category_img"/>
                    <div class="bg-gray-800 px-4 py-3 rounded-b-lg text-center text-gray-200">
                        <h2 class="font-normal text-base text-gray-100">{{ $data['title'] }}</h2>
                    </div>
                </span>
            </div>
        @endforeach
            
                <span id="showModalFalse" @click="showModal1 = false" class="hidden"></span>
        </div>
        @endif
        <!-- Modal1 -->
        <div
        class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-90 duration-300 overflow-y-auto @if($educationCategory) hidden @else  @endif"
        x-show="showModal1"
        onclick="stopVideo()"
        x-transition:enter="transition duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        >
        <div class="lg:w-8/12 md:w-8/12 mx-2 my-10 opacity-100 relative sm:mx-auto sm:w-3/4">
            <div
            class="relative bg-gray-900 shadow-lg rounded-xl text-gray-200 z-20 border-b-2 border-r-2 border-l-2 border-gray-800" id="video_modal_inner_body"
            x-show="showModal1"
            x-transition:enter="transition transform duration-300"
            x-transition:enter-start="scale-0"
            x-transition:enter-end="scale-100"
            x-transition:leave="transition transform duration-300"
            x-transition:leave-start="scale-100"
            x-transition:leave-end="scale-0"
            >
            <header class="flex items-center rounded-t-lg bg-gray-800 text-gray-300 justify-between p-2">
                <h2 class="font-semibold"></h2>
                <h2 class="font-semibold" id="modal_main_heading">Analysis vs. Technical Analysis</h2>
                <button class="focus:outline-none p-2" onclick="stopVideo()">
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                        ></path>
                    </svg>
                </button>
            </header>
            <main class="p-2 text-left">
                <div class="grid grid-cols-none md:grid-cols-2 gap-5 my-5 py-4 px-2">
                    <div class="w-full">
                    <h2 class="text-xl font-semibold mb-4" id="modal_body_heading">Analysis vs. Technical Analysis</h2>    
                    <p id="modal_Description">
                        There are many factors that traders look at and analyze when choosing a contract to trade. Some traders might look for trends on a chart while other traders might look to see if demand might be increasing for a commodity.
                    </p>  
                    </div>
                    <div class="w-full">
                    <!--<iframe class="rounded-md shadow-md education_main_category_video aspect-video"-->
                    <!--        src="https://youtu.be/tWvnAfT4yAk">-->
                    <!--</iframe>-->
                    <iframe class="rounded-md shadow-md education_main_category_video aspect-video modal_video_src" id="modal_video_src"
                            src="" title="YouTube video player" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>

                    </iframe>
                    </div>
                </div>
                
            </main>
            </div>
        </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        
        function showModals(res){
            let videoData = JSON.parse($(`#${res}`).attr('data-video'));
            // console.log(videoData);
            
            $('#modal_video_src').attr('src','');
            
            $('#modal_main_heading').empty().text(`${videoData.title}`);
            $('#modal_body_heading').empty().text(`${videoData.title}`);
            $('#modal_Description').empty().text(`${videoData.description}`);
            $('#modal_video_src').attr('src',`https://www.youtube.com/embed/${videoData.srcId}?start=1`)
            
            $('#showModalTrue').click();
        }
    
        function stopVideo(){
            // console.log(document.querySelector('#modal_video_src'))
            $('#modal_video_src').attr('src','');
            
            
            $('#showModalFalse').click();    
            
            
        }
        
        $('#video_modal_inner_body').click(function(event){
          event.stopPropagation();
        });
    </script>
</div>
