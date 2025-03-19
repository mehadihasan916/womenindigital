<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PathFinder;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // Search
    public function pathFinder(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');
        // Search in the title
        $search_question = PathFinder::where('question', 'LIKE', "%{$search}%")->where('status', true)->get();
        // Return the search view with the resluts compacted
        return view();
    }
}
