<?php

namespace App\Http\Controllers\Admin\Branch;

class CoverageController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Branch $model)
    {
        $this->model = $model;
        $this->modelCoverage = new \App\Models\Branch\Coverage;
        $this->sectionCode = 'branch_coverage';
        parent::__construct();
        $this->sectionUri = 'branches/coverages';

        view()->share('title', 'Branch Coverages');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew', 'delete'];
        $this->fields = [
        ['name' => 'code', 'title' => 'Code'],
        ['name' => 'name', 'title' => 'Branch Name']
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = [
        ];

        return parent::postAddedit();
    }

    public function getAddedit()
    {
        if(\Input::get('removeCityId')){
            $model = $this->modelCoverage->find(\Input::get('removeCityId'));
            if($model){
                $model->delete();
            }else{
                return redirect()->back();
            }

        }
        if(\Input::get('cityId')){
            $model = $this->modelCoverage;
            $model->branch_id = \Input::get('branchId');
            $model->city_id = \Input::get('cityId');
            $model->save();
            return redirect()->back();
        }
        return parent::getAddedit();
    }
}
