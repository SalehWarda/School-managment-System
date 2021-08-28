<?php

namespace App\Http\Interfaces;

interface FeesInvoicesRepositoryInterface
{

    public function index();

    public function create($id);

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);



}
