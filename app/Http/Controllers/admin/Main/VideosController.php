<?php

namespace App\Http\Controllers\BackEnd\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Video;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    private $status_message = NULL;
    private $alert_type = "success";
    public function update(Request $request, $id)
    {
        // dd($request->all());
        try {
            $url = urldecode(rawurldecode($request->youtubeurl));
             preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
            $request['video_id']=$matches[1];
            Video::findOrFail($id)->update($request->all());

            $this->status_message = "Successfully updated video.";
        } catch (QueryException $e) {
            $this->status_message = "Failed to update video, Try again.";
            $this->alert_type = "danger";
        }

        return redirect()->back()->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);
    }
}
