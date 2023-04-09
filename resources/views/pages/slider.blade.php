@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - Telesurgery</title>
@endsection

@section('subcontent')
<script src="https://cdnjs.cloudflare.com/ajax/libs/mqtt/2.18.8/mqtt.min.js"></script>
<script src="{{ asset('js/mqtt.js') }}"></script>
<script src="public/script.js"></script>

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Regular Table</h2>
</div>
    <div class="grid grid-cols-6 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Tabel data 1 -->
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                    <h2 class="font-medium text-base mr-auto">Data Motor Robot</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <button class="btn btn-dark w-24 mr-1 mb-2"><a href="{{ url('/download1') }}">Download</a></button></label>
                    </div>
                </div>
                <div class="p-5" id="bordered-table">
                    <div class="overflow-x-auto">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">#</th>
                                    <th class="whitespace-nowrap">Motor 1</th>
                                    <th class="whitespace-nowrap">Motor 2</th>
                                    <th class="whitespace-nowrap">Motor 3</th>
                                    <th class="whitespace-nowrap">Motor 4</th>
                                    <th class="whitespace-nowrap">Motor 5</th>
                                    <th class="whitespace-nowrap">Motor 6</th>
                                    <th class="whitespace-nowrap">Motor 7</th>
                                    <th class="whitespace-nowrap">Motor 8</th>
                                    <th class="whitespace-nowrap">Motor 9</th>
                                    <th class="whitespace-nowrap">Motor 10</th>
                                    <th class="whitespace-nowrap">timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data['mqtt_data_motor'] as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->motor1 }}</td>
                                    <td>{{ $row->motor2 }}</td>
                                    <td>{{ $row->motor3 }}</td>
                                    <td>{{ $row->motor4 }}</td>
                                    <td>{{ $row->motor5 }}</td>
                                    <td>{{ $row->motor6 }}</td>
                                    <td>{{ $row->motor7 }}</td>
                                    <td>{{ $row->motor8 }}</td>
                                    <td>{{ $row->motor9 }}</td>
                                    <td>{{ $row->motor10 }}</td>
                                    <td>{{ $row->published_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END: Tabel data 1-->
           
                        <!-- BEGIN: Tabel data 1 -->
                        <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                    <h2 class="font-medium text-base mr-auto">Data Haptic Device</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <button class="btn btn-dark w-24 mr-1 mb-2"><a href="{{ url('/download2') }}">Download</a></button></label>
                    </div>
                </div>
                <div class="p-5" id="bordered-table">
                    <div class="overflow-x-auto">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">#</th>
                                    <th class="whitespace-nowrap">Haptic 1</th>
                                    <th class="whitespace-nowrap">Haptic 2</th>
                                    <th class="whitespace-nowrap">Haptic 3</th>
                                    <th class="whitespace-nowrap">Haptic 4</th>
                                    <th class="whitespace-nowrap">Haptic 5</th>
                                    <th class="whitespace-nowrap">Haptic 6</th>
                                    <th class="whitespace-nowrap">Haptic 7</th>
                                    <th class="whitespace-nowrap">Haptic 8</th>
                                    <th class="whitespace-nowrap">Haptic 9</th>
                                    <th class="whitespace-nowrap">Haptic 10</th>
                                    <th class="whitespace-nowrap">timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data['mqtt_data_haptic'] as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->haptic1 }}</td>
                                    <td>{{ $row->haptic2 }}</td>
                                    <td>{{ $row->haptic3 }}</td>
                                    <td>{{ $row->haptic4 }}</td>
                                    <td>{{ $row->haptic5 }}</td>
                                    <td>{{ $row->haptic6 }}</td>
                                    <td>{{ $row->haptic7 }}</td>
                                    <td>{{ $row->haptic8 }}</td>
                                    <td>{{ $row->haptic9 }}</td>
                                    <td>{{ $row->haptic10 }}</td>
                                    <td>{{ $row->published_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END: Tabel data 1-->
                        <!-- BEGIN: Tabel data 1 -->
                        <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                    <h2 class="font-medium text-base mr-auto">Data Gyro</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <button class="btn btn-dark w-24 mr-1 mb-2"><a href="{{ url('/download3') }}">Download</a></button></label>
                    </div>
                </div>
                <div class="p-5" id="bordered-table">
                    <div class="overflow-x-auto">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">#</th>
                                    <th class="whitespace-nowrap">data</th>
                                    <th class="whitespace-nowrap">timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data['mqtt_data_gyro'] as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->data }}</td>
                                    <td>{{ $row->published_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END: Tabel data 1-->
        </div>
    </div>
@endsection

@section('script')
@endsection
