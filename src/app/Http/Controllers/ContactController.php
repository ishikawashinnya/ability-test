<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();

        $contact = session('contact_data');

        return view('contact', compact('contacts', 'categories'));
    }

    public function confirm(ContactRequest $request) 
    {
        $contact = $request->only(['category_id','last_name','first_name','gender','email','phone1','phone2','phone3','address','building','detail']);
        $contact['tell'] = $request->phone1 . $request->phone2 . $request->phone3;

        session(['contact_data' => $contact]);
        session(['selected_gender' => $contact['gender']]);
        $categories = Category::all();

        return view('confirm', compact('contact', 'categories'));
    }

    public function store(Request $request) 
    {
        $contact = $request->only(['category_id','last_name','first_name','gender','email','tell','address','building','detail']);
        Contact::create($contact);
        session()->forget('contact_data');
        session()->forget('selected_gender');

        return view('thanks');

    }
}
