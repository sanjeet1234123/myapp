<?php

namespace App\Http\Controllers;

use App\Models\library1;
use App\Models\member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LibraryController extends Controller
{
    public function library(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:library1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $library = Library1::create([
                'name' => $request->input('name'),
            ]);

            if ($library) {
                return response()->json([
                    'status' => 201,
                    'message' => 'Library added',
                ], 201);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong',
                ], 500);
            }
        }
    }
    public function get_library()
    {
        $library = library1::all();
        if ($library->count() > 0) {
            return response()->json([
                'status' => 202,
                'libraries' => $library,
            ],202);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'no library found',
            ],404);

        }

    }
    public function member(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|digits:10',
            'role' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'lib_id' => 'required|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $libExists = library1::where('id', $request->input('lib_id'))->exists();

            if (!$libExists) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Library with provided lib_id does not exist',
                ], 404);
            }

            $adminExists = Member::where('role', 'admin')->exists();
            $newMemberRole = $adminExists ? 'reader' : 'admin';
            $member = Member::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'contact_number' => $request->input('contact_number'),
                'role' => $newMemberRole, 
                'password' => $request->input('password'),
                'lib_id' => $request->input('lib_id'),
            ]);

            if ($member) {
                return response()->json([
                    'status' => 201,
                    'message' => 'Member added',
                ],201);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong',
                ],500);
            }
        }
    }
    public function get_member()
    {
        $getMember=member::all();
        if($getMember->count()>0){
            return response() ->json([
                'status'=>202,
                'members'=>$getMember,
            ],202);
        }else{
            return response() ->json([
                'status'=>404,
                'message'=>'No members exist',
            ],404);
        }
    }

}
