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
            $mqtt_motor = $request->validate([
                'motor1' => '',
                'motor2' => '',
                'motor3' => '',
                'motor4' => '',
                'motor5' => '',
                'motor6' => '',
                'motor7' => '',
                'motor8' => '',
                'motor9' => '',
                'motor10' => '',
                'published_at' => 'date'
            ]);
    
            DB::table('mqtt_data_motor')->insert($mqtt_motor);
        }

        public function data2(Request $request)
        {
            $mqtt_haptic = $request->validate([
                'haptic1' => '',
                'haptic2' => '',
                'haptic3' => '',
                'haptic4' => '',
                'haptic5' => '',
                'haptic6' => '',
                'haptic7' => '',
                'haptic8' => '',
                'haptic9' => '',
                'haptic10' => '',
                'published_at' => 'date'
            ]);
    
            DB::table('mqtt_data_haptic')->insert($mqtt_haptic);
        }

        public function data3(Request $request)
        {
            $mqtt_gyro = $request->validate([
                'data' => '',
                'published_at' => 'date'
            ]);
    
            DB::table('mqtt_data_gyro')->insert($mqtt_gyro);
        }
}