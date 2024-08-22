<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
    {
    public function index()
    {
    $categories = Category::all();
    return view('contact.index', compact('categories'));
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|integer',
            'email' => 'required|email',
            'tel_first' => 'required|digits:3',
            'tel_second' => 'required|digits:4',
            'tel_third' => 'required|digits:4',
            'address' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
            'detail' => 'required|integer',
            'content' => 'required|string',
        ], [
            'first_name.required' => '姓を入力してください',
            'last_name.required' => '`名を入力してください`',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'tel_first.required' => '電話番号を入力してください',
            'tel_second.required' => '電話番号を入力してください',
            'tel_third.required' => '電話番号を入力してください',
            'address.required' => '住所を入力してください',
            'detail.required' => 'お問い合わせの種類を選択してください',
            'content.required' => 'お問い合わせ内容を入力してください',
        ]);

        $data = $request->all();
        return view('contact.confirm', compact('data'));
    }

    public function store(Request $request)
    {
    Contact::create($request->all());
    return redirect('/thanks');
    }

    public function thanks()
    {
    return view('contact.thanks');
    }
}