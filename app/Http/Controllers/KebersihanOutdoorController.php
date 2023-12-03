<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\InventoryAC;
use App\OutdoorCleanStatus;
use App\OutdoorCleanPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class KebersihanOutdoorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get period
        $period = OutdoorCleanPeriod::orderBy('created_at', 'asc')->get();
        return view('kebersihan_outdoor.list', [
            'title' => 'Laporan Kebersihan Luar Ruangan',
            'items' => $period
        ]);
    }

    public function iperiod($id)
    {
        // get status of period
        $period = OutdoorCleanPeriod::findOrFail($id);
        // get items, when null retuirn empty array
        $items = OutdoorCleanStatus::where('period_id', $id)->get();

        // format date d-m-Y use Carbon
        foreach ($items as $item) {
            $item->date = $item->date->format('d-M-Y');
        }
        return view('kebersihan_outdoor.list_period', [
            'title' => 'KEBERSIHAN LUAR RUANGAN BULANAN',
            'period' => $period,
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
        // create list of year
        $years = [];
        // add year from 1980 to current year + 5
        for ($i = 2000; $i <= date('Y'); $i++) {
            $years[$i] = $i;
        }
        // reverse array
        $years = array_reverse($years, true);
        return view('kebersihan_outdoor.create', [
            'title' => 'Add new period',
            'years' => $years
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cperiod($id)
    {
        return view('kebersihan_outdoor.create_period', [
            'title' => 'Add new',
            'id' => $id,
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
        $period = OutdoorCleanPeriod::create([
            'year' => $request->year,
            'month' => $request->month,
            'author' => $request->author,
        ]);

        return redirect()->route('kebersihan_outdoor.index')->with('message', 'Data added successfully!');
    }

    public function speriod(Request $request)
    {
        $status = OutdoorCleanStatus::create([
            'name' => $request->keterangan,
            'status' => $request->keadaan,
            'date' => $request->tanggal,
            'author' => $request->author,
            'period_id' => $request->period_id,
        ]);

        return redirect()->route('kebersihan_outdoor.period', ['id' => $request->period_id])->with('message', 'Data added successfully!');
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
        return view('kebersihan_outdoor.edit', [
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
        

        return redirect()->route('kebersihan_outdoor.index')->with('message', 'Data updated successfully!');
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
            return redirect()->route('kebersihan_outdoor.index')->with('warning', 'Can not delete yourself!');
        }

        $basic->delete();

        return redirect()->route('kebersihan_outdoor.index')->with('message', 'Data deleted successfully!');
    }
}

