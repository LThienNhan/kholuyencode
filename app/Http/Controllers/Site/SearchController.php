<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\SearchContract;

class SearchController extends Controller
{
    protected $searchRepository;

    public function __construct(SearchContract $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function search(Request $request)
    {
        $searchs = $this->searchRepository->searchProduct($request->all());
    
        return view('site.pages.search', compact('searchs'));
    }
}
