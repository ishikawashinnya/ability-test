<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function index()
    {
        $contacts = Contact::select('id', 'first_name', 'last_name', 'gender', 'email', 'category_id')->get();
        $categories = Category::all();

        $contacts = Contact::simplePaginate(7);

        return view('admin', compact('contacts', 'categories'), ['contacts' => $contacts]);
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

}
