<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class TeamController extends Controller
{
    protected $team;
    public function __construct(Team $team)
    {
        $this->team = $team;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('in_order', 'asc')->get();
        return view('backend.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function teamsearch(Request $request){
    //     $search = $request['search'];

    //     $teams = Team::query()
    //                     ->where('name', 'LIKE', "%$search%")
    //                     ->orWhere('post', 'LIKE', "%$search%")
    //                     ->latest()
    //                     ->paginate(10);
    //     return view('backend.team.searchindex', compact('teams'));
    // }

    public function create()
    {
        $teamType = TeamType::latest()->get();
        return view('backend.team.create', compact('teamType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            // 'post' => 'required',
            'image' => 'nullable|string|max:250',
            'active' => 'nullable',
            'team_type_id' => 'required|integer',
            // 'content' => $request['content'],
            'facebook' => 'nullable|string|max:250',
            'linkedin' => 'nullable|string|max:250',
            'twitter' => 'nullable|string|max:250',
            'youtube' => 'nullable|string|max:250',
        ]);

        $input = $request->all();
        $member_count = Team::orderBy('in_order', 'desc')->first();
        if ($member_count) {
            $input['in_order'] = $member_count->in_order + 1;
        } else {
            $input['in_order'] = 1;
        }
        // $input['image'] = $request->team_image;
        $input['status'] = $request->active??0;
        $input['slug'] = Str::slug($request['name']);
        Team::create($input);
        return redirect()->route('team.index')->with('success', 'Team is created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teamType = TeamType::latest()->get();
        $team = Team::findorfail($id);
        return view('backend.team.edit', compact('team', 'teamType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            // 'post' => 'required',
            'image' => 'nullable|string|max:250',
            'active' => 'nullable',
            'team_type_id' => 'required|integer',
            // 'content' => $request['content'],
            'facebook' => 'nullable|string|max:250',
            'linkedin' => 'nullable|string|max:250',
            'twitter' => 'nullable|string|max:250',
            'youtube' => 'nullable|string|max:250',
        ]);

        $input = $request->all();
        // $input['image'] = $request->team_image;
        $input['status'] = $request->active??0;
        $input['slug'] = Str::slug($request['name']);

        Team::findorfail($id)->update($input);
        return redirect()->route('team.index')->with('success','Team is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existing_team = Team::findorFail($id)->delete();
        return redirect()->route('team.index')->with('success', 'Team is deleted successfully.');
    }

    public function updateMemberOrder(Request $request)
    {
        parse_str($request->sort, $arr);
        $order = 1;
        if (isset($arr['menuItem'])) {
            foreach ($arr['menuItem'] as $key => $value) {  //id //parent_id
                $this->team->where('id', $key)
                    ->update([
                        'in_order' => $order,
                    ]);
                $order++;
            }
        }

        return true;
    }

    public function teamTypeIndex()
    {
        $teams = TeamType::latest()->get();
        return view('backend.team.teamtype',compact('teams'));
    }
    public function teamTypeDestroy($id)
    {
        TeamType::findOrFail($id)->delete();
        return redirect()->back()->with('success','Team category has been deleted');
    }

    public function teamType(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);
            $teamType = TeamType::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);
            $teamType->save();
            return redirect()->back()->with('success','Team category has been added');

        if($request->ajax()){

            $allType = TeamType::get()->map(function ($value, $key)  {
                return "<option value=\"$value->id\">$value->name</option>";
            })->toArray();

            return response()->json([
                'message' => 'Type was created successfully',
                'data' => implode(' ', $allType)
            ], 200);
        }

    }
}
