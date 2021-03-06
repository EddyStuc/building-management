<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminContactMessageController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $contactMessages = ContactMessage::latest()->paginate(10);
        return view('admin.contact.index', compact('contactMessages'));
    }

    /**
     * show specific Contact Messagae
     *
     * @param  mixed $contactMessage
     * @return View
     */
    public function show(ContactMessage $contactMessage): View
    {
        return view('admin.contact.show', compact('contactMessage'));
    }

    /**
     * edit page for individual posts
     *
     * @param  mixed $contactMessage
     * @return void
     */
    public function edit(ContactMessage $contactMessage)
    {
        return view('admin.contact.edit', ['contactMessage' => $contactMessage]);
    }

    /**
     * validate changes and update Contact message
     *
     * @param  mixed $contactMessage
     * @return void
     */
    public function update(UpdateContactMessageRequest $request, ContactMessage $contactMessage)
    {
        $attributes = $request->validated();
        $attributes['slug'] = str($request['subject'])->slug();

        $contactMessage->update($attributes);

        return redirect(route('admin.contactMessages'))->with('success', 'Message Updated!');
    }

    /**
     * delete Contact message
     *
     * @param  mixed $contactMessage
     * @return void
     */
    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect(route('admin.contactMessages'))->with('success', 'Message Deleted!');
    }
}
