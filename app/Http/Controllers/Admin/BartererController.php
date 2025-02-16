<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Mail\AccountUpdate;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\Barterer\BartererResource;

class BartererController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $users = BartererResource::collection(User::byRole('user')->get());

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
                                onclick='crud_activate_deactivate($new_row[id], `admin.barterers.update` , `activate`, `.user_dt`, `Activate this Account`)'>Activate Account</a>";
                    } else {
                        $btn .= "
                                <a class='dropdown-item' href='javascript:void(0)' 
                                onclick='crud_activate_deactivate($new_row[id], `admin.barterers.update` , `deactivate`, `.user_dt`, `Deactivate this Account`)'>Deactivate Account</a>";
                    }

                    $btn.=    "<a class='dropdown-item' href='javascript:void(0)' onclick='c_destroy($new_row[id],`admin.barterers.destroy`,`.user_dt`)'>Delete</a>
                    </div>
                </div> ";

               return $btn;
           })
            ->rawColumns(['actions'])
            ->make(true);
        }

        return view('admin.barterer.index');
    }

    public function update(User $user)
    {
        if(request('option'))
        {
           request('option') == 'activate' ? $user->update(['is_activated' => true]) : $user->update(['is_activated' => false]);   // Activate || Deactivate User

           $this->log_activity(model: $user, event: request('option') == 'activate' ? 'activated' : 'deactivated', model_name: 'Barterer Account', model_property_name: $user->full_name);  // logs

           return  Mail::to($user)->send( new AccountUpdate($user));     // email user
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return $this->res(['success' => 'Barterer Acount Deleted Successfully']);
    }
}