<?php

namespace App\Http\Controllers\Admin;

use App\Models\User as User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        $user = new User();

        return view('admin.users.create', compact('user'));
    }

    public function store(Request $request)
    {

        dd($request);
        $this->validate($request, [
            'name' => ['required', 'min:3', 'max:255'],
            'lastname' => ['required', 'min:3', 'max:255'],
            'login' => ['required', 'unique:users', 'min:6', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5'],
            'linkedin' => ['required'],
            'phone_number' => ['required'],
            'type' => ['required'],
        ]);
        $user = User::create($request->except( 'password'));
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('users.show', $user);
    }

    public function show(User $user)
    {
        return view('admin.users.show',
            compact('user')
        );
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if ($user->login!=$request->login){
            $this->validate($request, [
                'name' => ['required', 'min:3', 'max:255'],
                'lastname' => ['required', 'min:3', 'max:255'],
                'login' => ['required', 'unique:users', 'min:6', 'max:255'],
                'email' => ['required', 'email'],
            ]);
        }else{
            $this->validate($request, [
                'name' => ['required', 'min:3', 'max:255'],
                'lastname' => ['required', 'min:3', 'max:255'],
                'email' => ['required', 'email'],
            ]);
        }
        $user->update($request->except( 'password'));

        $user->save();

        return redirect()->route('users.show', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        if($user->avatar) @unlink($user->avatar);
        return response('Success', 200);
    }

    public function uploadAvatar(Request $request)
    {
        dd($request);
    }

    public function api(){
        $data = User::get();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return $buttons = '<a href="'.route('users.show', $row->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="Просмотр">
                            <i class="jam jam-info"></i>
                        </a>
                        <a href="'.route('users.edit', $row->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" title="Редактировать">
                            <i class="jam jam-write"></i>
                        </a>
                        <a href="'.route('users.destroy', $row->id).'" data-id="'.$row->id.'" class="btn-to-alert m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Удалить">
                            <i class="jam jam-trash-alt"></i>
                        </a>';
            })
            ->addColumn('status', function ($row) {
                return $row->getStatus();
            })
            ->rawColumns(['action', 'status'])
            ->make(true);

    }
}
