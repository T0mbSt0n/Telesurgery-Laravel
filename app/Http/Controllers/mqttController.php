<?php

namespace App\Http\Controllers;
use PhpMqtt\Client\MqttClient;
use Illuminate\Http\Request;
use Illuminate\Http\carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class mqttController extends Controller
{
        public function data1(Request $request)
        {
            $mqtt = $request->validate([
                'motor1' => '',
                'haptic1' => '',
                'published_at' => 'date'
            ]);
    
            DB::table('mqtt_data_1')->insert($mqtt);
        }

        public function data2(Request $request)
        {
            $mqtt = $request->validate([
                'morob2' => '',
                'hapdev2' => '',
                'published_at' => 'date'
            ]);
    
            DB::table('mqtt_data_2')->insert($mqtt);
        }

        public function data3(Request $request)
        {
            $mqtt = $request->validate([
                'morob3' => '',
                'hapdev3' => '',
                'published_at' => 'date'
            ]);
    
            DB::table('mqtt_data_3')->insert($mqtt);
        }

        public function data4(Request $request)
        {
            $mqtt = $request->validate([
                'morob4' => '',
                'hapdev4' => '',
                'published_at' => 'date'
            ]);
    
            DB::table('mqtt_data_4')->insert($mqtt);
        }

        public function data5(Request $request)
        {
            $mqtt = $request->validate([
                'morob5' => '',
                'hapdev5' => '',
                'published_at' => 'date'
            ]);
    
            DB::table('mqtt_data_5')->insert($mqtt);
        }

        public function data6(Request $request)
        {
            $mqtt = $request->validate([
                'gyro' => 'required|string',
                'published_at' => 'required|date'
            ]);
    
            DB::table('mqtt_data_6')->insert($mqtt);
        }
}