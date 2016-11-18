<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Branch;
use App\Models\Awards;

class AboutController extends Controller
{
    public function getIndex()
    {
        $model = new Page();
        $row = $model->where('code', 'about-us')->first();

        return view('about.index', compact('row'));
    }

    public function getManagement()
    {
        $model = new Page();
        $row = $model->where('code', 'about-us-management')->first();

        return view('about.management', compact('row'));
    }

    public function getOurBranches()
    {
        return view('about.branch');
    }

    public function getBranchLists()
    {
        return Branch::all();
    }

    public function getAwards()
    {
        $model = new Awards;
        $rows = $model->where('is_publish', 'Y')->paginate(6);

        return view('about.awards', compact('rows'));
    }

    public function getAwardsDetail($id, $title)
    {
        $model = new Awards;
        $row = $model->find($id);

        return view('about.awards.detail', compact('row'));
    }
}
