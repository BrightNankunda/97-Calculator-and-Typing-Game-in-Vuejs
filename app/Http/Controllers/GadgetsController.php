<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GadgetsRepositoryInterface;
use App\Models\Gadgets;

class GadgetsController extends Controller
{
    private $gadgetsRepository;

    public function __construct(GadgetsRepositoryInterface $gadgetsRepository) {
        $this->gadgetsRepository = $gadgetsRepository;
    }

    public function index() {

        $gadgets = $this->gadgetsRepository->all();
        return response()->json($gadgets);
    }
    // public function store(Request $request) {
    //     $gadget = new Gadgets();
    //     $gadget->type = $request->type;
    //     $gadget->company = $request->company;
    //     $gadget->save();

    //     return response()->json($gadget);
    // }
    public function store(Request $request) {
        $gadget = $this->gadgetsRepository->store($request);
        return $gadget;
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
        $trashedGadget = Gadgets::onlyTrashed()->where('id', '=', $id)->restore();
        
        
        return response()->json('RESTORED '.$id);
    }
    public function restoreAll() {
        $trashed = Gadgets::onlyTrashed()->restore();
        return response()->json('RESTORED ALL');
    }
    public function forceDelete($id) {
        $toDelete = Gadgets::where('id', '=', $id)->withTrashed();
        $toDelete->forceDelete();

        return response()->json('Force fully Deleted');
    }
    public function forceDeleteAll() {
        $toDelete = Gadgets::onlyTrashed();
        if($toDelete->forceDelete()) {
            return response()->json('DELETED ALL FORCE FULLY');
        }
    }
}
