<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        return $faqs;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'data' => 'required|array', // data field'inin array olduğunu doğruluyoruz
            'data.*.question' => 'required|string', // her item içinde question olmalı
            'data.*.id' => 'nullable', // id varsa güncelleme yapacak
            'data.*.answer' => 'required|string',   // her item içinde answer olmalı
        ]);

        // Gelen 'data' array'ini almak
        $faqData = $validatedData['data'];

        // FAQ verilerini topluca ekleme ve güncelleme işlemi
        $faqs = [];
        foreach ($faqData as $faq) {
            if (isset($faq['id']) && $faq['id'] !== null) {
                // Mevcut bir kaydı güncelle
                $existingFaq = Faq::find($faq['id']);
                if ($existingFaq) {
                    $existingFaq->update([
                        'question' => $faq['question'],
                        'answer' => $faq['answer'],
                        'updated_at' => now(),
                    ]);
                    $faqs[] = $existingFaq;
                }
            } else {
                // Yeni bir kayıt ekle
                $newFaq = Faq::create([
                    'question' => $faq['question'],
                    'answer' => $faq['answer'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $faqs[] = $newFaq;
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'FAQs created/updated successfully',
            'data' => $faqs
        ], 200);
    }



    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        return response()->json([
            'success' => true,
            'data' => $faq
        ], 200);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $validatedData = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'FAQ updated successfully',
            'data' => $faq
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return response()->json([
            'success' => true,
            'message' => 'FAQ deleted successfully'
        ], 200);
    }
}
