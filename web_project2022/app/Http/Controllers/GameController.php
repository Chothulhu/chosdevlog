<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function games(){
        $games = Game::all()->toArray();
        return view('games.index', compact('games'));
    }

    public function game($id){        
        $games = Game::where('id', $id)->first(); 

        return view('indexTest', compact('games'));
    }
    //Function to store new genres
    public function store(Request $request){
        //validate inputs

        //insert data into genres table
    }

    public function searchByName(){
        if(isset($_GET['nameToSearch'])){
            $search_text = $_GET['nameToSearch'];
            $games = Game::where('name', 'LIKE', '%'.$search_text.'%')->get();

            return view('games/index', compact('games'));
        }
        
        return redirect()->back();
    }

    public function GameRegisterCreate(Request $request){
        
        $files = $request->file('input-folder-3');
        
        if($files != null)
        {
                //dd($files);
                $foldername = $request->get('game_path');
                if(!is_dir($foldername)) mkdir($foldername);
                foreach($files as $file)
                {
                    //dd($file);
                    //dd($file->getClientOriginalName());
                    if(str_contains($file->getClientOriginalName(), '.unityweb') || str_contains($file->getClientOriginalName(), '.js')){
                        if(!Storage::disk('public_games')->put($foldername.'/Build/'.$file->getClientOriginalName(), file_get_contents($file))) {
                            return redirect()->back();
                        } 
                    } else {
                        if(!Storage::disk('public_games')->put($foldername.'/'.$file->getClientOriginalName(), file_get_contents($file))) {
                            return redirect()->back();
                        } 
                    }
                       
                }
        }
        
        $game = new Game([
            'name' => $request->get('name'),
            'short_desc' => $request->get('short_description'),
            'long_desc' => $request->get('long_description'),
            'game_path' => "/".$request->get('game_path'),
        ]);

        $game->save();
        return redirect()->back();
    }

    public function dropDownShow(Request $request){
        $games = Game::pluck('name', 'id');
        $selectedID = 2;
        //dd($games);
        return view('admin.manage.comments', compact('games', 'selectedID'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Game::find($id);//->join('comments', 'games.id', '=', 'comments.game_id')->where('comments.game_id', $id)->get();
        $comments = Comment::where('game_id', $id)->get();
        //dd($game);

        // delete from storage
        $foldername = $game->game_path;
        //dd('/games'.$foldername);
        //dd($comments);
        if(!Storage::disk('public_games')->deleteDirectory('/games'.$foldername)) {
            $game->delete();
            foreach($comments as $comment){
                $comment->delete();
            }
        } 

        return redirect()->back();
    }
}