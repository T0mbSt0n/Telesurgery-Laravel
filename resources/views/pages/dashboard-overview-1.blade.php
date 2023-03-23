@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - Telesurgery</title>
@endsection

@section('subcontent')
<script src="https://cdnjs.cloudflare.com/ajax/libs/mqtt/2.18.8/mqtt.min.js"></script>
<script src="{{ asset('js/mqtt.js') }}"></script>
<script src="public/script.js"></script>

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
            </div>
        </div>
        <!-- BEGIN: Line Chart -->
        <div class="col-span-12 lg:mt-5" style="center">
        <div class="intro-y box mt-2">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Streaming
                                </h2>
                            </div>
                            <div id="" class="">
                                <div class="">
                                    <div class="">
                                        <canvas id=""></canvas>
                                    </div>
                            </div>
                        </div>
                    </div>
                        <!-- END: Line Chart -->
    </div>
@endsection

@section('script')
@endsection
