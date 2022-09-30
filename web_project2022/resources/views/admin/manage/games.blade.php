@extends('admin.admin_master')
@section ('admin')
  
<div class="content_wrapper">
    <!--middle content wrapper-->
    <h3 class="m-3">GAMES</h3>
    <div class="middle_content_wrapper">
        <!-- counter_area -->
        <div>
            
            <form action="{{  route('admin.manage.game.create')  }} " method="post" enctype="multipart/form-data">
            @csrf
                <div class="mb-3">
                    <input class="form-control" name="name" type="text" placeholder="Enter name." aria-label="default input example" required>
                </div>
                <div class="file-loading">
                    <label for="input-folder-3">Select files/folders</label>
                    <br>
                    <input id="input-folder-3" name="input-folder-3[]" type="file" multiple webkitdirectory required>
                </div>
                <br>
                <div class="mb-3">
                    <input class="form-control" name="game_path" type="text" placeholder="Enter game path." aria-label="default input example" required>
                </div>
                <div class="mb-3">
                    <label for="short_description_form" class="form-label">Short Description (X characters)</label>
                    <textarea class="form-control" name="short_description" id="short_description_form" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="long_description_form" class="form-label">Long Description (Y characters)</label>
                    <textarea class="form-control" name="long_description" id="long_description_form" rows="3" required></textarea>
                </div>
                <script>
                    $(document).ready(function() {
                        $("#input-folder-3").fileinput({
                            uploadUrl: "/games", // file-upload-batch/2
                            hideThumbnailContent: true // hide image, pdf, text or other content in the thumbnail preview
                        });
                    });
                </script>
                <button type="submit" class="btn btn-blue">UPLOAD GAME</button>
            </form>
        </div>
        <br>
        <div>
            <h3 class="m-3">LIST OF GAMES</h3>
            @foreach($games as $game)
                <p>{{ $game['name'] }} <a href="/admin/manage/game/delete/{{ $game['id'] }}"><button type="button" class="btn btn-red">DELETE GAME</button></a></p>
            @endforeach
        </div>
    </div><!--/middle content wrapper-->


</div><!--/ content wrapper -->

@endsection