<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\InventoryAC;

class InventoryACController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = InventoryAC::orderBy('created_at', 'asc')->get();
        return view('inventory_ac.list', [
            'title' => 'AC Inventory',
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory_ac.create', [
            'title' => 'Add new data',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // parse carbon date
        $request->pengadaan = \Carbon\Carbon::parse($request->pengadaan)->format('Y-m-d');
        $request->produksi = \Carbon\Carbon::parse($request->produksi)->format('Y-m-d');
        InventoryAC::create([
            'ruangan' => $request->ruangan,
            'status' => $request->status,
            'type' => $request->jenis,
            'pk' => $request->pk,
            'production_year' => $request->produksi,
            'bought_year' => $request->pengadaan,
            'author' => $request->author,
        ]);

        return redirect()->route('inventory_ac.index')->with('message', 'Data added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($item)
    {
        $itemData = InventoryAC::findOrFail($item);
        return view('inventory_ac.edit', [
            'title' => $itemData->ruangan . ' - Edit data',
            'item' => $itemData
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $itemId)
    {
        // get item data
        $item = InventoryAC::findOrFail($itemId);
        // update item data
        $item->update([
            'ruangan' => $request->ruangan,
            'status' => $request->status,
            'type' => $request->jenis,
            'pk' => $request->pk,
            'production_year' => $request->produksi,
            'bought_year' => $request->pengadaan,
            'author' => $request->author,
        ]);

        return redirect()->route('inventory_ac.index')->with('message', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $basic)
    {
        if (Auth::id() == $basic->getKey()) {
            return redirect()->route('inventory_ac  .index')->with('warning', 'Can not delete yourself!');
        }

        $basic->delete();

        return redirect()->route('inventory_ac.index')->with('message', 'Data deleted successfully!');
    }
}
