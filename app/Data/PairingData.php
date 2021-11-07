<?php

namespace App\Data;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class PairingData extends DataTransferObject
{
    public string $url;

    public static function fromStoreRequest(Request $request): self
    {
        return new self([
            'url' => $request->input('url'),
        ]);
    }
}
