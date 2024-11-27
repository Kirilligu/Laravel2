<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }
    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'submitted_at' => now(),];
        $fileName = 'data_' . uniqid() . '.json';
        Storage::disk('local')->put($fileName, json_encode($data));

        return redirect()->route('form.show')->with('success', 'Данные успешно сохранены!');
    }
    public function showData()
    {
        $files = Storage::files();
        $data = [];
        foreach ($files as $file) {
            if (str_ends_with($file, '.json')) {
                $data[] = json_decode(Storage::get($file), true);
            }
        }
        return view('data', compact('data'));
    }
}
