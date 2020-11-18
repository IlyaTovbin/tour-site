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
        return view('clients/contacts/contact_index', self::$view_data);
    }

    public function ajaxRequest(Request $request){
        if(in_array( $request['method'], ['deleteContact'])){
            $method = $request['method'];
            $this->$method($request);
        }else{
            return 'Error';
        }
    }

    public function deleteContact($request){
        ContactClient::deleteContact($request['id']);
    }

}
