<?php


namespace App\Models;

use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model; 

class Poll extends Model
{
    public function showForm()
    {
        return view('poll.form');
    }
    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);
        Poll::create([
            'name' => $request->name,
            'email' => $request->email,
            'submitted_at' => now(),
        ]);

        return redirect()->route('poll.show')->with('success', 'Данные успешно отправлены!');
    }

    public function index()
    {
        $polls = Poll::all();
        return view('poll.results', compact('polls'));
    }
}
