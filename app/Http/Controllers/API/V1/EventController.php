<?php

namespace App\Http\Controllers\API\V1;

use App\Models\EventMember;
use App\Models\Events;
use App\Models\Files;
use App\Models\Speakers;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $events = Events::with('members','users')->paginate(15) ;


        return view('pages.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('pages.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'desc' => 'required|string',
            'program' => 'required|string',
            'cover' =>'required | mimes:jpeg,png|max:1024',
            'date' => 'required',
            'speaker' => 'required|string',
        ]);
        $data = $request->only(['name','desc','program','date','speaker','cover','file']);

        $items = $request->file ;
        foreach ($items as $key=>$file) {
            $request->validate([
                $key => [
                    'file' => 'required | mimes:pdf,pptx,jpeg,png|max:100960',
                ]
            ]);
        };

        $path = null;
        $speakers_id = Speakers::create(['name'=>$request->speaker]);
        $cover = $request->cover->getClientOriginalName();
        $cover_path = Storage::putFileAs('cover',$request->cover, $cover);

        $data = [
            'name' =>$request->name,
            'desc' =>$request->desc,
            'cover' =>$cover_path,
            'program' => $request->program,
            'date' => date('d-m-Y H-i-s', strtotime($request->date)),
            'speakers_id' =>intval($speakers_id->id),
        ];
        if ($request->file  !== null && count($request->file) > 1){
            $id = Events::create($data);
            $file_ids =[];
            foreach ($request->file as $key=>$item){
                $fileName = $item->getClientOriginalName();
                $path = Storage::putFileAs('file',$item, $fileName);
                $file_id= Files::create(['path'=>$path]);
                $file_ids[]=$file_id->id;
            }

            $id->files()->sync($file_ids);
        }else{
            $cover = $request->cover->getClientOriginalName();
            $cover_path = Storage::putFileAs('cover',$request->cover, $cover);
            $fileName = $request->file[0]->getClientOriginalName();
            $path = Storage::putFileAs('file',$request->file[0], $fileName);
            $file_id = Files::create(['path'=>$path]);
            $data = [
                'name' =>$request->name,
                'desc' =>$request->desc,
                'program' => $request->program,
                'cover' => $cover_path,
                'date' => date('d-m-Y H-i-s', strtotime($request->date)),
                'speakers_id' =>intval($speakers_id->id),
                'files_id' => $file_id
            ];
            $id = Events::create($data);
            $id->files()->sync($file_id);
        }

        return back()
            ->with('success','You have successfully upload file.');
//            ->with('file', $fileName);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Events::with('files','members','speakers','users')->findOrFail($id);

        return response()->view('pages.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Events::with('members','users','files','speakers')->findOrFail($id);

        return response()->view('pages.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $speaker_id = null;
        $event = Events::findOrFail($id);
        if (isset($request->speakers)){
            $speaker_id = Speakers::create(['name'=>$request->speakers]);
            $event->update([
                'name'=>$request->name,
                'program'=>$request->program,
                'desc'=>$request->desc,
                'date'=>date('d-m-Y H-i-s', strtotime($request->date)),
                'speakers'=>intval($speaker_id->id),
            ]);
        }
        $event->update([
            'name'=>$request->name,
            'program'=>$request->program,
            'desc'=>$request->desc,
            'date'=>date('d-m-Y H-i-s', strtotime($request->date)),
        ]);
        return redirect()->route('events.index')->with('успешно', 'Мероприятие обнавлео');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Events $event)
    {
//        dd($event);
//        $event = Events::findOrFail($events);
        $event->delete();

        return redirect()->route('events.index')->with('успешно', 'Мероприятие удалено');
    }

    public function today($today): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Application
    {

        return view('pages.events.today');
    }
    public function future($future)
    {
        dd('future');
        return view('pages.events.future');
    }
    public function deleteMembers($event, $id)
    {
        dd($event,$id);
        $event = EventMember::find($id);
        return response('deleted user '.$id);
    }
    public function restore($id)
    {
        Events::where('id', $id)->withTrashed()->restore();

        return redirect()->route('events.index', ['status' => 'архив'])
            ->withSuccess(__('Мероприятие востановлено.'));
    }

    public function addmod($id,$user){
        dd($id,$user);
        dd($user);

    }
}
