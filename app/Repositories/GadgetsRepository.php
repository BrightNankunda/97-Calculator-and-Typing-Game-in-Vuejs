<?php

namespace App\Repositories;
use App\Models\Gadgets;

class GadgetsRepository implements GadgetsRepositoryInterface {
   public function all() {
      // $pageQuery = request()->input('page');
      // return $pageQuery;
      // return Gadgets::orderBy('created_at', 'desc')->get()
      //    ->map(function ($gadget) {
      //       return $gadget->format();
      //    });
         return Gadgets::orderBy('created_at', 'desc')->get()
         ->map->format();
         // return $this->format();
         
   }
   public function store($request) {
        $gadget = new Gadgets();
        $gadget->type = $request->type;
        $gadget->company = $request->company;
        $gadget->save();

        return response()->json($gadget);
    }
}
