<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller{

    public function submit(ContactRequest $req){
      $contact = new Contact();
      $contact->name = $req->input('name');
      $contact->user_id = $req->input('user_id');
      $contact->email = $req->input('email');
      $contact->subject = $req->input('subject');
      $contact->message = $req->input('message');

      $contact->save();

      return redirect()->route('home')->with('success', 'Сообщение было добавлено');
    }

    public function allData(){
      return view('messages', ['data' => Contact::all()]);
    }

    public function messagesByUser() {
        $contact = new Contact;
        $data = [];
        $user_id = Auth::user()->id;
        $data = $contact->where('user_id', '=', $user_id)->get();

        return view('private', ['data' => $data ]);
    }

    public function showOneMessage($id){
      $contact = new Contact;
      return view('one-message', ['data' => $contact->find($id)]);
    }

    public function updateMessage($id){
      $contact = new Contact;
      return view('update-message', ['data' => $contact->find($id)]);
    }

    public function updateMessageSubmit($id, ContactRequest $req){
      $contact = Contact::find($id);
      $contact->name = $req->input('name');
      $contact->email = $req->input('email');
      $contact->subject = $req->input('subject');
      $contact->message = $req->input('message');

      $contact->save();

      return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение было обновлено');
    }

    public function deleteMessage($id){
      Contact::find($id)->delete();
      return redirect()->route('contact-data')->with('success', 'Сообщение было удалено');
    }
}
