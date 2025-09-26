<?php
namespace App\Services\Agency;
use App\DataTransferObjects\AgencyDto;
use App\Models\Agency;

class AgencyService {
    public function create(AgencyDto $agencyDto, $id = NULL){
        $agency = Agency::updateOrCreate([
            'id' => $id
        ],[
            'user_id' => $agencyDto->user_id,
            'name' =>  $agencyDto->name,
            'email' =>  $agencyDto->email,
            'type' =>  $agencyDto->type,
            'headquarters' =>  $agencyDto->headquarters,
            'size' =>  $agencyDto->size,
            'project_size' =>  $agencyDto->project_size,
            'website' =>  $agencyDto->website,
            'video' =>  $agencyDto->video,
            'feature_img' =>  $agencyDto->feature_img,
            'short_description' =>  $agencyDto->short_description,
            'about_company' =>  $agencyDto->about_company,
            'about_video' =>  $agencyDto->about_video,
            'logo' =>  $agencyDto->logo,
        ]);

        $skillsCollection = collect($agencyDto->skills);
        $skillsId = $skillsCollection->pluck('id')->all();

        $agency->skills()->sync($skillsId);
        return $agency;
    }

    public function find($id){
        return  Agency::find($id);
    }

    public function delete($id){
        $agency = Agency::find($id);
        $agency->delete();
        return $agency;
    }

    public function all(){
        return Agency::with('skills')->get();
    }

    public function featured($limit){
        return Agency::latest()->limit($limit)->get();
    }
}