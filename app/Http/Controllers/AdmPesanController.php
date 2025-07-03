<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use Exception;

class AdmPesanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pesan', compact('pesans'));
    }

    public function destroy($id)
    {
        try {
            $pesan = Pesan::findOrFail($id);
            $pesan->delete();

            return redirect()->route('pesan')->with('success', 'Pesan berhasil dihapus!');
        } catch (Exception $e) {
            \Log::error('Error deleting Pesan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
