<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Auth;

class ContactMessageController extends Controller
{
    /**
     * show contact page
     *
     * @return void
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * validate and store new Contact message
     *
     * @return void
     */
    public function store(StoreContactMessageRequest $request)
    {
        $attributes = $request->safe()->merge([
            'user_id' => Auth::user()->id,
            'building_id' => Auth::user()->building_id,
            'slug' => str($request['subject'])->slug()
        ])->all();

        ContactMessage::create($attributes);

        return redirect(route('contact'))->with('success', 'Your message has been sent.');
    }
}
