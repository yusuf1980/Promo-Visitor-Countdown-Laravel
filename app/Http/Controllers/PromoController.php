<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promos = Promo::orderBy('id', 'desc')->paginate(10);
        return view('admin.promo.index', compact('promos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date'=>['required', 'date_format:d-m-Y'],
            // 'status' => ['required', 'boolean'],
            'discount' => ['required'],
            'finish_time' => ['required']
        ]);

        if($request->status) {
            foreach(Promo::orderBy('id', 'desc')->limit(5)->get() as $promo) {
                $promo->status = false;
                $promo->save();
            }
        }

        Promo::create([
            'date' => $request->date,
            'status' => $request->status,
            'discount' => $request->discount,
            'finish_time' => $request->finish_time,
            'user_id' => auth()->user()->id
        ]);

        toastr()->success('Promo berhasil ditambahkan');

        return redirect()->route('promos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Promo::findOrFail($id);
        return view('admin.promo.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'date'=>['required', 'date_format:d-m-Y'],
            // 'status' => ['required', 'boolean'],
            'discount' => ['required'],
            'finish_time' => ['required']
        ]);

        $item = Promo::findOrFail($id);

        if($request->status) {
            foreach(Promo::orderBy('id', 'desc')->limit(5)->get() as $promo) {
                $promo->status = false;
                $promo->save();
            }
        }

        $item->update([
            'date' => $request->date,
            'status' => $request->status,
            'discount' => $request->discount,
            'finish_time' => $request->finish_time,
        ]);

        toastr()->success('Promo berhasil diperbarui');

        return redirect()->route('promos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Promo::findOrFail($id);
        $item->delete();

        toastr()->warning('Promo telah dihapus!');

        return redirect()->route('promos.index');
    }
}
