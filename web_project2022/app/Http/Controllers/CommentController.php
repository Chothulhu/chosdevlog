<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Game;
use Illuminate\Support\Facades\App;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create(){
        return view('game');
    }

    //Function to store new genres
    public function store(Request $request){
        //dd($request);
        //validate inputs
        $this->validate($request, [
            'comment' => 'required'
        ]);
        //insert data into genres table
        $comment = new Comment([
            'comment' => $request->get('comment'),
            'game_id' => $request->get('id'),
            'username' => $request->get('username')
        ]);
        $comment->save();
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Comment::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function getCommentsAdmin(Request $request){
        if(isset($_GET['game_id'])){
            //dd($request);
            $game_id = $_GET['game_id'];
            $games = $games = Game::pluck('name', 'id');
            $comments = Comment::where('game_id', $game_id)->get();
            //$selectedID = $request;
            //dd($comments);
            return view('admin.manage.comments', compact('games', 'comments'));
        }
        
        return redirect()->back();
    }

    public function exportCommentsAdmin(Request $request){
        //dd($request);
        $pdf = App::make('snappy.pdf.wrapper');
        $comments = $request->get('comment');
        $usernames = $request->get('username');
        //dd($comments);
        $view = view('print', compact('comments', 'usernames'));
        $html = $view->render();
        $pdf->loadHTML($html)->setPaper('a4', 'portrait');
        

        return $pdf->inline();

        return redirect()->back();
    }
}