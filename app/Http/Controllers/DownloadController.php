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
        $data = DB::table('mqtt_data_1')->get();

        // Create a new CSV file
        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        // Add a header row to the CSV file
        $csv->insertOne(['id', 'motor1', 'haptic1', 'published_at']);

        // Add the data to the CSV file
        foreach ($data as $row) {
            $csv->insertOne([$row->id, $row->motor1, $row->haptic1, $row->published_at]);
        }

        // Set the response headers
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="table1.csv"',
        ];

        // Return the CSV file as a download
        return response((string) $csv, 200, $headers);
    }

    public function data2(Request $request)
    {
        // Retrieve data from table 1
        $data = DB::table('mqtt_data_2')->get();

        // Create a new CSV file
        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        // Add a header row to the CSV file
        $csv->insertOne(['id', 'motor2', 'haptic2', 'published_at']);

        // Add the data to the CSV file
        foreach ($data as $row) {
            $csv->insertOne([$row->id, $row->motor2, $row->haptic2, $row->published_at]);
        }

        // Set the response headers
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="table2.csv"',
        ];

        // Return the CSV file as a download
        return response((string) $csv, 200, $headers);
    }

    public function data3(Request $request)
    {
        // Retrieve data from table 1
        $data = DB::table('mqtt_data_3')->get();

        // Create a new CSV file
        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        // Add a header row to the CSV file
        $csv->insertOne(['id', 'motor3', 'haptic3', 'published_at']);

        // Add the data to the CSV file
        foreach ($data as $row) {
            $csv->insertOne([$row->id, $row->motor3, $row->haptic3, $row->published_at]);
        }

        // Set the response headers
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="table3.csv"',
        ];

        // Return the CSV file as a download
        return response((string) $csv, 200, $headers);
    }

    public function data4(Request $request)
    {
        // Retrieve data from table 1
        $data = DB::table('mqtt_data_4')->get();

        // Create a new CSV file
        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        // Add a header row to the CSV file
        $csv->insertOne(['id', 'motor4', 'haptic4', 'published_at']);

        // Add the data to the CSV file
        foreach ($data as $row) {
            $csv->insertOne([$row->id, $row->motor4, $row->haptic4, $row->published_at]);
        }

        // Set the response headers
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="table4.csv"',
        ];

        // Return the CSV file as a download
        return response((string) $csv, 200, $headers);
    }

    public function data5(Request $request)
    {
        // Retrieve data from table 1
        $data = DB::table('mqtt_data_5')->get();

        // Create a new CSV file
        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        // Add a header row to the CSV file
        $csv->insertOne(['id', 'motor5', 'haptic5', 'published_at']);

        // Add the data to the CSV file
        foreach ($data as $row) {
            $csv->insertOne([$row->id, $row->motor5, $row->haptic5, $row->published_at]);
        }

        // Set the response headers
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="table5.csv"',
        ];

        // Return the CSV file as a download
        return response((string) $csv, 200, $headers);
    }

}
