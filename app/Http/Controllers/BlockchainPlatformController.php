<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlockchainPlatform;

class BlockchainPlatformController extends Controller
{
    public function store(Request $request)
    {

        $blockchainPlatform = new BlockchainPlatform;
        $blockchainPlatform->platformName = $request->platformName;
        $blockchainPlatform->save();
        return redirect()->back()->with('success', 'Blockchain platform added successfully.');
    }

    public function list()
    {
        $blockchain_platform = BlockchainPlatform::all();

        return view('layouts.blockchain_platform.list', compact('blockchain_platform'));
    }

    public function edit($id)
    {
        $blockchain_platform = BlockchainPlatform::find($id);

        return view('layouts.blockchain_platform.edit', compact('blockchain_platform'));
    }

    public function update(Request $request, $id)
{
    $blockchain_platform = BlockchainPlatform::find($id);

    if ($blockchain_platform) {
        $blockchain_platform->platformName = $request->platformName;
        $blockchain_platform->save();

        // Flash a success message to the session
        return redirect()->back()->with('success', 'blockchain_platform updated successfully!');
    } else {
        // Flash an error message to the session
        return redirect()->back()->with('error', 'blockchain_platform not found!');
    }
}


public function delete($id)
{
    // Find the TakenStandard record by ID
    $blockchain_platform = BlockchainPlatform::find($id);

    // Check if the record exists
    if ($blockchain_platform) {
        // Delete the record
        $blockchain_platform->delete();

        // Flash a success message to the session
        return redirect()->back()->with('success', 'blockchain_platform deleted successfully!');
    } else {
        // Flash an error message to the session
        return redirect()->back()->with('error', 'blockchain_platform not found!');
    }
}

}
