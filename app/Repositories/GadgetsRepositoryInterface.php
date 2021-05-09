<?php
namespace App\Repositories;

Interface GadgetsRepositoryInterface {
   public function all();

   public function store($request);
} 