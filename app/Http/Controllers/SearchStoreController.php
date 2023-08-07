<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SearchStore;

class SearchStoreController extends Controller
{
    public function dbstore(Request $request) {
        $searchstores = new SearchStore();
        $searchstores->user_id = auth()->id();
        $searchstores->bitter = $request->input('db.bitter');
        $searchstores->acidity = $request->input('db.acidity');
        $searchstores->rich = $request->input('db.rich');
        $searchstores->sweet = $request->input('db.sweet');
        $searchstores->smell = $request->input('db.smell');
        $searchstores->save();
    }
    
    public function poststore(Request $request) {
        $searchstores = new SearchStore();
        $searchstores->user_id = auth()->id();
        $searchstores->bitter = $request->input('db.bitter');
        $searchstores->acidity = $request->input('db.acidity');
        $searchstores->rich = $request->input('db.rich');
        $searchstores->sweet = $request->input('db.sweet');
        $searchstores->smell = $request->input('db.smell');
        $searchstores->save();
    }
}
