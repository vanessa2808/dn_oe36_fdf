<?php

namespace App\Repositories\Eloquent;

use App\Models\Suggest;
use App\Repositories\Interfaces\SuggestRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Config;

class SuggestRepository extends BaseRepository implements SuggestRepositoryInterface
{

    public function getModel()
    {
        return Suggest::class;
    }

    public function getSuggests()
    {

        return $this->model->paginate(Config::get('app.paginate'));

    }

    public function findSuggests($id)
    {
        $result = $this->model->find($id);
        if ($result)
        {
            return $result;
        }

        return false;
    }

    public function deleteSuggest($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->delete();

            return true;
        }
        return false;
    }


}
