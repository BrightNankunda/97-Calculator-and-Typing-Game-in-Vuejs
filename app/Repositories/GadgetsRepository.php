<?php

namespace App\Repositories;
use App\Models\Gadgets;

class GadgetsRepository {
   public function all() {
      // $pageQuery = request()->input('page');
      // return $pageQuery;
      return Gadgets::orderBy('created_at', 'desc')->paginate(2);
         // ->map(function ($gadget) {
         //       return [
         //          'GADGET ID' => $gadget->id,
         //          'GADGET TYPE' => $gadget->type,
         //          'COMPANY NAME' => $gadget->company,
         //          'DELETED DATE' => $gadget->deleted_at,
         //          'CREATED DATE' => $gadget->created_at->diffForHumans()
         //       ];
         // });
         
   }
   public function store($request) {
        $gadget = new Gadgets();
        $gadget->type = $request->type;
        $gadget->company = $request->company;
        $gadget->save();

        return response()->json($gadget);
    }
}
