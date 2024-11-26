<?php

namespace Modules\BulkSMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BulkSMSController extends Controller
{

    private $apiUrl;
    private $apiKey;
    

    public function __construct()
    {
        $this->apiUrl = env('EASY_SERVICE_BASE_URL');
        $this->apiKey = env('EASY_SERVICE_API_KEY');
    }

    // Send Bulk SMS
    public function sendBulkSMS(Request $request)
    {
        // echo $this->apiUrl;
        // die;
       $validated = $request->validate([
            'message' => 'required|string',
            'contacts' => 'required|array',
       ]);

        $payload = [

            'apikey' => 'fj38fhj2390fj@CFE39fhjf3if9f9030fjfjxcvp34723',

            'contacts' => $validated['contacts'],

            'message_type' => 'plain',

            'message' => $validated['message'],

            'sender_id' => [

                'nt' => 'MD_Alert',

                'ncell' => 'MD_Alert',

                'smart' => 'MD_Alert',

            ],

            'billing_type' => 'alert',

            'tag' => 'TAG1',

        ];
        
        
        // $response = Http::post("{$this->apiUrl}/send-bulk", $payload);
        $url = 'https://api.easyservice.com.np/api/v1/sms/send';
        // $response = Http::post($url, $payload);
        $response = [
            "status" => "success",
            "data" => [
                "api_call_id" => "202411261653-811b4f38-7230-494d-a024-5a290c627fb3",
                "message" => "This is Message",
                "message_type" => "plain",
                "message_page_count" => 1,
                "contact_count" => 2,
                "total_page_count" => 2,
                "balance" => [
                    "current" => 170.00000000000324,
                    "required" => 2.8,
                ],
                "contact_detail" => [
                    "nt" => [
                        "9865024683",
                        "9865232101",
                    ],
                    "ncell" => [],
                    "smart" => [],
                ],
                "result" => true,
                "status" => true,
            ],
        ];
        

        //handeling request
        if (/* $response->successful() */ true) {
            return response()->json(['status' => 'success', 'data' => $response]);
        }

        return response()->json(['status' => 'error', 'message' => $response->body()], $response->status());
    }

    public function chechBalance()
    {
        $payload = [
            'apiKey' => $this->apiKey,
        ];
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post("{$this->apiUrl}/sms/check_balance", $payload);

        if ($response->successful()) {
            return response()->json([
                'status' => 'success', 
                'balance' => $response->json()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => $response->body(),
            ], $response->status());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bulksms::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bulksms::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('bulksms::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('bulksms::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

}
