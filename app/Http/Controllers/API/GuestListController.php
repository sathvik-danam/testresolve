<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GuestList;

class GuestListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                // $id = auth('api')->id();
        // return GuestList::latest()->where('user_id',$id)->paginate(10);
        return GuestList::latest()->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function myevent()
    {
        // return redirect()->route('route.name', [$param]);
        // return redirect()->route('privacy');
        return view('pages/privacy');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 
        'email' => 'required|string|max:191'
        ]);

        return GuestList::create([
            'email' => $request['email'],
            'attending_status' => $request['attending_status'],
            'total_guest' => $request['total_guest'],
            'event_id' => $request['event_id'],
            'name' => $request['name'],
            'user_id' =>auth('api')->id(), 
        ]);
    }

    // public function watch($slug)
    public function watch()
    {
    
        // $post = Post::where('slug', $slug)->first();
        // $partners = Professional::where("slug", "like", "$slug")
        // ->where("type", "like", "Registered")
        // ->orderBy('created_at', 'desc')
        // ->paginate(10);

        // return view('single')
        //        ->with('post', $post)
        //        ->with('partners', $partners);
        return view('guestlist');
    }
    /**
     * Display the specified resource. 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = GuestList::findOrFail($id);
        $this->validate($request,[
            'email' => 'required|string|max:191',
        ]);
        $user->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = GuestList::findOrFail($id);
        $user->delete();
    }
}
