<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\AppForm;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class PollController extends Controller
{
    public function getPoll(): View
    {
        return view('poll', ['goodstatus' => "", 'badstatus' => '']);
    }

    public function postPoll(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'info' => ['required'],
        ]);

        $name = $validatedData['name'];
        $email = $validatedData['email'];
        $info = $validatedData['info'];
        $client = Client::firstOrCreate(
            ['email' => $email],
            ['name' => $name]
        );
        $appform = AppForm::create([
            'client_id' => $client->id,
            'info' => $info,
        ]);

        return view('poll', ['goodstatus' => "Данные добавлены успешно!", 'badstatus' => '']);
    }

    public function getResults(): View
    {
        $appforms = AppForm::join('clients', 'clients.id', '=', 'app_forms.client_id')
            ->select('app_forms.*', 'clients.name', 'clients.email')
            ->get();

        return view('results', ['appforms' => $appforms]);
    }
	public function index()
{
    $results = AppForm::with('client')->get();
    return view('results', ['results' => $results]);
}
    public function deleteAppForm(Request $request)
    {
        $afid = $request->input('delete');
        $appform = AppForm::findOrFail($afid);
        $appform->delete();
        $appforms = AppForm::join('clients', 'clients.id', '=', 'app_forms.client_id')
            ->select('app_forms.*', 'clients.name', 'clients.email')
            ->get();

        return view('results', ['appforms' => $appforms]);
    }
}
