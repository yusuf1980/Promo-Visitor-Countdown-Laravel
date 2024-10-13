<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SocialProof;
use Illuminate\Http\Request;

class SocialProofController extends Controller
{
    public function index()
    {
        $socialProofs = SocialProof::orderBy('purchased_at', 'desc')->orderBy('id', 'desc')->paginate(20);
        return view('admin.social_proofs.index', compact('socialProofs'));
    }

    public function create()
    {
        $products = Product::orderBy('name', 'ASC')->pluck('name', 'name');
        return view('admin.social_proofs.create', compact('products'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'product' => 'required|string|max:255',
            'status' => 'required',
            'purchased_at' => 'required|date_format:d-m-Y',
        ]);

        SocialProof::create($request->all());
        return redirect()->route('social-proofs.index')->with('success', 'Pembelian berhasil ditambahkan.');
    }

    public function edit(SocialProof $socialProof)
    {
        $products = Product::orderBy('name', 'ASC')->pluck('name', 'name');
        return view('admin.social_proofs.edit', compact(['socialProof', 'products']));
    }

    public function update(Request $request, SocialProof $socialProof)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'product' => 'required|string|max:255',
            'status' => 'required',
            'purchased_at' => 'required|date_format:d-m-Y',
        ]);

        $socialProof->update($request->all());
        return redirect()->route('social-proofs.index')->with('success', 'Pembelian berhasil diperbarui.');
    }

    public function destroy(SocialProof $socialProof)
    {
        $socialProof->delete();
        return redirect()->route('social-proofs.index')->with('success', 'Pembelian berhasil dihapus.');
    }

}
