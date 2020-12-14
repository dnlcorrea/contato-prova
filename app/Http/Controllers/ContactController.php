<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Email;
use App\Models\Telephone;
use App\Models\TelephoneType;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::with([
            'emails', 'telephones'
        ])->where('user_id', auth()->id())->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = Contact::create([
            'name' => $request->name,
            'user_id' => auth()->id()
        ]);

        foreach ($request->telephones as $telephone) {
            $model = Telephone::create([
                'telephone' => $telephone['telephone'],
                'contact_id' => $contact->id,
                'telephone_type_id' =>
                    TelephoneType::find($telephone['telephone_type'])->id
            ]);

            $contact->telephones()->save($model);
        }

        foreach ($request->emails as $email) {
            $email = Email::create([
                'email' => $email,
                'contact_id' => $contact->id
            ]);

            $contact->emails()->save(
                $email
            );
        }

        return \response()->noContent();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public
    function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Contact $contact)
    {
        //
    }
}
