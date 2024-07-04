<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\GymStaff;
use App\Traits\SessionTrait;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class GymUserController extends Controller
{
    use SessionTrait;
    protected $gymStaff;
    protected $book;

    public function __construct(
        GymStaff $gymStaff,
        Book $book
    ) {
        $this->gymStaff = $gymStaff;
        $this->book = $book;
    }

    public function industryList(Request $request)
    {
        $status = null;
        $message = null;
        $books = $this->book->all();
        return view('user.industry-list', compact('status', 'message', 'books'));
    }
}
