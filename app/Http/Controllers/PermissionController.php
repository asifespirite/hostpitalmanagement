<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('id', 'desc')->paginate(10);
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|unique:permissions,name|max:100',
            'status' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Permission::create([
            'name' => $request->name,
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully!');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100|unique:permissions,name,' . $permission->id,
            'status' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $permission->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully!');
    }


    public function delete($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully!');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $permissions = Permission::query();

            return DataTables::of($permissions)
                ->addIndexColumn() // for numbering
                ->editColumn('status', function ($row) {
                    return $row->status
                        ? '<span class="badge bg-success">Active</span>'
                        : '<span class="badge bg-danger">Inactive</span>';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d M, Y');
                })
                ->addColumn('actions', function ($row) {
                    $editUrl = url('permission/edit/' . $row->id);
                    $deleteUrl = url('permission/delete/' . $row->id);

                    return '
                    <div class="d-inline-flex gap-1">
                        <a href="' . $editUrl . '" class="btn btn-sm btn-warning">
                            <i class="ri-edit-box-line"></i>
                        </a>
                        <form action="' . $deleteUrl . '" method="POST" onsubmit="return confirm(\'Are you sure?\')" style="display:inline;">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </form>
                    </div>
                ';
                })
                ->rawColumns(['status', 'actions']) // allow HTML
                ->make(true);
        }
    }
}
