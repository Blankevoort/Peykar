<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Http\Controllers\Controller;
use App\Models\Profile\partners;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class PartnersController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return partners::with('profiles')->get();
    }

    public function store(Request $request)
    {
        $partners = partners::create([
            'name' => $request->name,
            'role' => $request->role,
            'company' => $request->company,
            'phone' => $request->phone,
        ]);

        $partners->profiles()->syncWithoutDetaching($request->profile_id);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, partners $partners)
    {
        $partners->find($request->partners_id)->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(partners $partners, Request $request)
    {
        return $this->isNotAuthorized($partners) ? $this->isNotAuthorized($partners) : $partners->find($request->partners_id)->delete();
    }

    private function isNotAuthorized($partners)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
