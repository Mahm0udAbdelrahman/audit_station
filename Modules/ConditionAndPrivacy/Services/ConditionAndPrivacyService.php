<?php

namespace Modules\ConditionAndPrivacy\Services;

use Modules\ConditionAndPrivacy\Models\ConditionAndPrivacy;



class ConditionAndPrivacyService
{
    public $PrivacyModel;

    public function __construct(ConditionAndPrivacy $PrivacyModel)
    {
        $this->PrivacyModel = $PrivacyModel;
    }

    public function show()
    {
        $Privacy = $this->PrivacyModel->first();
        return $Privacy;
    }
    public function update($data)
    {

        $Privacy = $this->show();
        $Privacy->update($data);
        return $Privacy;
    }


}
