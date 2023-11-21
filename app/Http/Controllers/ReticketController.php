<?php

namespace App\Http\Controllers;

use App\Models\Reticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReticketController extends Controller
{
    public function select()
    {
        // 全件取得
        // $builder_all = DB::table("retickets")->select()->get();
        $eloquent_all = Reticket::all();
        dump($eloquent_all);

        // 絞り込み(一致検索)
        $builder_where = DB::table("retickets")->where("tent", 1)->get();
        // $eloquent_where = Reticket::where("tent", true)->get();
        dump($builder_where);

        // 絞り込み(部分一致検索)
        $eloquent_where = Reticket::where("name", "LIKE", "%o%")->get();
        dump($eloquent_where);

        // 1件取得()
        $builder_first = DB::table("retickets")->where("id", 1)->first();
        $eloquent_first1 = Reticket::where("id", 1)->first();
        $eloquent_first2 = Reticket::find(1);  // 検索カラムが主キー(id)の場合のみ
        dump($builder_first, $eloquent_first1, $eloquent_first2);
    }

    public function insert()
    {
        // Eloquent ORM
        $ticket = new Reticket;
        $ticket->seat_number = "001";
        $ticket->name = "Bob";
        $ticket->tent = true;
        $ticket->save();

        // Eloquent ORM
        Reticket::create([
            "seat_number" => "002",
            "name" => "Tom",
            "tent" => false,
        ]);

        // Eloquent ORM
        $ticket = new Reticket;
        $ticket->seat_number = "003";
        $ticket->name = "Ken";
        $ticket->tent = true;
        $ticket->save();

        // Eloquent ORM
        $tickets = Reticket::all();
        dump($tickets);
    }

    public function update()
    {
        // すべてのレコードを更新
        // DB::table("retickets")->update(["seat_number" => "001", "name" => "Tom Ford", "tent" => 1]);

        // idで絞り込んで更新
        DB::table("retickets")->where("id", 1)->update(["seat_number" => "001", "name" => "Bob Dylan", "tent" => 0]);
        $ticket = Reticket::where("id", 2)->first();
        // $ticket = Reticket::find(2);  // idでの絞り込みなので、こちらでもOK
        $ticket->seat_number = "002";
        $ticket->name = "Tom Ford";
        $ticket->tent = 0;  // Bool値でも可
        $ticket->update();
        $tickets = DB::select("select * from retickets");
        dump($tickets);
    }

    public function delete()
    {
        // すべてのレコードを削除(where無し)
        // DB::table('tickets')->delete();

        // 1件
        DB::table("retickets")->where("id", 1)->delete();
        $ticket = Reticket::where("id", 2)->first();
        // $ticket = Ticket::find(2);
        $ticket->delete();

        $tickets = DB::select("select * from retickets");
        dump($tickets);
    }

    // public function __construct()
    // {
    //     DB::enableQueryLog();
    // }

    // public function __destruct()
    // {
    //     dump(DB::getRawQueryLog());
    // }
    public function show($retickets_id)
    {
        $ticket = DB::table("retickets")->where("id", $retickets_id) ->first();
        return view('show', ['ticket' => $ticket]);
    }
}
