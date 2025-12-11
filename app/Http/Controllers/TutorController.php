<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;
use Illuminate\Support\Facades\Hash;

class TutorController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'course' => 'required|string|max:255',
            'year_level' => 'required|string|max:255',
            'subjects' => 'required|array|min:1',
            'subjects.*' => 'string',
            'payment_method' => 'required|string|max:255',
            'email' => 'required|email|unique:tutors',
            'teaching_method' => 'required|string|max:255',
            'goal' => 'required|string',
            'username' => 'required|string|unique:tutors|max:255',
            'password' => 'required|string|min:6',
        ]);

        $tutor = Tutor::create([
            'full_name' => $validated['full_name'],
            'age' => $validated['age'],
            'course' => $validated['course'],
            'year_level' => $validated['year_level'],
            'subjects' => $validated['subjects'],
            'payment_method' => $validated['payment_method'],
            'email' => $validated['email'],
            'teaching_method' => $validated['teaching_method'],
            'goal' => $validated['goal'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'message' => 'Tutor registered successfully',
            'tutor' => $tutor
        ], 201);
    }

    public function login(Request $request)
    {
        $tutor = Tutor::where('username', $request->username)->first();

        if (!$tutor || !Hash::check($request->password, $tutor->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response()->json([
            'message' => 'Login successful',
            'tutor' => $tutor,
        ]);
    }

    public function getAllTutors()
    {
        $tutors = Tutor::all();
        return response()->json($tutors);
    }
}
