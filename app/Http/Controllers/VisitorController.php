<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::orderBy('id', 'desc')->paginate(20);
        return view('admin.visitor.index', compact('visitors'));
    }
}
