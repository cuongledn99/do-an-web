<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getRoles()
    {
        $roles = DB::table('users')
            ->select(DB::raw('distinct role'))
            ->get();
        return $roles;
    }
    public function getUserInfo($id)
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->get();

        return $user;
    }

    public function updateUser(Request $req, $id)
    {
        // extract data from input
        $username = $req->input(('username'));
        $fullname = $req->input(('fullname'));
        $email = $req->input(('email'));
        $role = $req->input(('role'));
        $dob = $req->input(('dob'));
        $dob = str_replace('-', '/', $dob);
        $address = $req->input(('address'));
        $dob = Carbon::parse($dob)->format('Y/m/d');

        $updateArr = [
            'username' => $username,
            'fullname' => $fullname,
            'address' => $address,
            'email' => $email,
            'role' => $role,
            'dob' => $dob,
        ];

        // process file
        $hasFile = $req->hasFile('file');
        if ($hasFile) {
            $file = $req->file('file');
            $fileExt = $file->getClientOriginalExtension();
            $newFilename = uniqid('avatar', true) . '.' . $fileExt;

            $newImageURL = $file->move('upload', $newFilename);

            $updateArr['image'] = $newImageURL;
        }

        DB::table('users')
            ->where('id', $id)
            ->update(
                $updateArr
            );
        return 1;
    }

    public function deleteUser($id){
        DB::table('users')
            ->where('id', '=', $id)
            ->delete();

        return 1;
    }
}
