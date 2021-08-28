<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\PaymentStudentsRepositoryInterface;
use App\Models\FundAccount;
use App\Models\Payment;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    public $paymentStudents;

    public function __construct(PaymentStudentsRepositoryInterface $paymentStudents)
    {
        $this->paymentStudents = $paymentStudents;
    }

    public function index()
    {
        //
        return $this->paymentStudents->index();

    }


    public function create($id)
    {
        //
        return $this->paymentStudents->create($id);
    }


    public function store(Request $request)
    {
        //
        return $this->paymentStudents->store($request);
    }


    public function edit($id)
    {
        //
        return $this->paymentStudents->edit($id);

    }


    public function update(Request $request)
    {
        //
        return $this->paymentStudents->update($request);

    }


    public function destroy(Request $request)
    {
        //
        return $this->paymentStudents->destroy($request);
    }
}
