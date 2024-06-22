<?php

namespace App\Http\Controllers;

use App\Models\GymNotification;
use Illuminate\Http\Request;


class BookController extends Controller
{
    protected $notification;

    public function __construct(GymNotification $notification)
    {
        $this->notification = $notification;
    }

    public function bookList(Request $request)
    {
        $status = null;
        $message = null;
        $notifications = $this->notification->all();

        return view('admin.books-list', compact('status', 'message','notifications'));
    }

    public function showAddBook(Request $request)
    {
        return view('admin.add-book');
    }

    public function bookDetails($uuid)
    {
        return view('admin.book-details');
    }

}
