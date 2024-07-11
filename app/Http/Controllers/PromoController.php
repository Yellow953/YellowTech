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
        $promos = Promo::select('id', 'name', 'value')->get();
        return view('admin.promos.index', compact('promos'));
    }

    public function new()
    {
        return view('admin.promos.new');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:promos',
            'value' => 'required|numeric|min:0|max:100',
        ]);

        Promo::create([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        $text = ucwords(auth()->user()->name) .  " created Promo: " . $request->name . ", datetime: " . now();
        Log::create(['text' => $text]);

        return redirect()->route('promos')->with('success', 'Promo was successfully created.');
    }

    public function edit(Promo $promo)
    {
        return view('admin.promos.edit', compact('promo'));
    }

    public function update(Request $request, Promo $promo)
    {
        $request->validate([
            'name' => 'required',
            'value' => 'required|numeric|min:0|max:100',
        ]);

        $promo->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        $text = ucwords(auth()->user()->name) .  " updated Promo: " . $promo->name . ", datetime: " . now();
        Log::create(['text' => $text]);

        return redirect()->route('promos')->with('success', 'Promo was successfully updated.');
    }

    public function destroy(Promo $promo)
    {
        if ($promo->can_delete()) {
            $text = ucwords(auth()->user()->name) .  " deleted promo " . $promo->name . ", datetime: " . now();

            $promo->delete();
            Log::create(['text' => $text]);

            return redirect()->back()->with('danger', 'promo was successfully deleted');
        } else {
            return redirect()->back()->with('danger', 'Unable to delete');
        }
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
