<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class UserController extends Controller implements HasMiddleware
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public static function middleware(): array
    {
        return [
             new Middleware('role:superadmin|admin', only: ['index']),
        ];
    }

    public function index(User $user)
    {
        $users = $this->userRepository->get([
            'pagination' => 5
        ]);

        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $roles = Role::all();

        return view('admin.user.create', [
            'roles' => $roles
        ]);
    }

    public function store(UserStoreRequest $request, User $user)
    {
        try {
            DB::beginTransaction();

            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user = $this->userRepository->store($user);

            //Check Role id
            if (!empty($request->role_id)) {
                //Assign Role
                if ($request->role_id == 1) {
                    $user->assignRole('superadmin');
                }
    
                if ($request->role_id == 2) {
                    $user->assignRole('admin');
                }
    
                if ($request->role_id == 3) {
                    $user->assignRole('teacher');
                }
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }

        return redirect()->route('admin.user.index')->with([
            'success' => 'User has successfully created.'
        ]);
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.user.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        //Check, the new password can't be the same as before
        if (strcmp($request->current_password, $request->new_password) == 0) {
            return redirect()->back()->withErrors([
                'errors' => "Password can't be same as before!."
            ]);
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors([
                'errors' => 'Password did not match.'
            ]);
        }

        try {
            DB::beginTransaction();

            $user = $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->new_password)
            ]);
            $user = $this->userRepository->store($user);

            //Unsigned Roles
            if (!empty($user->syncRoles())) {
                $user->unsetRelation('roles')->unsetRelation('permissions');
            }

            //Check Role id
            if (!empty($request->role_id)) {
                //Assign Role
                if ($request->role_id == 1) {
                    $user->assignRole('superadmin');
                }
    
                if ($request->role_id == 2) {
                    $user->assignRole('admin');
                }
    
                if ($request->role_id == 3) {
                    $user->assignRole('teacher');
                }
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }

        return redirect()->route('admin.user.index')->with([
            'success' => 'User has been successfully updated.'
        ]);
    }

    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();

            $user->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }

        return redirect()->route('admin.user.index')->with([
            'success' => 'User has been successfully deleted.'
        ]);
    }
}
