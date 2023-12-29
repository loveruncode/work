<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\DataTables\PostDataTable;

class Postcontroller extends Controller
{
    protected $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function Postadd()
    {
        $category = $this->postService->getAllCategory();
        return  view('admin.add-post')->with('category', $category);
    }

    public function insert(Request $request)
    {
        $data = $request->all();
        $result = $this->postService->insertDatatoPost($data);

        if ($result['success']) {
            return redirect()->back()->with('success', 'Bài viết đã được thêm thành công');
        } else {
            return redirect()->back() - with('error', 'Thêm Bài Viết Thất Bại')->withErrors($result['error']);
        }
    }

    public function getValueforTable(PostDataTable $dataTable)
    {
        return $dataTable->render('layout.table-admin');
        // $ps = $this->postService->getPostAll();
        // return  view('layout.table-admin', compact('ps'));
    }
    public function delete($id)
    {
        $post = $this->postService->deleteByID($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Xoá Thất Bại');
        }
        $post->delete();
        return redirect()->back()->with('success', 'Đã Xoá Thành Công');
    }

    public function update($id)
    {
        return view('layout.update-post', compact('id'));
    }

    public function updateForm(Request $request, $id)
    {
        $data = $request->all();
        $result = $this->postService->updatePost($data, $id);
        dd($result);
        if (['success']) {
            return redirect()->back()->with('success', 'Bài viết đã được thay đổi thành công');
        } else {
            return redirect()->back() - with('error', 'Sửa Bài Viết Thất Bại')->withErrors($result['error']);
        }
    }
    public function deleteSelect(Request $request)
    {
        $bien  = print_r($request->ck);
        return $bien;
    }

    public function getViews()
    {
        $posts = $this->postService->getCategory();
        return view('layout.postview', compact('posts'));
    }

    public function viewAccount()
    {
        $user = auth()->user();
        $username = $user->name;
        $email = $user->email;
        $role = $user->role;
         if($role === 1 ){
         $rolename = "Admin";
        }else{
            $rolename = "Employee";
        }
        return view('admin.user-view')->with([
            'users' => $username,
            'email' => $email,
            'role' => $rolename,
        ]);
    }
}
