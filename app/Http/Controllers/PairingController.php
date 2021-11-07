<?php


namespace App\Http\Controllers;


use App\Actions\PairingStorage;
use App\Data\PairingData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PairingController extends Controller
{
    public function show(string $code)
    {
        if ($url = PairingStorage::fetch($code)) {
            return redirect($url . '/' . $code);
        }

        return response()->json([
            'success' => false,
            'error'   => 'no session with this code or session has expired',
        ], 404);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|url',
        ]);
        $session = PairingData::fromStoreRequest($request);
        $code = PairingStorage::create($session->url);
        Log::channel('usage')->info('Code created', [$code, $session->url]);

        return [
            'success'      => true,
            'code'         => $code,
            'pairing_url'  => $request->url() . '/' . $code,
            'redirect_url' => $session->url . '/' . $code,
        ];
    }
}
