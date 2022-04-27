<?php

namespace App\Http\Controllers;

use App\Enums\UpdatepermissionsEnum;
use App\Http\Requests\UserBanRequest;
use App\Http\Requests\UserCreateManagerRequest;
use App\Http\Requests\UserUnbanRequest;
use App\Http\Requests\UserUpdateEmailRequest;
use App\Http\Requests\UserUpdatePasswordRequest;
use App\Http\Requests\UserUpdateProfileRequest;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.users.index', compact('users'));
    }
    public function view($id)
    {
        $user = User::find(decrypt($id));
        $cities = City::all();
        return view('backend.users.overview', compact('user', 'cities'));
    }
    public function my_Account()
    {
        $user = Auth::user();
        $cities = City::all();
        return view('backend.users.overview', compact('user', 'cities'));
    }

    public function my_Account_edit()
    {
        $user = Auth::user();
        $cities = City::all();
        return view('backend.users.edit', compact('user', 'cities'));
    }

    public function my_Account_update(UserUpdateProfileRequest $request)
    {
        if ($request->has('avatar')) {
            Auth::user()->addMedia($request->avatar)->toMediaCollection('avatar');
        }

        Auth::user()->update([
            User::FIRST_NAME_COLUMN_NAME => $request[User::FIRST_NAME_COLUMN_NAME],
            User::LAST_NAME_COLUMN_NAME => $request[User::LAST_NAME_COLUMN_NAME],
            User::PHONE_COLUMN_NAME => $request[User::PHONE_COLUMN_NAME],
        ]);

        return redirect()->back()->with('success', translate('Your information has been updated'));
    }

    public function my_Account_update_password(UserUpdatePasswordRequest $request)
    {
        Auth::user()->update([
            User::PASSWORD_COLUMN_NAME => Hash::make($request->password),
        ]);

        Auth::logout();

        return redirect()->route('login');
    }
    public function user_update_password(Request $request)
    {

        #only admin or employe with permission update user auth can access this controlle 
        $request->validate([
            'password' => 'required|min:8|different:currentpassword|confirmed',
            'user_id' => 'required',
        ]);

        $user = User::find(decrypt($request->user_id));

        $user->update([
            User::PASSWORD_COLUMN_NAME => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', translate('Email updated'));
    }

    public function my_Account_update_email(UserUpdateEmailRequest $request)
    {
        Auth::user()->update([
            User::EMAIL_COLUMN_NAME => $request->email
        ]);

        return redirect()->back()->with('success', translate('Email updated'));
    }
    public function user_update_email(Request $request)
    {
        #only admin or employe with permission update user auth can access this controlle 
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'user_id' => 'required',
        ]);

        $user = User::find(decrypt($request->user_id));

        $user->update([
            User::EMAIL_COLUMN_NAME => $request->email
        ]);

        return redirect()->back()->with('success', translate('Email updated'));
    }

    public function update_user_email(UserUpdateEmailRequest $request)
    {
        User::find(decrypt($request->user_id))->update([
            User::EMAIL_COLUMN_NAME => $request->email
        ]);

        return redirect()->back()->with('success', translate('Email updated'));
    }

    public function edit($id)
    {
        $user = User::find(decrypt($id));
        $cities = City::all();
        return view('backend.users.edit', compact('user', 'cities'));
    }

    public function Search(Request $request)
    {
        $users = User::where(User::FIRST_NAME_COLUMN_NAME, 'LIKE', '%' . $request->search . '%')->whereHas("roles", function ($q) {
            $q->where("name", "<>", UpdatepermissionsEnum::ADMIN_ROLE);
        })
            ->Orwhere(User::LAST_NAME_COLUMN_NAME, 'LIKE', '%' . $request->search . '%')->whereHas("roles", function ($q) {
                $q->where("name", "<>", UpdatepermissionsEnum::ADMIN_ROLE);
            })
            ->Orwhere(User::PHONE_COLUMN_NAME, 'LIKE', '%' . $request->search . '%')->whereHas("roles", function ($q) {
                $q->where("name", "<>", UpdatepermissionsEnum::ADMIN_ROLE);
            })
            ->Orwhere(User::EMAIL_COLUMN_NAME, 'LIKE', '%' . $request->search . '%')->whereHas("roles", function ($q) {
                $q->where("name", "<>", UpdatepermissionsEnum::ADMIN_ROLE);
            })
            ->paginate(10);

        return view('backend.users.index', compact('users'));
    }
    public function Filter(Request $request)
    {
        $users = User::orderBy('created_at', 'asc');

        if ($request->search != null) {
            $users = $users->where(User::FIRST_NAME_COLUMN_NAME, 'LIKE', '%' . $request->search . '%')
                ->Orwhere(User::LAST_NAME_COLUMN_NAME, 'LIKE', '%' . $request->search . '%')
                ->Orwhere(User::PHONE_COLUMN_NAME, 'LIKE', '%' . $request->search . '%')
                ->Orwhere(User::EMAIL_COLUMN_NAME, 'LIKE', '%' . $request->search . '%');
        }

        if ($request->role != null) {

            abort_if(!in_array($request->role, [UpdatepermissionsEnum::MANAGER_ROLE, UpdatepermissionsEnum::CUSTOMER_ROLE]), 403);

            $users = $users->whereHas("roles", function ($q) use ($request) {
                $q->where("name", "LIKE", $request->role);
            });
        }

        if ($request->is_active != null) {

            $users = $users->where("is_active",);
        }

        return view('backend.users.index', compact('users'));
    }

    public function ban_user(UserBanRequest $request)
    {
        User::find(decrypt($request->user_id))->update([
            User::IS_ACTIVE_COLUMN_NAME => 0
        ]);

        return redirect()->back()->with('success', translate('User baned'));
    }

    public function unban_user(UserUnbanRequest $request)
    {
        User::find(decrypt($request->user_id))->update([
            User::IS_ACTIVE_COLUMN_NAME => 1
        ]);

        return redirect()->back()->with('success', translate('User unbaned'));
    }

    public function permissions($user_id)
    {
        $user = User::find(decrypt($user_id));
        $permissions_by_role = $user->getPermissionsViaRoles();
        $direct_permission = $user->getDirectPermissions();
        $all_permissions = $user->getAllPermissions();
        return view('backend.users.permissions', compact('user'));
    }

    public function create_new_manager()
    {
        $cities = City::all();
        return view('backend.users.create_new_manager', compact('cities'));
    }
    public function store_new_manager(UserCreateManagerRequest $request)
    {
        $user = User::create([
            User::EMAIL_COLUMN_NAME => $request[User::EMAIL_COLUMN_NAME],
            User::PASSWORD_COLUMN_NAME => Hash::make($request[User::EMAIL_COLUMN_NAME]),
            User::FIRST_NAME_COLUMN_NAME => $request[User::FIRST_NAME_COLUMN_NAME],
            User::LAST_NAME_COLUMN_NAME => $request[User::LAST_NAME_COLUMN_NAME],
            User::PHONE_COLUMN_NAME => $request[User::PHONE_COLUMN_NAME],
        ]);

        $user->givePermissionTo(UpdatepermissionsEnum::MANAGER_MAIN_PERMISSION);

        if ($request->role_permissions != null) {
            foreach ($request->role_permissions as $role_permission) {
                $user->givePermissionTo($role_permission);
            }
        }
        #manage language permissions
        if ($request->language_permissions != null) {
            foreach ($request->language_permissions as $language_permission) {
                $user->givePermissionTo($language_permission);
            }
        }
        #manage users permissions
        if ($request->users_permissions != null) {
            foreach ($request->users_permissions as $user_permission) {
                $user->givePermissionTo($user_permission);
            }
        }
        return redirect()->route('users.index')->with('success', translate('You just created a new manager'));
    }

    public function create_new_customer()
    {
        return view('backend.users.create_new_customer');
    }
}
