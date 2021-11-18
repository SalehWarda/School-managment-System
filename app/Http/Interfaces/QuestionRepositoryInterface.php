<?php

namespace App\Http\Interfaces;

interface QuestionRepositoryInterface
{


    public function index($id);

    public function create($id);

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($id);


}
