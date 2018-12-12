<?php

use GuzzleHttp\Client;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('content', function (Request $request) {
    $url = $request->get('url');

    $client = new Client();
    $res = $client->request('GET', $url);
    return response()->json(['data'=>$res->getBody()->getContents()],200);
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
