<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function manageRole($id)
    {
        $user = User::find($id);
        if ($user->role == 'admin') {
            $user->role = 'customer';
        } else {
            $user->role = 'admin';
        }
        $user->save();
        return redirect()->back();
    }

    public function manageUserStatus($id)
    {
        $user = User::find($id);
        if ($user->status == 'active') {
            $user->status = 'deactive';
        } else {
            $user->status = 'active';
        }
        $user->save();
        return redirect()->back();
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
