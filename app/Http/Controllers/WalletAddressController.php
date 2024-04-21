<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalletAddress;

class WalletAddressController extends Controller
{
    public function store(Request $request)
    {
        $takenStandard = new WalletAddress;
        $takenStandard->holder_name = $request->holder_name;
        $takenStandard->holder_category = $request->holder_category;
        $takenStandard->address = $request->address;
        return redirect()->back()->with('success', 'Wallets address created successfully.');
    }
}
