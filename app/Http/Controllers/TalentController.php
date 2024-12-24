<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Talent;
use App\Models\Category;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Exports\TalentExport;
use App\Imports\TalentImport;
use Maatwebsite\Excel\Facades\Excel;

class TalentController extends Controller
{
    public function index()
    {
        if(request('name')){
            Talent::firstWhere('id', request(('name')));
        }

        $sort = request()->query('sort', 'id');
        $direction = request()->query('direction', 'asc');

        $tables = Talent::query()
            ->select('talent.*')
            ->with('categories')
            ->when($sort === 'category', function($query) use ($direction) {
                $query->leftJoin('category_talent', 'talent.id', '=', 'category_talent.talent_id')
                    ->leftJoin('categories', 'category_talent.category_id', '=', 'categories.id')
                    ->orderBy('categories.name', $direction);
            }, function($query) use ($sort, $direction) {
                $query->orderBy($sort, $direction);
            })
            ->filter(request(['search', 'name', 'category', 'mcn', 'staff', 'bulan']))
            ->paginate(10)
            ->withQueryString();

        return view('talents.main', [
            'title' => 'Talent',
            'search' => 'talent',
            'tables' => $tables,
            'staffs' => Staff::has('talents')->get(),
            'categories' => Category::orderBy('name')->get(),
            'provinces' => Province::all(),
            'export' => 'exportTalent'
        ]);
    }

    public function store(Request  $request)
    {
        //
    }

    public function update(Request $request, Talent $talent)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required|max:12',
            'place' => 'required',
            'date' => 'required',
            'engagement' => 'required',
            'category_id' => 'nullable',
            'instagram' => 'required',
            'finstagram' => 'required',
            'rate_igs' => 'required',
            'rate_igf' => 'required',
            'rate_igr' => 'required',
            'rate_igl' => 'required',
            'tiktok' => 'required',
            'ftiktok' => 'required',
            'rate_ttf' => 'required',
            'rate_ttl' => 'required',
            'youtube' => 'required',
            'syoutube' => 'required',
            'rate_yt' => 'required',
            'rate_event' => 'required',
            'talent_exclusive' => 'required',
            'shopee_affiliate' => 'required',
            'tiktok_affiliate' => 'required',
            'mcn_tiktok' => 'required', 
            'status' => 'required',
            'village_id' => 'required',

            // Tambahan untuk data Payment
            'account_name' => 'nullable',
            'account_number' => 'nullable',
            'bank_name' => 'nullable',
            'npwp' => 'nullable|regex:/^\d{2}\.\d{3}\.\d{3}\.\d-\d{3}\.\d{3}$/',
            'nik' => 'nullable|digits:16',
        ]);

        // dd($validatedData);

        // Check if a new photo is uploaded
        if($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('images/talents');
        } 
        else {
            // No new photo uploaded, keep the existing one
            $validatedData['photo'] = $talent->photo;
        }

        // UPDATE DATA KATEGORY
        $talent->categories()->sync($request->category_id);
        // remove category_id from validatedData
        unset($validatedData['category_id']);

        Talent::where('id', $talent->id)
                ->update($validatedData);

        return redirect('/talent')->with('success', 'Data has been updated!');
    }

    public function destroy(Talent $talent)
    {
        try {
            Talent::destroy($talent->id);

            return redirect('/talent')->with('success', 'Data has been deleted!');
        } catch (\Throwable $th) {
            return redirect('/talent')->with('error', 'Data cannot Delete');
        }
    }

    public function export()
    {
        return Excel::download(new TalentExport, 'talent.xlsx');
    }

    public function registrasi()
    {
        return view('forms.form', [
            'title' => "FYP Media",
            'categories' => Category::orderBy('name')->get(),
            'staffs' => Staff::all(),
            'provinces' => Province::all()
        ]);
    }

    public function form(Request $request)
    {   

        // DAPATKAN DATA ID STAFF TERAKHIR
        // $result = $request->staff_id == 'input_manual';
        // dd($result);
        // dd($request->staff_name_manual_input);
        // dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required|max:12',
            'place' => 'required',
            'date' => 'required',
            'village_id' => 'required',
            'engagement' => 'required',
            'category_id' => 'required',
            'instagram' => 'required',
            'finstagram' => 'required',
            'rate_igs' => 'required',
            'rate_igf' => 'required',
            'rate_igr' => 'required',
            'rate_igl' => 'required',
            'tiktok' => 'required',
            'ftiktok' => 'required',
            'rate_ttf' => 'required',
            'rate_ttl' => 'required',
            'youtube' => 'required',
            'syoutube' => 'required',
            'rate_yt' => 'required',
            'rate_event' => 'required',
            'talent_exclusive' => 'required',
            'staff_id' => 'required',
            'shopee_affiliate' => 'required',
            'tiktok_affiliate' => 'required',
            'mcn_tiktok' => 'required',
            'photo' => 'image|file|max:5120',
            'manual_staff_name' => 'required_if:staff_id,input_manual',
            'statement' => 'required',

            // Ini untuk display agar formatnya sama di html blade form
            'rate_igs_display' => 'nullable',
            'rate_igf_display' => 'nullable',
            'rate_igr_display' => 'nullable',
            'rate_igl_display' => 'nullable',
            'rate_ttf_display' => 'nullable',
            'rate_ttl_display' => 'nullable',
            'rate_yt_display' => 'nullable',
            'rate_event_display' => 'nullable',
            'staff_id_display' => 'nullable',

            // Tambahan untuk data Payment
            'account_name' => 'nullable',
            'account_number' => 'nullable',
            'bank_name' => 'nullable',
            'npwp' => 'nullable|regex:/^\d{2}\.\d{3}\.\d{3}\.\d-\d{3}\.\d{3}$/',
            'nik' => 'nullable|digits:16',
        ]);

        // NAMA TIDAK BOLEH SAMA 
        $talentName = Talent::where('name', $validatedData['name'])->first();
        if ($talentName) {
            return back()->with('error', 'Gagal. Talent dengan nama "' . $validatedData['name'] . '" sudah terdaftar!');
        }

        $categories = $validatedData['category_id'];

        unset($validatedData['category_id']);

        if($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('images/talents');
        }


        // // CEK NILAI DARI staff_id
        // if ($request->staff_id == 'input_manual') {
        
        //     // Ambil data nama staff dari request
        //     $staffName = $request->manual_staff_name;
    
        //     // Simpan data staff baru
        //     $save = Staff::create([
        //         'name' => $staffName,
        //         'email' => '',
        //         'phone' => '',
        //         'place' => '',
        //         'birth' => null,
        //         'village_id' => null,
        //         'address' => '',
        //         'position_id' => 1,
        //         'photo' => '', // 1MB Max
        //         'instagram' => '',
        //         'linkedin' => ''
        //     ]);
    
        //     // Tambahkan ID staff yang baru ditambahkan ke data yang divalidasi
        //     $validatedData['staff_id'] = $save->id;

        // }

        $talent = Talent::create($validatedData);
        
        foreach ($categories as $category)
        {
            $talent->categories()->attach($category);
        }

        // Redirect ke halaman registrasi talent dengan pesan sukses
        return back()->with('success', 'Berhasil Mendaftar!');

    }

    public function page()
    {
        return view('forms.main', [
            'title' => 'Registrasi',
            'search' => 'fregsitrasi',
            'tables' => Talent::latest()->filter(request(['search', 'name']))->where('status', '=', 0)->paginate(10)->withQueryString(),
            'categories' => Category::orderBy('name')->get(),
            'export' => 'exportRegis'
        ]);
    }

    public function updateForm(Request $request, Talent $talent)
    {
        $validatedData = $request->validate([
            'status' => 'required'
        ]);

        // Check if a new photo is uploaded
        if($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('images/talents');
        } 
        else {
            // No new photo uploaded, keep the existing one
            $validatedData['photo'] = $talent->photo;
        }

        Talent::where('id', $talent->id)
                ->update($validatedData);

        return redirect('/fregistrasi')->with('success', 'Data has been updated!');
    }

    public function import(Request $request)
    {
        $validatedData = $request->file('file');

        $fileName = $validatedData->getClientOriginalName();
        $validatedData->move('TalentData', $fileName);

        Excel::import(new TalentImport, public_path('/TalentData/'.$fileName)); 
        
        return redirect('/talent')->with('success', 'Data has been added!');
    }
}
