<?php

namespace itmanagement\Repositories;

use itmanagement\Repositories\Contracts\iLogoRepository;
use itmanagement\Logo;
use itmanagement\Traits\LogoTrait;

class LogoRepository implements iLogoRepository
{
    use LogoTrait;
    private $logo;

    public function __construct(Logo $logo)
    {
        $this->logo = $logo;
    }

    public function store($request, $model){
        $logo = $this->logo;

        $file = $request->file('logo');
        if (!is_null($file) && $path = $this->upload($file)) {
            $logo->name = $file->getClientOriginalName();
            $logo->path = $path;
            $logo->uploadable_id = $model->id;
            $logo->uploadable_type = get_class($model);
            return $logo->save();
        }
        return false;
    }
}

?>