<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('check');
    }

    public function index()
    {
        $promos = Promo::all();
        return view('admin.promos.index', compact('promos'));
    }

    public function new()
    {
        return view('admin.promos.new');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'value' => 'required',
        ]);

        if ($request->value <= 0) {
            return redirect()->back()->with('danger', 'Negative Values...');
        }

        Promo::create(
            $request->all()
        );

        $text = "Promo " . $request->name . " created, datetime: " . now();
        Log::create(['text' => $text]);

        return redirect()->route('promos')->with('success', 'Promo was successfully created.');
    }

    public function edit(Promo $promo)
    {
        return view('admin.promos.edit', compact('promo'));
    }

    public function update(Request $request, Promo $promo)
    {
        if ($request->value <= 0) {
            return redirect()->back()->with('danger', 'Negative Values...');
        }

        $promo->update(
            $request->all()
        );

        $text = "Promo " . $promo->name . " updated, datetime: " . now();
        Log::create(['text' => $text]);
        return redirect()->route('promos')->with('success', 'Promo was successfully updated.');
    }

    public function destroy(Promo $promo)
    {
        $text = "Promo " . $promo->name . " deleted, datetime: " . now();
        $promo->delete();
        Log::create(['text' => $text]);
        return redirect()->back()->with('danger', 'Promo was successfully deleted');
    }

    public function check(Request $request)
    {

        $promoName = $request->promo;

        $promo = Promo::where('name', 'LIKE', $promoName)->firstOrFail();

        if ($promo) {
            return response()->json(['exists' => true, 'value' => $promo->value]);
        }

        return response()->json(['exists' => false]);
    }
}
