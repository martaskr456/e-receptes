<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function messages()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'You do not have admin access.');
        }

        $messages = Message::all();

        return view('admin.messages', compact('messages'));
    }

    public function markMessageAsRead($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'You do not have admin access.');
        }

        $message = Message::findOrFail($id);
        $message->is_read = true;
        $message->save();

        return redirect()->route('admin.messages')->with('success', 'Ziņa atzīmēta kā izlasīta.');
    }

    public function destroy($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'You do not have admin access.');
        }

        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('dashboard')->with('success', 'Recepte dzēsta veiksmīgi!');
    }
}
