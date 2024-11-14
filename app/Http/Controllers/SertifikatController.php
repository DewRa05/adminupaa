<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SertifikatController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Sertifikat::with('user')
                ->select('user_id') // Only select user_id, assuming this is the unique key for users
                ->distinct(); // Ensure distinct users are returned

            // Filter by sertifikat_id if provided
            if ($request->has('sertifikat_id')) {
                $query->where('id', $request->sertifikat_id);
            }

            return DataTables::of($query)
                ->addColumn('user_nama', function ($row) {
                    $user = $row->user; // Access the user associated with the certificate
                    return $user->nama ?? 'N/A';
                })
                ->addColumn('user_role', function ($row) {
                    $user = $row->user; // Access the user associated with the certificate
                    return ucfirst($user->role ?? 'N/A');
                })
                ->addColumn('sertifikat', function ($row) {
                    return '<a class="btn btn-success btn-sm mx-1" href="' . route('admin.sertifikat.detail', ['userId' => $row->user_id]) . '">
                        <i class="fas fa-eye"></i> View
                    </a>';
                })
                ->rawColumns(['sertifikat'])
                ->make(true);
        }

        return view('admin.data.sertifikat.index');
    }

    public function detail($userId, Request $request)
    {
        $user = User::findOrFail($userId);

        if ($request->ajax()) {
            // Fetch sertifikat data only for AJAX requests
            $sertifikat = Sertifikat::where('user_id', $userId)->get();

            return DataTables::of($sertifikat)
                ->addColumn('action', function ($row) use ($userId) {
                    $editUrl = route('admin.sertifikat.edit', ['userId' => $userId, 'id' => $row->id]);
                    $deleteUrl = route('admin.sertifikat.destroy', ['userId' => $userId, 'id' => $row->id]);

                    return '
                    <a href="' . $editUrl . '" class="btn btn-sm btn-primary">Edit</a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure you want to delete this item?\');">
                        ' . csrf_field() . '
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger delete-button">Delete</button>
                    </form>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // Only pass user data to the initial view load
        return view('admin.data.sertifikat.detail', compact('user', 'userId'));
    }


    public function create($userId)
    {
        $user = User::findOrFail($userId);
        $roles = ['dosen', 'mahasiswa', 'masyarakat'];
        return view('admin.data.sertifikat.create', compact('user', 'roles'));
    }

    public function store(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $request->validate([
            'nama_pelatihan'    => 'required|string|max:255',
            'tanggal_berlaku'   => 'required|date',
            'tanggal_berakhir'  => 'required|date|after_or_equal:tanggal_berlaku',
            'sertifikat_file'   => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $sertifikat = $request->except('sertifikat_file');
        $sertifikat['user_id'] = $userId;

        if ($request->hasFile('sertifikat_file')) {
            $file = $request->file('sertifikat_file');
            $filePath = $file->store('sertifikat', 'public');
            $sertifikat['sertifikat_file'] = $filePath;
        }

        Sertifikat::create($sertifikat);

        return redirect()->route('admin.sertifikat.detail', $userId)->with('tambah_success', true);
    }

    public function edit($userId, $id)
    {
        $sertifikat = Sertifikat::findOrFail($id);
        $user = User::findOrFail($userId);
        $roles = ['dosen', 'mahasiswa', 'masyarakat'];
        return view('admin.data.sertifikat.edit', compact('user', 'roles', 'sertifikat'));
    }

    public function update(Request $request, $userId, $id)
    {
        $user = User::findOrFail($userId);
        $sertifikat = Sertifikat::findOrFail($id);

        // Validate the incoming request
        $request->validate([
            'nama_pelatihan'    => 'required|string|max:255',
            'tanggal_berlaku'   => 'required|date',
            'tanggal_berakhir'  => 'required|date|after_or_equal:tanggal_berlaku',
            'sertifikat_file'   => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Prepare data to update
        $data = [
            'nama_pelatihan'   => $request->nama_pelatihan,
            'tanggal_berlaku'  => $request->tanggal_berlaku,
            'tanggal_berakhir' => $request->tanggal_berakhir,
        ];

        // Handle file upload if a new file is provided
        if ($request->hasFile('sertifikat_file')) {
            // Delete the old file if it exists
            if ($sertifikat->sertifikat_file && Storage::disk('public')->exists($sertifikat->sertifikat_file)) {
                Storage::disk('public')->delete($sertifikat->sertifikat_file);
            }

            // Store the new file and update the file path in the data array
            $file = $request->file('sertifikat_file');
            $data['sertifikat_file'] = $file->store('sertifikat', 'public');
        }

        // Update the sertifikat with the new data
        $sertifikat->update($data);

        // Redirect with a success message
        return redirect()->route('admin.sertifikat.edit', ['userId' => $userId, 'id' => $sertifikat->id])
                 ->with('edit_success', true);
    }



    public function destroy($id)
    {
        $sertifikat = Sertifikat::findOrFail($id);
        $sertifikat->delete();

        return response()->json([
            'success' => true,
            'message' => 'Sertifikat berhasil dihapus.',
            'id' => $id
        ]);
    }
}
