<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Shopper\Framework\Repositories\Ecommerce\ProductRepository;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $results = [];

        if ($request->q) {
            $results = (new ProductRepository())
                ->makeModel()
                ->search($request->q)->get();
        }
        return Inertia::render("Search", [
            "q" => $request->q,
            "results" => $results,
            "response" => $request->q != ""
        ]);
    }
}
