<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Requests\TableRequest;

class TableController extends Controller
{
    public function index() {
        $tables = Table::all();

        return view('tables.index', compact('tables'));
    }

    public function create() {

        return view('tables.create');
    }

    public function store(TableRequest $request) {
        Table::create($request->validated());

        return to_route('tables.index')->with([
            'alert-type' => 'alert-success',
            'alert-message' => 'Table added successfully',
        ]);
    }

    public function show(Table $table) {
        return view('tables.show', compact('table'));
    }

    public function update(Table $table, Request $request) {
        $table->update([
            'table_no' => $request->table_no,
            'max_pax' => $request->max_pax,
            'status' => $request->status,
        ]);

        return to_route('tables.index')->with([
            'alert-type' => 'alert-success',
            'alert-message' => 'Table updated successfully',
        ]);
    }

    public function delete(Table $table) {
        $table->delete();

        return to_route('tables.index')->with([
            'alert-type' => 'alert-danger',
            'alert-message' => 'Table deleted successfully',
        ]);
    }
}
