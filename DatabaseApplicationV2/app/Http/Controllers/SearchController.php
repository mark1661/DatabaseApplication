<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function processSearch(Request $request)
    {
      $searchQuery = $request->input('searchTextBox');
      $searchQueryType = $request->input('searchSelect');
      $searchResults = null;

      $this->validate($request,
      [
        'searchTextBox' => 'required',
      ]);

      if($searchQueryType == 'actor')
      {
        $searchResults = DB::table('actors')->where('first_name', 'LIKE', $searchQuery . '%')
                                            ->orWhere('last_name', 'LIKE', $searchQuery . '%')->get();
        if(count($searchResults) == 0)
        {
          return view('search/searchFailed');
        }
        else
        {
          return view('search/searchSuccessActor', compact('searchResults'));
        }
      }
      else if($searchQueryType == 'movie')
      {
        $searchResults = DB::table('movies')->where('name', 'LIKE', $searchQuery . '%')
                                            ->orWhere('genre', 'LIKE', $searchQuery . '%')
                                            ->orWhere('release_date', 'LIKE', $searchQuery . '%')->get();
        if(count($searchResults) == 0)
        {
          return view('search/searchFailed');
        }
        else
        {
          return view('search/searchSuccessMovie', compact('searchResults'));
        }
      }
      else if($searchQueryType == 'user')
      {
        $searchResults = DB::table('users')->where('username', 'LIKE', $searchQuery . '%')
                                           ->orWhere('email', 'LIKE', $searchQuery . '%')->get();
        if(count($searchResults) == 0)
        {
          return view('search/searchFailed');
        }
        else
        {
          return view('search/searchSuccessUser', compact('searchResults'));
        }
      }
   }
}
