<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\FeesRepositoryInterface;
use App\Http\Requests\FeesRequest;
use App\Models\Fee;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FeesController extends Controller
{


    protected $Fees;

    public function __construct(FeesRepositoryInterface $Fees)
    {
        return $this->Fees = $Fees;
    }



    public function index()
    {

        return $this->Fees->index();
    }


    public function create()
    {

        return $this->Fees->create();
    }


    public function store(FeesRequest $request)
    {

        return $this->Fees->store($request);
    }


    public function edit($id)
    {

      return $this->Fees->edit($id);
    }


    public function update(FeesRequest $request)
    {

        return $this->Fees->update($request);
    }


    public function destroy(Request $request)
    {

        return $this->Fees->destroy($request);
    }
}
