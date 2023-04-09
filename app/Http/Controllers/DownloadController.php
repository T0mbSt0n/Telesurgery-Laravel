<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Csv\Writer;

class DownloadController extends Controller
{
    public function data1(Request $request)
    {
        // Retrieve data from table 1
        $data = DB::table('mqtt_data_motor')->get();

        // Create a new CSV file
        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        // Add a header row to the CSV file
        $csv->insertOne(['id', 'motor1', 'motor2','motor3', 'motor4','motor5', 'motor6','motor7', 'motor8','motor9', 'motor10', 'published_at']);

        // Add the data to the CSV file
        foreach ($data as $row) {
            $csv->insertOne([$row->id, $row->motor1, $row->motor2,$row->motor3, $row->motor4,$row->motor5, $row->motor6,$row->motor7, $row->motor8,$row->motor9, $row->motor10, $row->published_at]);
        }

        // Set the response headers
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="Data_Motor.csv"',
        ];

        // Return the CSV file as a download
        return response((string) $csv, 200, $headers);
    }

    public function data2(Request $request)
    {
        // Retrieve data from table 1
        $data = DB::table('mqtt_data_haptic')->get();

        // Create a new CSV file
        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        // Add a header row to the CSV file
        $csv->insertOne(['id', 'haptic1', 'haptic2','haptic3', 'haptic4','haptic5', 'haptic6','haptic7', 'haptic8','haptic9', 'haptic10', 'published_at']);

        // Add the data to the CSV file
        foreach ($data as $row) {
            $csv->insertOne([$row->id, $row->haptic1, $row->haptic2,$row->haptic3, $row->haptic4,$row->haptic5, $row->haptic6,$row->haptic7, $row->haptic8,$row->haptic9, $row->haptic10, $row->published_at]);
        }

        // Set the response headers
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="Data_Haptic.csv"',
        ];

        // Return the CSV file as a download
        return response((string) $csv, 200, $headers);
    }

    public function data3(Request $request)
    {
        // Retrieve data from table 1
        $data = DB::table('mqtt_data_gyro')->get();

        // Create a new CSV file
        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        // Add a header row to the CSV file
        $csv->insertOne(['id', 'data', 'published_at']);

        // Add the data to the CSV file
        foreach ($data as $row) {
            $csv->insertOne([$row->id, $row->data, $row->published_at]);
        }

        // Set the response headers
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="Data_Gyro.csv"',
        ];

        // Return the CSV file as a download
        return response((string) $csv, 200, $headers);
    }

}
