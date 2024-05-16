<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalletAddress;

class WalletAddressController extends Controller
{
    public function store(Request $request)
    {
        $Walletsaddress = new WalletAddress;
        $Walletsaddress->holder_name = $request->holder_name;
        $Walletsaddress->holder_category = $request->holder_category;
        $Walletsaddress->address = $request->address;
        $Walletsaddress->save();
        return redirect()->back()->with('success', 'Wallets address created successfully.');
    }

    public function list()
    {
        $Walletsaddress = WalletAddress::all();
        return view('layouts.Walletsaddress.list', compact('Walletsaddress'));
    }

    public function edit($id)
    {
        $Walletsaddress = WalletAddress::find($id);
        return view('layouts.Walletsaddress.edit', compact('Walletsaddress'));
    }


    public function update(Request $request, $id)
{
    $Walletsaddress = WalletAddress::find($id);

    if ($Walletsaddress) {
        $Walletsaddress->holder_name = $request->holder_name;
        $Walletsaddress->holder_category = $request->holder_category;
        $Walletsaddress->address = $request->address;
        $Walletsaddress->save();

        // Flash a success message to the session
        return redirect()->back()->with('success', 'TakenStandard updated successfully!');
    } else {
        // Flash an error message to the session
        return redirect()->back()->with('error', 'TakenStandard not found!');
    }
}

public function delete($id)
{
    // Find the TakenStandard record by ID
    $Walletsaddress = WalletAddress::find($id);

    // Check if the record exists
    if ($Walletsaddress) {
        // Delete the record
        $Walletsaddress->delete();

        // Flash a success message to the session
        return redirect()->back()->with('success', 'TakenStandard deleted successfully!');
    } else {
        // Flash an error message to the session
        return redirect()->back()->with('error', 'TakenStandard not found!');
    }
}

}
