<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\FeesInvoicesRepositoryInterface;
use App\Models\ClassRoom;
use App\Models\Fee;
use App\Models\FeesInvoice;
use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeesInvoiseController extends Controller
{

    public $feesInvoices;

    public function __construct(FeesInvoicesRepositoryInterface $feesInvoices)
    {
        $this->feesInvoices = $feesInvoices;
    }

    public function index()
    {
        //
        return $this->feesInvoices->index();
    }


    public function create($id)
    {
        return $this->feesInvoices->create($id);

    }


    public function store(Request $request)
    {
        //
        return $this->feesInvoices->store($request);
    }


    public function edit($id)
    {
        //
        return $this->feesInvoices->edit($id);
    }


    public function update(Request $request)
    {
        //
        return $this->feesInvoices->update($request);
    }


    public function destroy(Request $request)
    {
        //
        return $this->feesInvoices->destroy($request);
    }

//    public function getAmount($id)
//    {
//        //
//        $list_amounts = Fee::where('fee_type',$id)->pluck('amount','id');
//        return $list_amounts;
//    }
}
