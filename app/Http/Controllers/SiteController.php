<?php


namespace App\Http\Controllers;


use App\Services\BaseAPI;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function authors(BaseAPI $api, Request $request)
    {
        return $api->request('authors', [
            'limit'=> (int)$request->get('limit', 10)
        ]);
    }

    public function books(BaseAPI $api, Request $request)
    {
        return $api->request('books', [
            'limit'=> (int)$request->get('limit', 10)
        ]);
    }

    public function authorsBooks($authorId, BaseAPI $api, Request $request)
    {
        return $api->request(sprintf('authors/%s/books', $authorId), [
            'limit'=> (int)$request->get('limit', 10)
        ]);
    }
}