<?php

namespace App\Repositories\Interfaces;

interface SuggestRepositoryInterface
{
    public function getSuggests();

    public function findSuggests($id);

    public function deleteSuggest($id);

}
