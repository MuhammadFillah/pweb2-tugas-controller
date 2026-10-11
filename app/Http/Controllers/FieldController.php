<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Category;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    // READ
    public function index()
    {
        $fields = Field::with('category')->latest()->get();
        return view('fields.index', compact('fields'));
    }

    // CREATE (Form & Store)
    public function create()
    {
        $categories = Category::all();
        return view('fields.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'field_code' => 'required|unique:fields,field_code',
            'name' => 'required|string|max:255',
            'status' => 'required|in:available,maintenance',
        ]);

        Field::create($request->all());
        return redirect()->route('fields.index')->with('success', 'Lapangan berhasil ditambahkan.');
    }

    // UPDATE (Form & Update)
    public function edit(Field $field)
    {
        $categories = Category::all();
        return view('fields.edit', compact('field', 'categories'));
    }

    public function update(Request $request, Field $field)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'field_code' => 'required|unique:fields,field_code,' . $field->id,
            'name' => 'required|string|max:255',
            'status' => 'required|in:available,maintenance',
        ]);

        $field->update($request->all());
        return redirect()->route('fields.index')->with('success', 'Data lapangan berhasil diperbarui.');
    }

    // DELETE
    public function destroy(Field $field)
    {
        $field->delete();
        return redirect()->route('fields.index')->with('success', 'Lapangan berhasil dihapus.');
    }
}