<?php

namespace Modules\OurTeam\Services;

use Modules\OurTeam\Models\OurTeam;


class OurTeamService
{
    public $OurTeamModel;

    public function __construct(OurTeam $OurTeamModel)
    {
        $this->OurTeamModel = $OurTeamModel;
    }


    public function index()
    {
        $name = request()->input('name');
        if (isset($name)) {
            return $this->OurTeamModel->where('name', 'like', "%$name%")->get();
        }
        return $this->OurTeamModel->paginate();
    }

    public function store(array $data)
    {

        $OurTeam = $this->OurTeamModel->create($data);

        if ($data['image']) {
            $uploadedimage = $OurTeam->addMediaFromRequest('image')->toMediaCollection('OurTeams');
        }

        return $OurTeam;
    }

    public function show($id)
    {
        $OurTeam = $this->OurTeamModel->findOrFail($id);
        return $OurTeam;
    }
    public function update($id, $data)
    {

        $OurTeam = $this->show($id);

        $OurTeam->update($data);


        if (isset($data['image'])) {
            $oldimage = $OurTeam->getFirstMedia('OurTeams');
            if ($oldimage) {
                $oldimage->delete();
            }

            $uploadedimage = $OurTeam->addMediaFromRequest('image')->toMediaCollection('OurTeams');


        }

        return $OurTeam->load('media');
    }

    public function destroy($id)
    {
        $OurTeam = $this->show($id);
        $OurTeam->delete();

    }
}
