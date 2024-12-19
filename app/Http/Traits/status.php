<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\DB;

trait status
{
    /**
     * Return a success JSON response.
     *
     * @param  array|string  $data
     * @param  string  $message
     * @param  int|null  $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function active($id, $table)
    {
        DB::table($table)->where('id', $id)->update([
            'status' => 1,
        ]);
        $notification = [
            'alert-type' => 'success',
            'message' => 'Status: Activated.',

        ];

        return redirect()->back()->with($notification);
    }

    protected function deactive($id, $table)
    {
        DB::table($table)->where('id', $id)->update([
            'status' => 0,
        ]);
        $notification = [
            'alert-type' => 'info',
            'message' => 'Status: Deactivated',

        ];

        return redirect()->back()->with($notification);
    }
}
