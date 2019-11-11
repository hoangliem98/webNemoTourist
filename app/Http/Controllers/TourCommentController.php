<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour_Comments;

class TourCommentController extends Controller
{
    //
    public function getXoa($id, $tourdetail_id)
    {
    	$comment = Tour_Comments::whereid($id)->first();
    	$comment->delete();

    	return redirect('admin/tourdetail/edit/'.$tourdetail_id)->with('thongbao', 'Xóa bình luận thành công');
    }
}
