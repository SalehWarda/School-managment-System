<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\ReceiptStudentsRepositoryInterface;
use App\Models\FundAccount;
use App\Models\ReceiptStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiptStudentsController extends Controller
{

    public $receiptStudents;


    public function __construct(ReceiptStudentsRepositoryInterface $receiptStudents)
    {
        $this->receiptStudents = $receiptStudents;
    }

    public function index()
    {
        //
        return $this->receiptStudents->index();
    }


    public function create($id)
    {
        //
        return $this->receiptStudents->create($id);

    }


    public function store(Request $request)
    {
        //

        return $this->receiptStudents->store($request);
    }


    public function edit($id)
    {
        //
        return $this->receiptStudents->edit($id);
    }


    public function update(Request $request)
    {
        //
        return $this->receiptStudents->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->receiptStudents->destroy($request);
    }
}
