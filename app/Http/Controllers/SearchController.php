<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $results = [];

        return Inertia::render("Search", [
            "query" => $request->q ?? null,
            "results" => $results
        ]);
    }
}
