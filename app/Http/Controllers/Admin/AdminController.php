<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Mail\AccountUpdate;
use Illuminate\Support\Str;
use App\Mail\AccountCreated;
use App\Models\Municipality;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Resources\User\UserResource;

class AdminController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $users = UserResource::collection(User::byRole('admin')->where('id', '!=', 1)->get());

            return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('actions', function($row)
            {
                $new_row = collect($row);

                $btn = "
                <div class='dropdown'>
                    <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <i class='fas fa-ellipsis-v'></i>
                    </a>
                    <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>";

                    if ($row['is_activated'] !== 1) {
                        $btn .= "
                                <a class='dropdown-item' href='javascript:void(0)' 
                                onclick='crud_activate_deactivate($new_row[id], `admin.admins.update` , `activate`, `.admin_dt`, `Activate this Account`)'>Activate Account</a>";
                    } else {
                        $btn .= "
                                <a class='dropdown-item' href='javascript:void(0)' 
                                onclick='crud_activate_deactivate($new_row[id], `admin.admins.update` , `deactivate`, `.admin_dt`, `Deactivate this Account`)'>Deactivate Account</a>";
                    }

                    $btn.=    "<a class='dropdown-item' href='javascript:void(0)' onclick='c_destroy($new_row[id],`admin.admins.destroy`,`.admin_dt`)'>Delete</a>
                    </div>
                </div> ";

               return $btn;
           })
            ->rawColumns(['actions'])
            ->make(true);
        }

        return view('admin.admin.index');
    }

    public function create()
    {
        return $this->res(['results' => Municipality::all()]);
    }

    public function store(AdminRequest $request)
    {
        $password = Str::random(10); // the random password;
        
        $user = User::create($request->validated() + [
                'password' => $password,
                'role_id' => \App\Models\Role::ADMIN,
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::ADMIN,
            ]);

        Mail::to($user)->send( new AccountCreated(user: $user, password: $password));  // email the admin for the account creation

        return $this->res(['success' => 'Admin Account Created Successfully']);
    }

    public function update(User $admin)
    {
        if(request('option'))
        {
           request('option') == 'activate' ? $admin->update(['is_activated' => true]) : $admin->update(['is_activated' => false]);   // Activate || Deactivate admin

           $this->log_activity(model: $admin, event: request('option') == 'activate' ? 'activated' : 'deactivated', model_name: 'Admin Account', model_property_name: $admin->full_name);  // logs

           return  Mail::to($admin)->send( new AccountUpdate($admin));     // email admin
        }
    }

    public function destroy(User $admin)
    {
        $admin->delete();

        return $this->res(['success' => 'Admin Acount Deleted Successfully']);
    }
}