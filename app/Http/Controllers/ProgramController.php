<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Laravel\Prompts\Prompt;

use function Laravel\Prompts\error;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       return view('programs.listingprogram',[
        'programs' => Program::where('admin_id', Auth::id())->get(),
        'states' => Address::select( 'state')->distinct()->get()
        
       ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = Address::select('state')->distinct()->get(); // distict untuk remove duplicate data
        return view('programs.addprogram',compact('states'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->file('poster')->store('poster-images');
        $request->validate([
            'programname' => 'required|string|max:255',
            'details' => 'required|string',
            'state' => 'required|exists:addresses,state',
            'address_line' => 'required|string|max:255',
            'startdate' => 'required|date|after:today',
            'enddate' => 'required|date|after_or_equal:startdate',
            'deadline' => 'required|date|before:startdate',
            'type' => 'required|array',
            'poster'=>'image|file|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|string',
            'maxvol' => 'required|integer|min:1',
            'linkgp' => 'required|string',
        ]);
        //  dd($request->all()); 
        $address = Address::create([
            'state' => $request->state,
            'address_line'=>$request->address_line,
        ]);
        $program = new Program();
        $program->admin_id= Auth::id();
        $program->title =$request->programname;
        $program->description =$request->details;
        $program->address_id = $address->id;
        $program->startdate =$request->startdate;
        $program->enddate =$request->enddate;
        $program->deadline =$request->deadline;
        $program->type= $request->type;
        $program->status =$request->status;
        $program->max_vol =$request->maxvol;
        // $program->poster = 'none';
        if ($request->file('poster')){
            $program['poster']=$request->file('poster')->store('poster-images');
        }
        $program->linkgroup =$request->linkgp;
        $program->save();
        return redirect()->route('program.index')->with('success','Program Berjaya Dimasukkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $program_id)
    {
        $data = Program::with('Lokasi')->find($program_id);
        // dd($data);
        $states = Address::select( 'state')->distinct()->get();
        return view('programs.editprogram',compact('data','states')); // pasing array of data kat html
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,$program_id)
    {
        $request->validate([
            'programname' => 'required|string|max:255',
            'details' => 'required|string',
            'state' => 'required|exists:addresses,state',
            'address_line' => 'required|string|max:255',
            'startdate' => 'required|date',
            'enddate' => 'required|date|after_or_equal:startdate',
            'deadline' => 'required|date|before:startdate',
            'type' => 'required|array',
            'poster'=>'image|file|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|string',
            'maxvol' => 'required|integer|min:1',
            'linkgp' => 'required|string',
        ]);
        //  dd($request->all()); 
        // cari id 
        $progam = Program::findOrFail($program_id);
        if ($request->hasFile('poster')){
            //nak upload image baru
            $poster =$request->file('poster')->store('poster-images');
            //delete yang lama
             $target = $progam->poster;
        //    if(File::exists($target)){
        //         File::delete($target);
        //    }
            if($target){
                Storage::delete($target);
            }
            // update program dgn image
            $progam->update([
                'poster'    =>  $poster,
                'title'     =>  $request->programname,
                'startdate' =>  $request->startdate,
                'enddate'   =>  $request->enddate,
                'deadline'  =>  $request->deadline,
                'type'      =>  $request->type,
                'description' =>$request->details,
                'status' =>$request->status,
                'max_vol' =>$request->maxvol,
                'linkgroup' =>$request->linkgp,

            ]);
        }
        else{
            $progam->update([
                
                'title'     =>  $request->programname,
                'location'  =>  $request->location,
                'startdate' =>  $request->startdate,
                'enddate'   =>  $request->enddate,
                'deadline'  =>  $request->deadline,
                'type'      =>  $request->type,
                'description' =>$request->details,
                'status' =>$request->status,
                'max_vol' =>$request->maxvol,
                'linkgroup' =>$request->linkgp,
            ]);
        }
        $address = Address::find($request->address_id); 
        if ($address) {
            $address->update([
                'address_line' => $request->address_line,
                'state' => $request->state, 
            ]);
        }
        
        return redirect()->route('program.index')->with('success','Program Berjaya Dimasukkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($program_id)
    {
        $data = Program::find($program_id);
        if ($data){
            $data->delete();
        }
        return redirect()->route('program.index');
    }


    public function search(Request $request){
        if($request->has('search')){
            $cari = Program::where('title','LIKE','%'.$request->search.'%')->get();
        }
        else{
            $cari = Program::all();
        }

        $states = Address::select( 'state')->distinct()->get();
        $types = Program::select('type')->distinct();

        return view('listing',['totalPrograms' => $cari -> count(),'programs' => $cari,'states'=> $states,'types' => $types]);
    }

    public function filter(Request $request){
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $negeri = $request->state;
        $types = $request->type;
        $event = Program::query();
       
        if($startdate &&  $enddate){
        $event->whereDate('startdate','>=',$startdate)->whereDate('enddate','<=',$enddate);
        }
        if ($negeri ){
           $event->whereHas('Lokasi',function($pilih) use($negeri){
                $pilih->where('state', $negeri);
            });
        }
        if (!empty($types)){
            $event->where(function($check) use($types){
                foreach ($types as $type) {
                    $check -> whereJsonContains('type',$type);
                }

            });
        }

        $filter =$event->get();
        $states= Address::select('state')->distinct()->get();
        return view('listing',[
            'totalPrograms' => $filter -> count(),
            'programs' => $filter,
            'states' => $states,
            'types' => $types,
            ]);               
    }
}
