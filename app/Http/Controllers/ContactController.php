<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\ApplicationType;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\ErrorHandler\Debug;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller{

    public function submit(ContactRequest $req){
      $contact = new Contact();
      $contact->name = $req->input('name');
      $contact->user_id = $req->input('user_id');
      $contact->email = $req->input('email');
      $contact->subject = $req->input('subject');
      $contact->message = $req->input('message');
      $contact->category = $req->input('category');
      if($req->file('beforeImage') != null) {
        $contact->before_img = substr($req->file('beforeImage')->store('public/image') , 13);
      }

      $contact->save();

      return redirect()->route('home')->with('success', 'Сообщение было добавлено');
    }

    public function allData(){
      $this->authorize('admin');
      return view('messages', ['data' => Contact::all(), 'app_data_type' => ApplicationType::all()]);
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

    public function updateMessageSubmit($id, Request $req){
      $validateFields = $req->validate([
        'afterImage' => 'mimes:png,jpg,jpeg,bmp|max:10240'
      ]);
      $contact = Contact::find($id);
      $contact->status = $req->input('status');
      if ($contact->status === "reject") {
        $contact->rejectReason = $req->input('rejectReason');
      }

      if ($req->file('afterImage') != null) {
          $contact->after_img = substr($req->file('afterImage')->store('public/image'), 13);
      }

      $contact->save();

      return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение было обновлено');
    }

    public function deleteMessage($id){
      Contact::find($id)->delete();
      return redirect()->route('contact-data')->with('success', 'Сообщение было удалено');
    }

    public function applicationTypeAdd(Request $req){
      $req->validate([
          'typeName' => 'required'
      ]);
      $ApplicationType = new ApplicationType();
      $ApplicationType->name = $req->input('typeName');

      $ApplicationType->save();

      return redirect()->route('contact-data')->with('success', 'Type added');
  }

  public function applicationTypeDelete(Request $req){
      $id = $req->input('appType_select');
      Contact::where('category','=',ApplicationType::find($id)->name)->delete();
      $ApplicationType = ApplicationType::find($id)->delete();
      return redirect()->route('contact-data', $id)->with('success', 'Type deleted');
  }

  public function getCategory(Request $req) {
    $data = ApplicationType::all();
    return view('contact', ['data' => $data ]);
  }

  public function getHomePage() {
    $data = Contact::orderBy('updated_at', 'DESC')->get()->where('status', '=', 'solved');

    return view('home', ['data' => $data]);
  }

}
