<?php

namespace App\Http\Controllers;

use App\Models\AppForm;
use App\Models\Client;
use App\Http\Resources\AppFormResource;
use App\Http\Resources\ClientResource;

class DBController extends Controller
{
    public function getAppFormsJson()
    {
        return AppFormResource::collection(AppForm::all());
    }

    public function getClientsJson()
    {
        return ClientResource::collection(Client::all());
    }
}
