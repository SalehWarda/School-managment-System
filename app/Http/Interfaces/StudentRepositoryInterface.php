<?php


namespace App\Http\Interfaces;


interface StudentRepositoryInterface
{

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);

    // public function store($request);
}
