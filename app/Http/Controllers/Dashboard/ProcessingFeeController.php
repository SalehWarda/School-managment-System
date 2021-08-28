<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\ProcessingFeeRepositoryInterface;
use App\Models\ProcessingFee;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcessingFeeController extends Controller
{

    public $processingFee;

    public function __construct(ProcessingFeeRepositoryInterface $processingFee)
    {
        $this->processingFee = $processingFee;
    }

    public function index()
    {
        return $this->processingFee->index();

    }


    public function create($id)
    {
        //
        return $this->processingFee->create($id);

    }


    public function store(Request $request)
    {
        //
        return $this->processingFee->store($request);

    }


    public function edit($id)
    {
        //
        return $this->processingFee->edit($id);
    }


    public function update(Request $request)
    {
        //
        return $this->processingFee->update($request);

    }


    public function destroy(Request $request)
    {
        //
        return $this->processingFee->destroy($request);

    }
}
