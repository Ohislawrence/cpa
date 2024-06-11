<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Jobs\WebhookHandler;
use App\Models\Offer;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Validate the request
        $secret = $request->header('secretKey');
        $allowedSecrets = Offer::where('status', 'Active')->pluck('secretkey')->toArray();

        if (!in_array($secret, $allowedSecrets)) {
            Log::warning('Unauthorized webhook attempt detected.');
            return Response::json(['message' => 'Unauthorized'], 401);
        }else{
            // Dispatch the job
        WebhookHandler::dispatch($request->all());

        return Response::json(['message' => 'Webhook received'], 200);
        }

        
    }
}
