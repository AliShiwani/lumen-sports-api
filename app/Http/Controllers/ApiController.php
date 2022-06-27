<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use App\Models\Sport;
use App\Models\Team;
use App\Models\Image;
use App\Http\Resources\EntityResource;
use App\Http\Resources\TeamResource;
use App\Models\EntitySport;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        // dd('APi');
        $temp = new Team();
        // $temp->url = 'https://upload.wikimedia.org/wikipedia/en/2/24/Official_logo_of_Pakistan_Super_League.png';
        $temp->sport_id = 1;
        $temp->entity_id = 1;
        // $temp->sport_id = 1;
        $temp->team_type = 'M';
        $temp->name = 'Karachi Kings';
        // $temp->city = 'New York';
        // $temp->country = 'USA';
        // $temp->zip = '12345';
        // $temp->entity_type = 1;
        // dd($temp);
        $temp->save();
        return 'saved';
        // dd(Image::get());
        
        // return new TeamResource(Team::findOrFail(1));
        return TeamResource::collection(Team::all());
    }
    
    public function fetchEntity(){
        // this function return all schools
        return EntityResource::collection(Entity::all());
    }
    public function fetchEntityBySportId($sportId){
        // this function return all schools
        $check = Entity::whereRelation('entitySports', 'sport_id', '=', $sportId)->get();
        if (count($check) < 1) {
            $data['data']['error'] = 'record not found';
            return json_encode($data);
        }else{
            return EntityResource::collection($check);    
        }
    }
    public function fetchEntityByCondition($sportId, $zip){
        // this function return all schools
        $check = Entity::where('zip', '=', $zip)->whereRelation('entitySports', 'sport_id', '=', $sportId)->get();
        if (count($check) < 1) {
            $data['data']['error'] = 'record not found';
            return json_encode($data);
        }else{
            return EntityResource::collection($check);    
        }
    }
    public function fetchTeams(){
        return TeamResource::collection(Team::all());
    }
    public function fetchTeamByEntityId($entityId){
        
        $check = Team::where('entity_id', '=', $entityId)->get();
        if (count($check) < 1) {
            $data['data']['error'] = 'record not found';
            return json_encode($data);
        }else{
            return TeamResource::collection($check);    
        }
    }


    //
}
