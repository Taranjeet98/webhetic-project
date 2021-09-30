<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

use DB;
use App\Models\Article;

class ArticleController extends Controller
{

	public function __construct() {
        $this->middleware(['auth','verified', 'admin']);
    }
    //
    public function index()
    {
    	$article = DB::table('articles')->get();
      	return view('admin.article')->with(['article' => $article ]);
    }

    // add article

   public function addArticle(Request $request)
   {
   		if($request->isMethod('post'))
   		{
            $input = $request->all();
         	$destinationPath = public_path('articles');
			try
            {



				$card = Article::create($input);
                return redirect('admin/articles')->with('success', 'New Article Created Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/articles/add')->with('error', $e->getMessage());
            }
        }

        return view('admin.add-article');
   }

   public function editArticle(Request $request)
   {
   		$id = $request->id;
        $check = Article::where(['id' => $id])->first();
        $input = $request->all();
	   	if($request->isMethod('post')) {
            $input = $request->all();
            $destinationPath = public_path('articles');
            try
            {

                $card = Article::where(['id' => $id])->first();
				$card->title = $request->input('title');
				$card->slug = $request->input('slug');
				$card->sub_title = $request->input('sub_title');
				$card->description = $request->input('description');
				$card->save();
                return redirect('/admin/articles')->with('success', 'Article Updated Successfully');

            } catch(Exception $e) {
                return redirect('/admin/edit_article/edit/' . $id)->with('error', $e->getMessage());
            }
        }

        $article = Article::where(['id' => $id])->first();
        return view('admin.edit-article')->with(['article' => $article]);
   }

   // delete Article data
    public function deleteArticle(Request $request){
        $deletearticle = Article::where('id',$request->article_id)->delete();
        return redirect()->back()->with('success','Article deleted successfully.');
    }
}
