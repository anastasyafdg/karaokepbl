<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Storage;
use Exception;

class AdmRuanganController extends Controller
{
    // Menampilkan semua data ruangan
    public function index(Request $request)
    {
        $query = Ruangan::query();

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        if ($request->filled('paket')) {
            $query->where('paket', $request->paket);
        }

        $ruangan = $query->paginate(10);

        return view('admin.data_ruangan', compact('ruangan'));
    }

    // Menyimpan data ruangan baru
    public function simpan(Request $request)
    {
        try {
            // Cek apakah ID sudah ada terlebih dahulu
            $existingRuangan = Ruangan::where('id', $request->id)->first();
            if ($existingRuangan) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'ID Ruangan "' . $request->id . '" sudah ada! Silakan gunakan ID yang berbeda.')
                    ->withErrors(['id' => 'ID Ruangan sudah digunakan.']);
            }

            // Debug informasi file
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                \Log::info('File info:', [
                    'original_name' => $file->getClientOriginalName(),
                    'mime_type' => $file->getMimeType(),
                    'extension' => $file->getClientOriginalExtension(),
                    'size' => $file->getSize()
                ]);
            }

            // Validasi dengan aturan yang lebih fleksibel
            $request->validate([
                'id' => 'required|string|unique:ruangan,id|max:50',
                'jenis' => 'required|in:kecil,sedang,besar',
                'paket' => 'required|in:A,B,C',
                'kapasitas' => 'required|string|max:255',
                'harga' => 'required|numeric|min:0',
                'fasilitas' => 'required|string|max:1000',
                'jumlah_ruangan' => 'required|integer|min:0|max:50',
                'gambar' => 'required|file|mimes:jpg,jpeg,png,gif,webp|max:10240'
            ], [
                'id.required' => 'ID Ruangan wajib diisi',
                'id.unique' => 'ID Ruangan "' . $request->id . '" sudah ada, silakan gunakan ID yang berbeda',
                'id.max' => 'ID Ruangan maksimal 50 karakter',
                'jenis.required' => 'Jenis ruangan wajib dipilih',
                'jenis.in' => 'Jenis ruangan tidak valid',
                'paket.required' => 'Paket wajib dipilih',
                'paket.in' => 'Paket tidak valid',
                'kapasitas.required' => 'Kapasitas wajib diisi',
                'kapasitas.max' => 'Kapasitas maksimal 255 karakter',
                'harga.required' => 'Harga wajib diisi',
                'harga.numeric' => 'Harga harus berupa angka',
                'harga.min' => 'Harga tidak boleh kurang dari 0',
                'fasilitas.required' => 'Fasilitas wajib diisi',
                'fasilitas.max' => 'Fasilitas maksimal 1000 karakter',
                'jumlah_ruangan.required' => 'Jumlah ruangan wajib diisi',
                'jumlah_ruangan.integer' => 'Jumlah ruangan harus berupa angka',
                'jumlah_ruangan.min' => 'Jumlah ruangan minimal 0',
                'jumlah_ruangan.max' => 'Jumlah ruangan maksimal 50',
                'gambar.required' => 'Gambar wajib diupload',
                'gambar.file' => 'File harus berupa file yang valid',
                'gambar.mimes' => 'Format gambar harus jpg, jpeg, png, gif, atau webp',
                'gambar.max' => 'Ukuran gambar maksimal 10MB'
            ]);

            // Upload file gambar dengan validasi manual
            $fileName = null;
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                
                // Validasi manual format file
                $allowedMimes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                
                $fileMime = $file->getMimeType();
                $fileExtension = strtolower($file->getClientOriginalExtension());
                
                if (!in_array($fileMime, $allowedMimes) && !in_array($fileExtension, $allowedExtensions)) {
                    throw new Exception("Format file tidak didukung. File: {$file->getClientOriginalName()}, MIME: {$fileMime}, Ext: {$fileExtension}");
                }
                
                // Pastikan folder images ada
                $uploadPath = public_path('images');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }
                
                // Generate nama file unik
                $fileName = 'ruangan_' . time() . '_' . uniqid() . '.' . $fileExtension;
                
                // Upload file
                if (!$file->move($uploadPath, $fileName)) {
                    throw new Exception('Gagal mengupload file gambar');
                }
                
                \Log::info('File uploaded successfully: ' . $fileName);
            }

            // Simpan ke database
            $ruangan = Ruangan::create([
                'id' => $request->id,
                'jenis' => $request->jenis,
                'paket' => $request->paket,
                'kapasitas' => $request->kapasitas,
                'harga' => $request->harga,
                'fasilitas' => $request->fasilitas,
                'jumlah_ruangan' => $request->jumlah_ruangan,
                'gambar' => $fileName
            ]);

            return redirect()->route('data_ruangan')->with('success', 'Data ruangan berhasil disimpan!');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangani error validasi khusus
            return redirect()->back()
                ->withInput()
                ->withErrors($e->validator->errors())
                ->with('error', 'Terdapat kesalahan dalam data yang dimasukkan. Silakan periksa kembali.');
                
        } catch (Exception $e) {
            // Log error untuk debugging
            \Log::error('Error saving ruangan: ' . $e->getMessage());
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    // Update data ruangan
    public function update(Request $request, $id)
    {
        try {
            // Debug informasi file jika ada
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                \Log::info('Update file info:', [
                    'original_name' => $file->getClientOriginalName(),
                    'mime_type' => $file->getMimeType(),
                    'extension' => $file->getClientOriginalExtension(),
                    'size' => $file->getSize()
                ]);
            }

            $request->validate([
                'jenis' => 'required|in:kecil,sedang,besar',
                'paket' => 'required|in:A,B,C',
                'kapasitas' => 'required|string|max:255',
                'harga' => 'required|numeric|min:0',
                'fasilitas' => 'required|string|max:1000',
                'jumlah_ruangan' => 'required|integer|min:0|max:50',
                'gambar' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp|max:10240'
            ], [
                'jenis.required' => 'Jenis ruangan wajib dipilih',
                'paket.required' => 'Paket wajib dipilih',
                'kapasitas.required' => 'Kapasitas wajib diisi',
                'harga.required' => 'Harga wajib diisi',
                'harga.numeric' => 'Harga harus berupa angka',
                'fasilitas.required' => 'Fasilitas wajib diisi',
                'jumlah_ruangan.required' => 'Jumlah ruangan wajib diisi',
                'jumlah_ruangan.integer' => 'Jumlah ruangan harus berupa angka',
                'jumlah_ruangan.min' => 'Jumlah ruangan minimal 0',
                'jumlah_ruangan.max' => 'Jumlah ruangan maksimal 50',
                'gambar.mimes' => 'Format gambar harus jpg, jpeg, png, gif, atau webp',
                'gambar.max' => 'Ukuran gambar maksimal 10MB'
            ]);

            $ruangan = Ruangan::findOrFail($id);
            $data = $request->only(['jenis', 'paket', 'kapasitas', 'harga', 'fasilitas', 'jumlah_ruangan']);

            // Upload gambar baru jika ada
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                
                // Validasi manual format file
                $allowedMimes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                
                $fileMime = $file->getMimeType();
                $fileExtension = strtolower($file->getClientOriginalExtension());
                
                if (!in_array($fileMime, $allowedMimes) && !in_array($fileExtension, $allowedExtensions)) {
                    throw new Exception("Format file tidak didukung. File: {$file->getClientOriginalName()}, MIME: {$fileMime}, Ext: {$fileExtension}");
                }
                
                // Hapus gambar lama jika ada
                if ($ruangan->gambar && file_exists(public_path('images/' . $ruangan->gambar))) {
                    unlink(public_path('images/' . $ruangan->gambar));
                }

                $fileName = 'ruangan_' . time() . '_' . uniqid() . '.' . $fileExtension;
                
                // Pastikan folder images ada
                $uploadPath = public_path('images');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }
                
                if (!$file->move($uploadPath, $fileName)) {
                    throw new Exception('Gagal mengupload file gambar');
                }
                
                $data['gambar'] = $fileName;
                \Log::info('File updated successfully: ' . $fileName);
            }

            $ruangan->update($data);
            
            return redirect()->route('data_ruangan')->with('success', 'Data ruangan berhasil diperbarui!');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors($e->validator->errors())
                ->with('error', 'Terdapat kesalahan dalam data yang dimasukkan. Silakan periksa kembali.');
                
        } catch (Exception $e) {
            \Log::error('Error updating ruangan: ' . $e->getMessage());
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    // Menghapus data ruangan
    public function destroy($id)
    {
        try {
            $ruangan = Ruangan::findOrFail($id);
            
            // Hapus file gambar jika ada
            if ($ruangan->gambar && file_exists(public_path('images/' . $ruangan->gambar))) {
                unlink(public_path('images/' . $ruangan->gambar));
            }
            
            $ruangan->delete();
            
            return redirect()->route('data_ruangan')->with('success', 'Data ruangan berhasil dihapus!');
            
        } catch (Exception $e) {
            \Log::error('Error deleting ruangan: ' . $e->getMessage());
            
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    // Method untuk mengecek ketersediaan ID via AJAX (opsional)
    public function checkId(Request $request)
    {
        $id = $request->input('id');
        $exists = Ruangan::where('id', $id)->exists();
        
        return response()->json([
            'exists' => $exists,
            'message' => $exists ? 'ID sudah digunakan' : 'ID tersedia'
        ]);
    }
}