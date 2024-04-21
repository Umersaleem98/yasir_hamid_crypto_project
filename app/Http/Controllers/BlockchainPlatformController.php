<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlockchainPlatform;

class BlockchainPlatformController extends Controller
{
    public function store(Request $request)
    {

        $blockchainPlatform = new BlockchainPlatform;
        $blockchainPlatform->name = $request->neme;
        return redirect()->back()->with('success', 'Blockchain platform added successfully.');
    }

}
