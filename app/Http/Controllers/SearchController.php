<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exchange;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    //
 public function index(Request $request)
  {
    $results = (new Search())
    ->registerModel(Exchange::class, ['exchange_rate', 'currency'])
    ->search($request->input('query'));
    
    return response()->json($results);
  }

  public function details($id)
  {
      $details = Exchange::find($id);
     // dd($details);
      return view('search.details', compact('details'));
  }
}
