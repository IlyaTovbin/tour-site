<?php

namespace App\Http\Controllers\clients;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clients\ContactClient;

class ContactClientsController extends Controller
{
    public static $view_data = [
        'title' => 'Contacts',
        'contacts_info' => 'active'
    ];

    static public function index(Request $request){
        self::$view_data['info'] = ContactClient::getInfo($request);
        // self::$view_data['schedules'] = Schedule::getNamesSchedules();
        return view('clients/contacts/contact_index', self::$view_data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Contact $contact)
    {
        //
    }

    public function edit(Contact $contact)
    {
        //
    }

    public function update(Request $request, Contact $contact)
    {
        //
    }

    public function destroy(Contact $contact)
    {
        //
    }
}
