<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gadgets;

class GadgetsController extends Controller
{
    public function index() {
        $gadgets = Gadgets::orderBy('created_at', 'desc')->get();
        return resonse()->json($gadgets);
    }
    public function store(Request $request) {
        $gadget = new Gadgets();
        // return response($request);
        $gadget->type = $request->type;
        $gadget->company = $request->company;
        $gadget->save();

        return response()->json($gadget);
    }
    public function delete($id){
        $gadget = Gadgets::findOrFail($id);
        
        if($gadget->delete()) {

            return response()->json('Gadget '.$id.' Deleted');
        } else {
            return response()->json('Not Deleted');
        }
    }
    public function getTrashed() {
        $deleted = Gadgets::onlyTrashed()->orderBy('created_at', 'desc')->get();
        return response()->json($deleted);
    }
    public function getAll() {
        $gadgets = Gadgets::withTrashed()->orderBy('created_at', 'desc')->get();
        return response()->json($gadgets);
    }
    public function restore($id) {
        $trashedGadget = Gadgets::withTrashed($id)->restore();
        // $trashedGadget->restore();
        
        return response()->json('restored');
    }
    public function restoreAll() {
        $trashed = Gadgets::onlyTrashed()->restore()->get();
        return response()->json($trashed);
    }
    public function forceDelete($id) {
        $toDelete = Gadgets::withTrashed($id);
        $toDelete->forceDelete($id);

        return response()->json('Deleted');
    }
    public function forceDeleteAll() {
        $toDelete = Gadgets::onlyTrashed();
        if($toDelete->forceDelete()) {
            return response()->json(['DELETED ']);
        }
    }
}
