<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Data;
class DataController extends Controller
{
    public function index(){
        $data = Data::all();
        return view ('welcome', ['data' => $data]);
    }
    public function create(){
        $data = new Data;
        $data->name = $request->name;
        $data->save();
        return back();
    }
    public function store(Request $request){
        $data = new Data;
        $data->name = $request->name;
        $data->save();
        return back();
    }
    public function generate ($id)
    {
        $data = Data::findOrFail($id);
        $qrcode = QrCode::size(400)->generate($data->name);
        return view('qrcode',compact('qrcode'));
    }
    
    /**Direct Ke SMS**/
    // public function generate ($id)
    // {
    //     $data = Data::findOrFail($id);
    //     $qrcode = QrCode::size(400)->email($data->email);
    //     return view('qrcode',compact('qrcode'));
    // }

    /**Direct Ke SMS**/
    // public function generate ($id)
    // {
    //     $data = Data::findOrFail($id);
    //     $qrcode = QrCode::size(400)->SMS($data->phone);
    //     return view('qrcode',compact('qrcode'));
    // }

    /**Langsung Direct Ke Telepon**/
    // public function generate ($id)
    // {
    //     $data = Data::findOrFail($id);
    //     $qrcode = QrCode::size(400)->phoneNumber($data->phone);
    //     return view('qrcode',compact('qrcode'));
    // }
//     public function create(){
//         return view('anggota.create');
//     }

//     public function store(Request $request){
//         $request->validate([
//             'nama' => 'required',
//             'kelas' => 'required',
//             'agama' => 'required',
//             'no_hp' => 'required|numeric',
//             'alamat' => 'required',
//         ]);
//         $model = Anggota::all();
//         if (count($model) >= 30) {
//                 return redirect()->route('anggota.index')
//                                  ->with('error', 'Anggota Sudah Menuju Tak Terbatas Dan Melampauinya!');
//         }
//         Anggota::create($request->all());
//         return redirect()->route('anggota.index')
//                          ->with('success','anggota created successfully.');
//     }

//     public function show(Anggota $anggota){
//         return view('anggota.show',compact('anggota'));
//     }

//     public function edit($id){
//         $anggota = Anggota::findorFail($id);
//         return view('anggota.edit', compact('anggota'));
//     }

//     public function update(Request $request, $id){
//         $request->validate([
//             'nama' => 'required',
//             'kelas' => 'required',
//             'agama' => 'required',
//             'no_hp' => 'required|numeric',
//             'alamat' => 'required',
//         ]);
//         $anggota = Anggota::findorFail($id);
//         $anggota->update($request->all());
//         return redirect()->route('anggota.index')
//                          ->with('success','anggota updated successfully');
//     }

//     public function destroy($id){
//         $anggota = Anggota::findorFail($id);
//         $anggota->delete();
//         return redirect()->route('anggota.index')
//                          ->with('success','anggota deleted successfully');
}