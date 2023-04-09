@extends('../layout/' . $layout)

@section('subhead')
    <title>Chart - Telesurgery</title>
@endsection

@section('subcontent')
<script src="https://cdnjs.cloudflare.com/ajax/libs/mqtt/2.18.8/mqtt.min.js"></script>
<script src="public/script.js"></script>
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Regular Table</h2>
</div>
<div class="grid grid-cols-6 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: chart data 1 -->
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
            <!-- END: chart data 1-->
            <!-- BEGIN: chart data 3 -->
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
            <!-- END: chart data 3 -->
            <!-- BEGIN: chart data 5 -->
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
            <!-- END: chart data 5 -->
            <!-- BEGIN: chart data 7 -->
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
            <!-- END: chart data 7 -->
            <!-- BEGIN: chart data 9 -->
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
            <!-- END: chart data 9 -->
            <!-- BEGIN: chart data 2 -->
            <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                 <h2 class="font-medium text-base mr-auto">
                    Line Chart Motor 6 vs Haptic 6
                </h2>
            </div>
            <div id="line-chart" class="p-5">
                <div class="preview">
                    <div class="h-[400px]">
                        <canvas id="line-chart-widget-6"></canvas>
                    </div>
                </div>
            </div>
            </div>
            <!-- END: chart data 2 -->
            <!-- BEGIN: chart data 4 -->
            <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                 <h2 class="font-medium text-base mr-auto">
                    Line Chart Motor 7 vs Haptic 7
                </h2>
            </div>
            <div id="line-chart" class="p-5">
                <div class="preview">
                    <div class="h-[400px]">
                        <canvas id="line-chart-widget-7"></canvas>
                    </div>
                </div>
            </div>
            </div>
            <!-- END: chart data 4 -->
            <!-- BEGIN: chart data 6 -->
            <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                 <h2 class="font-medium text-base mr-auto">
                    Line Chart Motor 8 vs Haptic 8
                </h2>
            </div>
            <div id="line-chart" class="p-5">
                <div class="preview">
                    <div class="h-[400px]">
                        <canvas id="line-chart-widget-8"></canvas>
                    </div>
                </div>
            </div>
            </div>
            <!-- END: chart data 6 -->
            <!-- BEGIN: chart data 8 -->
            <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                 <h2 class="font-medium text-base mr-auto">
                    Line Chart Motor 9 vs Haptic 9
                </h2>
            </div>
            <div id="line-chart" class="p-5">
                <div class="preview">
                    <div class="h-[400px]">
                        <canvas id="line-chart-widget-9"></canvas>
                    </div>
                </div>
            </div>
            </div>
            <!-- END: chart data 8 -->
            <!-- BEGIN: chart data 10 -->
            <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                 <h2 class="font-medium text-base mr-auto">
                    Line Chart Motor 10 vs Haptic 10
                </h2>
            </div>
            <div id="line-chart" class="p-5">
                <div class="preview">
                    <div class="h-[400px]">
                        <canvas id="line-chart-widget-10"></canvas>
                    </div>
                </div>
            </div>
            </div>
            <!-- END: chart data 10 -->
            <!-- BEGIN: chart data 10 -->
            <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                 <h2 class="font-medium text-base mr-auto">
                    Line Chart Gyro
                </h2>
            </div>
            <div id="line-chart" class="p-5">
                <div class="preview">
                    <div class="h-[400px]">
                        <canvas id="line-chart-widget-11"></canvas>
                    </div>
                </div>
            </div>
            </div>
            <!-- END: chart data 10 -->
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
