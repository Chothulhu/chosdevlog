@extends('admin.admin_master')
@section ('admin')
  
<div class="content_wrapper">
    <!--middle content wrapper-->
    <h3 class="m-3">COMMENTS</h3>
    <div class="middle_content_wrapper">
        <!-- counter_area -->

        <div>
            <form method="get" action="{{ url('admin/manage/comments/search') }}">
            <select class="form-control" name="game_id">
                <option>Select Item</option>
                @foreach ($games as $key => $value)
                    <option value="{{ $key }}" {{ ( $key == 2) ? 'selected' : '' }}> 
                        {{ $value }} 
                    </option>
                @endforeach    
            </select>
            <br>
            <button type="submit" class="btn btn-blue">SHOW COMMENTS</button>
            </form>
        </div>

        <br>
        <div>
            @if(isset($comments))  
                <form method="get" action="{{ route('admin.manage.comments.export') }}">
                    @foreach($comments as $comment)
                        <p><b>{{ $comment->username }}</b> {{ $comment->comment }}<a href="/delete/comment/{{ $comment['id'] }}"> DEL</a></p></p>
                        <input type="hidden" value="{{ $comment->comment }}" name="comment[]" multiple/> 
                        <input type="hidden" value="{{ $comment->username }}" name="username[]" multiple/>   
                    @endforeach
                    <button type="submit" class="btn btn-blue">EXPORT COMMENTS</button>
                </form>
            @endif
        </div>
    </div><!--/middle content wrapper-->


</div><!--/ content wrapper -->

@endsection