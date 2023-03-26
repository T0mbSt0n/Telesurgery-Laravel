@extends('../layout/' . $layout)

@section('subhead')
    <title>Chart - Telesurgery</title>
@endsection

@section('subcontent')
<script src="https://cdnjs.cloudflare.com/ajax/libs/mqtt/2.18.8/mqtt.min.js"></script>
<script src="public/script.js"></script>
    <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Line Chart -->
        <div class="col-span-12 lg:mt-10" style="center">
        <h2 class="text-lg font-medium mr-auto" style="center">MQTT Chart</h2>
        <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                 <h2 class="font-medium text-base mr-auto">
                    Line Chart Motor 1 vs Haptic 1
                </h2>
            </div>
            <div id="line-chart" class="p-5">
                <div class="preview">
                    <div class="h-[400px]">
                        <canvas id="line-chart-widget-1"></canvas>
                    </div>
                </div>
            </div>
        </div>    
        <!-- END: Line Chart -->
        <!-- BEGIN: Line Chart -->
        <div class="col-span-12 lg:mt-10" style="center">
        <h2 class="text-lg font-medium mr-auto" style="center">MQTT Chart</h2>
        <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                 <h2 class="font-medium text-base mr-auto">
                    Line Chart Motor 2 vs Haptic 2
                </h2>
            </div>
            <div id="line-chart" class="p-5">
                <div class="preview">
                    <div class="h-[400px]">
                        <canvas id="line-chart-widget-2"></canvas>
                    </div>
                </div>
            </div>
        </div>    
        <!-- END: Line Chart -->
        <!-- BEGIN: Line Chart -->
        <div class="col-span-12 lg:mt-10" style="center">
        <h2 class="text-lg font-medium mr-auto" style="center">MQTT Chart</h2>
        <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                 <h2 class="font-medium text-base mr-auto">
                    Line Chart Motor 3 vs Haptic 3
                </h2>
            </div>
            <div id="line-chart" class="p-5">
                <div class="preview">
                    <div class="h-[400px]">
                        <canvas id="line-chart-widget-3"></canvas>
                    </div>
                </div>
            </div>
        </div>    
        <!-- END: Line Chart -->
        <!-- BEGIN: Line Chart -->
        <div class="col-span-12 lg:mt-10" style="center">
        <h2 class="text-lg font-medium mr-auto" style="center">MQTT Chart</h2>
        <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                 <h2 class="font-medium text-base mr-auto">
                    Line Chart Motor 4 vs Haptic 4
                </h2>
            </div>
            <div id="line-chart" class="p-5">
                <div class="preview">
                    <div class="h-[400px]">
                        <canvas id="line-chart-widget-4"></canvas>
                    </div>
                </div>
            </div>
        </div>    
        <!-- END: Line Chart -->
        <!-- BEGIN: Line Chart -->
        <div class="col-span-12 lg:mt-10" style="center">
        <h2 class="text-lg font-medium mr-auto" style="center">MQTT Chart</h2>
        <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                 <h2 class="font-medium text-base mr-auto">
                    Line Chart Motor 5 vs Haptic 5
                </h2>
            </div>
            <div id="line-chart" class="p-5">
                <div class="preview">
                    <div class="h-[400px]">
                        <canvas id="line-chart-widget-5"></canvas>
                    </div>
                </div>
            </div>
        </div>    
        <!-- END: Line Chart -->
        <div class="col-span-12 2xl:col-span-3">
            <div class="2xl:border-l -mb-10 pb-10">
                <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">
                    <!-- BEGIN: sensor data -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">Data Sensor</h2>
                        </div>
                        <div class="mt-5">
                        </div>
                        <h4>Data sensor 1: <span class="mqtt-data" id="TA-morob1">0</span></h4>
                        <h4>Data sensor 2: <span class="mqtt-data" id="TA-morob2">0</span></h4>
                        <h4>Data sensor 3: <span class="mqtt-data" id="TA-morob3">0</span></h4>
                        <h4>Data sensor 1: <span class="mqtt-data" id="TA-morob4">0</span></h4>
                        <h4>Data sensor 2: <span class="mqtt-data" id="TA-morob5">0</span></h4>
                        <h4>Data sensor 3: <span class="mqtt-data" id="TA-hapdev1">0</span></h4>
                        <h4>Data sensor 1: <span class="mqtt-data" id="TA-hapdev2">0</span></h4>
                        <h4>Data sensor 2: <span class="mqtt-data" id="TA-hapdev3">0</span></h4>
                        <h4>Data sensor 3: <span class="mqtt-data" id="TA-hapdev4">0</span></h4>
                        <h4>Data sensor 1: <span class="mqtt-data" id="TA-hapdev5">0</span></h4>
                        <h4>Data sensor 3: <span class="mqtt-data" id="TA-gyro">0</span></h4>
                    </div>
                    <!-- END: sensor data -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
