<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Components\Recursive;

class CategoryController extends Controller
{

    private $category;

    function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function listCategory()
    {
        $category = Category::latest()->get();
        $htmlOption = $this->getCategory($parentId = '');
        return view('backend.category.list_category', compact('htmlOption', 'category', 'parentId'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_vn' => 'required',
        ],
            [
                'category_name_en.required' => 'Please input your category name',
                'category_name_vn.required' => 'Please input your category name',
            ]);

        Category::insert([
            'parent_id' => $request->parent_id,
            'category_name_en' => $request->category_name_en,
            'category_name_vn' => $request->category_name_vn,
            'category_slug_en' => Str::slug($request->category_name_en),
            'category_slug_vn' => Str::slug($request->category_name_vn),
            'category_icon' => $request->category_icon
        ]);

        $notification = array(
            'message' => 'Add Category Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recursive($data);
        $htmlOption = $recusive->categoryRecursive($parentId);
        return $htmlOption;
    }

    public function editCategory($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('backend.category.edit', compact('category', 'htmlOption'));
    }

    public function updateCategory(Request $request, $id)
    {
        Category::findOrFail($id)->update([
            'parent_id' => $request->parent_id,
            'category_name_en' => $request->category_name_en,
            'category_name_vn' => $request->category_name_vn,
            'category_slug_en' => Str::slug($request->category_name_en),
            'category_slug_vn' => Str::slug($request->category_name_vn),
            'category_icon' => $request->category_icon
        ]);

        $notification = array(
            'message' => 'Update Category Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('list.category')->with($notification);
    }

    public function deleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Delete Category Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
