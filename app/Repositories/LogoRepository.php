<?php

namespace itmanagement\Repositories;

use itmanagement\Repositories\Contracts\iLogoRepository;
use itmanagement\Logo;

class LogoRepository implements iLogoRepository
{
    private $logo;

    public function __construct(Logo $logo)
    {
        $this->logo = $logo;
    }

    public function upload($request, $model){
        $logo = $this->logo;

        $file = $request->file('logo');
        if (!is_null($file) && $path = $file->store('images')) {
//            $logo = new Logo();
            $logo->name = $file->getClientOriginalName();
            $logo->path = $path;
            $logo->uploadable_id = $model->id;
            $logo->uploadable_type = get_class($model);
            return $logo->save();
        }
        return false;
    }

    public function retrieve(){
    }
}

?>