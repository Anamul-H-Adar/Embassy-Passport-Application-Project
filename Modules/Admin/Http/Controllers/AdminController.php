<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Models\Branch;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserColumnVisibility;
use DB,Hash,Image;
use Illuminate\Validation\Rule;
use Nette\Utils\Callback;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $title="Admin Dashboard";

        $branch = Branch::all()->count();
        $last_month_branch = Branch::select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });
        $branch_percent = round($last_month_branch->count()/$branch*100, 2);

        $users = User::all()->count();

        $last_month_users = User::select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $user_percent = round($last_month_users->count()/$users*100,2);

        $application =  Applications::all()->count();
        $last_month_application = Applications::select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });
        $application_percent = round($last_month_application->count()/$application*100,2);

        return view('admin::layouts.dashboard',compact('title', 'branch', 'users', 'user_percent', 'branch_percent', 'application_percent'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function myAccount()
    {
        $title = "My Accounts | Settings";
        $user = Auth::user();

        return view('admin::myAccount.index', compact('title','user'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'phone' => ['required', 'string', 'max:15','unique:users,phone,'.$id],
        //     'email' => ['nullable', 'string', 'max:100','unique:users,email,'.$id],
        //     'username' => ['nullable', 'string', 'max:50','unique:users,username,'.$id],
        //     'avater' => 'image|mimes:jpeg,jpg,png,gif|nullable|max:5048',
        // ]);

        //dd($request->all());

        $input = $request->except('_token');
        $user = User::findOrFail($id);

        if (!$user) {
             return $this->backWithError('This User is not registered yet.');
        }

        if (!empty($request->password)){
            $input['password'] = Hash::make($input['password']);
        }

        DB::beginTransaction();
        try{

            $avatarPath='';
            if ($request->hasFile('avater'))
            {

                $avatarPath=$this->fileUpload($request->file('avater'),'uploads/users');
                $input['avater']=$avatarPath;

                if (!empty($user) && file_exists($user->avater)){
                    unlink($user->avater);
                }
            }

            $user = $user->update($input);
            DB::commit();
            return $this->redirectBackWithSuccess('User updated successfully','my.account');

        }catch (\Exception $e){
            DB::rollback();
            return $this->backWithError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function updateUserColumnVisibilities(Request $request)
    {
        UserColumnVisibility::updateOrCreate([
            'user_id' => auth()->user()->id,
            'url' => $request->url
        ],[
            'columns' => json_encode($request->columns)
        ]);
    }
}
