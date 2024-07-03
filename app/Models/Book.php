<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Throwable;

class Book extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'image',
        'book_name',
        'book_price',
        'association_name',
        'association_web_link',
        'association_email',
        'association_ph_no',
        'association_address',
        'publication_name',
        'publication_web_link',
        'publication_email',
        'publication_ph_no',
        'publication_address'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function industries()
    {
        return $this->hasMany(IndustryDetail::class);
    }

    public function addBook(array $addBook, $imagePath)
    {
        try {
            return $this->create([
                'book_name'  => $addBook['book_name'],
                'book_price'             => $addBook['book_price'],
                'association_name'           => $addBook['association_name'],
                'association_web_link'        => $addBook['association_web_link'],
                'association_ph_no'            => $addBook['association_ph_no'],
                'association_email'            => $addBook['association_email'],
                'association_address'         => $addBook['association_address'],
                'publication_name'         => $addBook['publication_name'],
                'publication_web_link'         => $addBook['publication_web_link'],
                'publication_email'         => $addBook['publication_email'],
                'publication_ph_no'         => $addBook['publication_ph_no'],
                'publication_address'         => $addBook['publication_address'],
                'image'              => $imagePath,
            ]);
        } catch (\Throwable $e) {
            Log::error('[Book][addBook] Error adding admin subscription: ' . $e->getMessage());
        }
    }

    public function updateBook(array $validatedData, $imagePath, $uuid)
    {
        $bookDetail = Book::where('uuid', $uuid)->first();
        if (!$bookDetail) {
            return redirect()->back()->with('error', 'book not found');
        }
        try {
            $bookDetail->update([
                'book_name'  => $validatedData['book_name'],
                'book_price'             => $validatedData['book_price'],
                'association_name'           => $validatedData['association_name'],
                'association_web_link'        => $validatedData['association_web_link'],
                'association_ph_no'            => $validatedData['association_ph_no'],
                'association_email'            => $validatedData['association_email'],
                'association_address'         => $validatedData['association_address'],
                'publication_name'         => $validatedData['publication_name'],
                'publication_web_link'         => $validatedData['publication_web_link'],
                'publication_email'         => $validatedData['publication_email'],
                'publication_ph_no'         => $validatedData['publication_ph_no'],
                'publication_address'         => $validatedData['publication_address'],
            ]);


            if (isset($imagePath)) {
                $bookDetail->update([
                    'image' => $imagePath
                ]);
            }
            return $bookDetail->save();
        } catch (Throwable $e) {
            Log::error('[Book][updateBook] Error while updating book detail: ' . $e->getMessage());
        }
    }
}
