<?php

namespace Modules\Admin\Http\Controllers;

use App\Exports\ApplicationsExport;
use App\Http\Controllers\Controller;
use App\Imports\ApplicationsImport;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use App\Models\Branch;
use App\Models\Applications;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Validation\Rule;
use DataTables;
use Auth;
use Dompdf\Dompdf;

class ApplicationsController extends Controller
{


    public function headerColumns($deleted = false)
    {
        $array = array(

            ['SL', 'SL','text-center', 'width: 5% !important'],
            ['rf_embassy', 'rf_embassy','text-left'],
            ['submit_date', 'submit_date','text-center'],
            ['invoice_date', 'invoice_date','text-center'],
            ['name', 'name','text-left'],
            ['old_mrp_no', 'old_mrp_no','text-left'],
            ['new_mrp_no', 'new_mrp_no','text-left'],
            ['enrollment_no', 'enrollment_no','text-center'],
            ['mobile_no', 'mobile_no','text-left'],
            ['status', 'created_by','text-center'],
            ['remarks', 'remarks','text-center'],
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
        $title='Applications';
        $applications = Applications::orderBy('id','desc');

        $options = [
                'Employee' => auth()->user()->hasRole('Employee'),
                'application-edit' => auth()->user()->hasPermissionTo('application-edit'),
                'application-delete' => auth()->user()->hasPermissionTo('application-delete'),
                'application-employee-edit' => auth()->user()->hasPermissionTo('application-employee-edit'),
            ];

        try {
            if (request()->ajax()) {
                return Datatables::of($applications)
                /*->addIndexColumn()*/
                ->setRowId('serial_no')
                ->editColumn('rf_embassy', function($values){
                    return date('d-M-Y',strtotime($values->rf_embassy));
                })
                ->addColumn('SL', function($values){
                    return $values->serial_no;
                })
                ->editColumn('submit_date', function($values){
                    return date('d-M-Y',strtotime($values->submit_date));
                })
                
                ->editColumn('invoice_date', function($values){
                    return date('d-m-Y',strtotime($values->invoice_date));
                })
                ->addColumn('created_by', function($values){
                    return isset($values->user->name)?$values->user->name:'';
                })
                ->filterColumn('created_by', function ($query, $keyword) {
                    return $query->whereHas('user', function ($query) use($keyword) {
                        $query->where('name', 'LIKE', '%'.$keyword.'%');
                    });
                })
                ->editColumn('status', function($values){
                    return ucwords($values->status);
                })
                ->addColumn('actions', function($values) use($options){

                    $actions ='';

                    $actions .= '<a href="javascript:void(0)" onclick="return showApplicationDetails('.$values->id.')" class="btn btn-info btn-sm mb-2"><i class="mdi mdi-eye" title="Click to view details"></i></a>';
                    if($options['application-edit']){

                        $actions .='<a href="'.route('applications.edit', $values->id).'" class="btn btn-warning btn-sm mb-2"><i class="mdi mdi-pencil-box" title="Click to Edit"></i></a>';
                    }

                    if($options['Employee']){

                        $actions .='<a href="'.route('applications.employee.edit', $values->id).'" class="btn btn-warning btn-sm mb-2"><i class="mdi mdi-pencil-box" title="Click to Edit"></i></a>';
                    }

                    if($options['application-delete']){
                        $actions .='<a class="btn btn-sm btn-danger mb-2" onclick="deleteFromCRUD($(this))" data-src="'.route('applications.destroy', $values->id).'"><i class="mdi mdi-trash-can"></i></a>';
                    }

                    return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
            }

            return view('admin::application.index', [
                'title' => 'Applications',
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
        $title="Application create";
        $branches = [''=>'--Select One--']+Branch::orderBy('id','desc')->pluck('name','id')->all();

        return view('admin::application.create',compact('title','branches'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');

        $this->validate($request, [
            'name' => ['required', 'string', 'max:64'],
            'serial_no' => ['nullable', 'string', 'max:32'],
            'mobile_no' => ['nullable', 'string', 'max:14', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'branch_name' => ['required'],
            'rf_embassy' => ['nullable', 'string', 'max:64'],
            'submit_date' => ['nullable', 'string', 'max:32'],
            'invoice_date' => ['nullable', 'string', 'max:32'],
            'old_mrp_no' => ['nullable', 'string', 'max:32'],
            'new_mrp_no' => ['nullable', 'string', 'max:32'],
            'enrollment_no' => ['nullable', 'string', 'max:64'],
        ]);

        DB::beginTransaction();

        try {
            Applications::create($input);

            DB::commit();

            return $this->backWithSuccess('Applications created successfully');

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
        $application = Applications::findOrFail($id);

        return view('admin::application.show', compact('application'));

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editByEmployee($id)
    {
        $application = Applications::findOrFail($id);
        $title="Application Update";

        return view('admin::application.editEmployee', compact('application','title'));

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $application = Applications::findOrFail($id);
        $title="Application Edit";
        $branches = [''=>'--Select One--']+Branch::orderBy('id','desc')->pluck('name','id')->all();

        return view('admin::application.edit',compact('application','title','branches'));
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

            'serial_no' => ['nullable', 'string', 'max:32'],
            'mobile_no' => ['nullable', 'string', 'max:14', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'rf_embassy' => ['nullable', 'string', 'max:64'],
            'submit_date' => ['nullable', 'string', 'max:32'],
            'invoice_date' => ['nullable', 'string', 'max:32'],
            'old_mrp_no' => ['nullable', 'string', 'max:32'],
            'new_mrp_no' => ['nullable', 'string', 'max:32'],
            'enrollment_no' => ['nullable', 'string', 'max:64'],
        ]);

        $input = $request->except('_token');

        DB::beginTransaction();
        try{
            $application = Applications::findOrFail($id);

            $application->update($input);

            DB::commit();

            return $this->redirectBackWithSuccess('Application Data Update successfully','applications.index');

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

            $application = Applications::find($id)->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Application has been deleted successfully!'
            ]);
        }catch(Exception $e){
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function importApplication()
    {
        $title="Application Import";
        $branches = [''=>'--Select One--']+Branch::orderBy('id','desc')->pluck('name','id')->all();

        return view('admin::application.import',compact('title','branches'));
    }

    public function importApplicationData(Request $request)
    {
        try {

            $this->validate($request, [
                'branch_id' => ['required'],
                'file' => ['required'],
            ]);
            DB::beginTransaction();
            if ($request['file']){
                $sheets = Excel::toArray(new ApplicationsImport, $request->file);
                $applications = [];
                if(isset($sheets[0])){
                    foreach($sheets as $sheet){
                        foreach($sheet as $key => $row){
                            if($key > 0){
//                                dd($row);
                                array_push($applications, [
                                    "branch_id" => $request->branch_id,
                                    "serial_no" => trim($row[0]),
                                    "rf_embassy" => $row[1],
                                    "submit_date" => date('Y-m-d'),
                                    "invoice_date" => date('Y-m-d'),
                                    "name" => $row[6],
                                    "old_mrp_no" => $row[7],
                                    "new_mrp_no" => $row[8],
                                    "enrollment_no" => $row[9],
                                    "mobile_no" => $row[10],
                                    "status" => $row[12],
                                    "created_by" => \Illuminate\Support\Facades\Auth::id(),
                                    "remarks" => $row[13],
                                ]);
                            }
                        }
                    }
                }
                if(isset($applications[0])){
                    Applications::insert($applications);
                    DB::commit();
                }

                return $this->redirectBackWithSuccess(count($applications).' has been uploaded','applications.index');
            }else{
                return $this->redirectBackWithWarning('File not found','applications.import');
            }

        }catch(Exception $e){
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function ExportApplicationFile()
    {
        return Excel::download(new ApplicationsExport(), 'application.xlsx');
    }

    public function printApplication($id)
    {
        $application = Applications::findOrFail($id);
        $title="Application Edit";
        $branches = [''=>'--Select One--']+Branch::orderBy('id','desc')->pluck('name','id')->all();

        $view = view('admin::application.print',compact('application','title','branches'));
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
//        $dompdf->stream();

        return $dompdf->stream();
    }
}
