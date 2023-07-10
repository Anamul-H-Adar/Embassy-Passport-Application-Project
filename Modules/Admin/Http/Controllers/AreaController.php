<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Validator;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Validation\Rule;
use DataTables;
use Auth;

class AreaController extends Controller
{   


    public function headerColumns($deleted = false)
    {
        $array = array(
            ['SL', 'SL','text-center', 'width: 8% !important'],
            ['name', 'name'],
            ['remark', 'remark'],
            ['created_at', 'created_at', 'text-center', 'width: 8% !important']
        );

        if($deleted){
            array_push($array, ['deleted_at', 'deleted_at', 'text-center', 'width: 8% !important']);
        }

        array_push($array, ['actions', 'actions', 'text-center', 'width: 20% !important']);

        return $array;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $title='Branch';
        $branch= Branch::all();
        
        try {
            if (request()->ajax()) {
                return Datatables::of($branch)
                ->addIndexColumn()
                
                ->editColumn('created_at', function($branch){
                    return date('d-m-Y',strtotime($branch->created_at));
                })
                ->addColumn('actions', function($branch){
                    $actions = '<a href="javascript:void(0)" onclick="return showBranchDetails('.$branch->id.')" class="btn btn-info btn-sm mb-2"><i class="mdi mdi-eye" title="Click to view details"></i></a>
                    <a href="'.route('area.branch.edit', $branch->id).'" class="btn btn-warning btn-sm mb-2"><i class="mdi mdi-pencil-box" title="Click to Edit"></i></a>
                    <a class="btn btn-sm btn-danger mb-2" onclick="deleteFromCRUD($(this))" data-src="'.route('area.branch.destroy', $branch->id).'"><i class="mdi mdi-trash-can"></i></a>';

                    return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
            }

            return view('admin::branch.index', [
                'title' => 'Branch',
                'headerColumns' => $this->headerColumns()
            ]);
        }catch (\Throwable $th){
            return $this->backWithError($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::branch.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');

        $validator = Validator::make($request->all(),[
            'name.*' => 'required|unique:permissions,name'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            Branch::create([
                'name' => $input['name'],
                'remark' => $input['remark'],
            ]);
        
            DB::commit();

            return $this->backWithSuccess('Branch created successfully');

            } catch (Exception $e) {
                DB::rollback();
                return $this->backWithError($e->getMessage());
            }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {   
        $branch = Branch::findOrFail($id);
        
        return view('admin::branch.show', compact('branch'));

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {   
        $branch = Branch::findOrFail($id);

        return view('admin::branch.edit',compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:64', Rule::unique('branch')->ignore($id)],
        ]);

        $input = $request->except('password','_token');
        
        DB::beginTransaction();
        try{
            $branch = Branch::findOrFail($id);
            
            $branch->update($input);
            
            DB::commit();

            return $this->redirectBackWithSuccess('Branch Data Update successfully','area.branch.index');

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
        DB::beginTransaction();
        try{

            $branch = Branch::find($id)->delete();
                
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data has been deleted successfully!'
            ]);
        }catch(Exception $e){
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
