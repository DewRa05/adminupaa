<?php

namespace App\Http\Controllers;

use App\Models\Lsp;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use App\Models\PelatihanUser;
use App\Models\KategoriPelatihan;
use Yajra\DataTables\Facades\DataTables;

class PelatihanController extends Controller
{
    public function index(Request $request)
    {
        // Check if the request is AJAX
        if ($request->ajax()) {
            $data = Pelatihan::with(['kategori', 'lsp'])->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.pelatihan.edit', $row->id);
                    $deleteUrl = route('admin.pelatihan.destroy', $row->id);
                    $detailUrl = route('admin.pelatihan.detail', $row->id);

                    return '
                    <a href="' . $detailUrl . '" class="btn btn-sm btn-info">
                        <i class="fas fa-eye" style="color: white;"></i>
                    </a>
                    <a href="' . $editUrl . '" class="btn btn-sm btn-primary">
                        <i class="fas fa-pen" style="color: white;"></i>
                    </a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure you want to delete this item?\');">
                        ' . csrf_field() . '
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash" style="color: white;"></i>
                        </button>
                    </form>
                ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.data.pelatihan.listpelatihan.index');
    }


    public function create()
    {
        $lsps = Lsp::all();
        $kategoris = KategoriPelatihan::all();
        return view('admin.data.pelatihan.listpelatihan.create', compact('lsps', 'kategoris'));
    }
    public function detail($id)
    {
        $pelatihan      = Pelatihan::findOrFail($id);
        $lsps           = Lsp::all();
        $kategoris      = KategoriPelatihan::all();
        $pelatihanuser  = PelatihanUser::all();
        $users = $pelatihan->users;

        return view('admin.data.pelatihan.listpelatihan.detail', compact('pelatihan', 'lsps', 'kategoris', 'users', 'pelatihanuser'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama'                  => 'required|string|max:125',
                'jenis_pelatihan'       => 'required|string|max:125',
                'deskripsi'             => 'required|string',
                'tanggal_pendaftaran'   => 'required|date',
                'berakhir_pendaftaran'  => 'required|date',
                'harga'                 => 'required|numeric',
                'kuota'                 => 'required|integer',
                'lsp_id'                => 'required|exists:lsp,id',
                'kategori_id'           => 'required|exists:kategori,id',
                'gambar'                => 'nullable|image|mimes:jpg,png|max:2048',
            ],
            [
                'nama.required'                 => 'Nama pelatihan harus diisi.',
                'nama.max'                      => 'Nama pelatihan maksimal 125 karakter.',
                'jenis_pelatihan.required'      => 'Jenis pelatihan harus diisi.',
                'jenis_pelatihan.max'           => 'Jenis pelatihan maksimal 125 karakter.',
                'deskripsi.required'            => 'Deskripsi harus diisi.',
                'tanggal_pendaftaran.required'  => 'Tanggal pendaftaran harus diisi.',
                'berakhir_pendaftaran.required' => 'Tanggal berakhir pendaftaran harus diisi.',
                'harga.required'                => 'Harga harus diisi.',
                'harga.numeric'                 => 'Harga harus berupa angka.',
                'kuota.required'                => 'Kuota harus diisi.',
                'kuota.integer'                 => 'Kuota harus berupa angka.',
                'lsp_id.required'               => 'LSP harus dipilih.',
                'kategori_id.required'          => 'Kategori harus dipilih.',
                'gambar.image'                  => 'File harus berupa gambar.',
                'gambar.mimes'                  => 'Gambar harus dalam format jpg atau png.',
                'gambar.max'                    => 'Gambar maksimal 2MB.',
            ]
        );

        $data = $request->all();

        // upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarNama = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('img/pelatihan'), $gambarNama);
            $data['gambar'] = $gambarNama;
        }

        Pelatihan::create($data);

        return redirect()->route('admin.pelatihan.index')->with('tambah_success', true);
    }

    public function edit($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);
        $lsps = Lsp::all();
        $kategoris = KategoriPelatihan::all();

        return view('admin.data.pelatihan.listpelatihan.edit', compact('pelatihan', 'lsps', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $pelatihan = Pelatihan::findOrFail($id);

        $request->validate(
            [
                'nama'                  => 'required|string|max:125',
                'jenis_pelatihan'       => 'required|string|max:125',
                'deskripsi'             => 'required|string',
                'tanggal_pendaftaran'   => 'required|date',
                'berakhir_pendaftaran'  => 'required|date',
                'harga'                 => 'required|numeric',
                'kuota'                 => 'required|integer',
                'lsp_id'                => 'required|exists:lsp,id',
                'kategori_id'           => 'required|exists:kategori,id',
                'gambar'                => 'nullable|image|mimes:jpg,png|max:2048',
            ],
            [
                'nama.required'                 => 'Nama pelatihan harus diisi.',
                'nama.max'                      => 'Nama pelatihan maksimal 125 karakter.',
                'jenis_pelatihan.required'      => 'Jenis pelatihan harus diisi.',
                'jenis_pelatihan.max'           => 'Jenis pelatihan maksimal 125 karakter.',
                'deskripsi.required'            => 'Deskripsi harus diisi.',
                'tanggal_pendaftaran.required'  => 'Tanggal pendaftaran harus diisi.',
                'berakhir_pendaftaran.required' => 'Tanggal berakhir pendaftaran harus diisi.',
                'harga.required'                => 'Harga harus diisi.',
                'harga.numeric'                 => 'Harga harus berupa angka.',
                'kuota.required'                => 'Kuota harus diisi.',
                'kuota.integer'                 => 'Kuota harus berupa angka.',
                'lsp_id.required'               => 'LSP harus dipilih.',
                'kategori_id.required'          => 'Kategori harus dipilih.',
                'gambar.image'                  => 'File harus berupa gambar.',
                'gambar.mimes'                  => 'Gambar harus dalam format jpg atau png.',
                'gambar.max'                    => 'Gambar maksimal 2MB.',
            ]
        );

        $data = $request->all();

        // Menghandle upload file gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($pelatihan->gambar && file_exists(public_path('img/pelatihan/' . $pelatihan->gambar))) {
                unlink(public_path('img/pelatihan/' . $pelatihan->gambar));
            }
            $gambar = $request->file('gambar');
            $gambarNama = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('img/pelatihan'), $gambarNama);
            $data['gambar'] = $gambarNama;
        }

        // Update data pelatihan
        $pelatihan->update($data);

        return redirect()->route('admin.pelatihan.edit', $id)->with('edit_success', true);
    }

    public function getParticipants($pelatihanId)
    {
        $pelatihan = Pelatihan::findOrFail($pelatihanId);
        $participants = PelatihanUser::with(['user', 'pelatihan'])
            ->where('pelatihan_id', $pelatihanId)
            ->get();

        return DataTables::of($participants)
            ->addColumn('user', function ($participant) {
                return $participant->user_id->nama;
            })
            ->addColumn('pelatihan', function ($participant) {
                return $participant->pelatihan_id->nama;
            })
            ->addColumn('status_pendaftaran', function ($participant) {
                return $participant->status_pendaftaran ? 'Lulus' : 'Tidak Lulus';
            })
            ->make(true);
    }


    public function destroy($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);

        try {
            // Hapus file gambar jika ada
            if ($pelatihan->gambar && file_exists(public_path('img/pelatihan/' . $pelatihan->gambar))) {
                unlink(public_path('img/pelatihan/' . $pelatihan->gambar));
            }

            $pelatihan->delete();
            return response()->json(['success' => true, 'message' => 'Pelatihan berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus pelatihan'], 500);
        }
    }
}
