<?php
  $gamesId = $games['id'];
  
  $comments = App\Models\Comment::where('game_id', $gamesId)->get();
?>

<x-base-layout>
    <x-slot name="head">
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Unity WebGL Player | {{ $games['name'] }}</title>
        <link rel="shortcut icon" href="/games{{ $games['game_path'] }}/favicon.ico">
        <link rel="stylesheet" href="/games{{ $games['game_path'] }}/style.css">
    </x-slot>
    
    <div class="flex grid grid-rows-2 grid-cols-12">

        <div class="col-start-2 col-end-12 row-start-1 row-end-1">
            <div id="unity-container" class="unity-desktop">
                <canvas id="unity-canvas" style="outline: none"></canvas>
                <div id="unity-loading-bar">
                    <div id="unity-logo"></div>
                    <div id="unity-progress-bar-empty"></div>
                    <div id="unity-progress-bar-full"></div>
                </div>
                <div id="unity-warning"></div>
                <div id="unity-footer">
                    <div id="unity-fullscreen-button"></div>
                </div>
            </div>
        </div>
        

      <div class="col-start-3 col-end-6 p-8 m-4 bg-blue-200 rounded-3xl shadow overflow-y-auto w-full h-80">
        <p class="text-center"><b>ABOUT GAME {{ $games['name'] }}</b></p>
        <br>
        <p class="text-center">{{ $games['long_desc'] }}</p>
      </div>
      <div class="col-start-6 col-end-11 p-8 m-4 bg-blue-200 rounded-3xl shadow overflow-y-auto w-full h-80">

        @if (Route::has('login'))
                @auth
                  <br>
                  <div>
                    <form method="post" action="{{url('comments')}}">
                      @csrf
                      <div>
                        <input type="text" name="comment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write a comment" required>
                        <input type="hidden" name="id" value="{{ $gamesId }}">
                        <input type="hidden" name="username" value="{{ auth()->user()->name }}">
                      </div>
                      <div class="flex justify-end">
                        <button type="submit"> Submit </button>
                      </div>              
                    </form>
                  </div>
                  @foreach($comments as $comment)
                    <p><b>{{ $comment['username'] }}</b>. {{ $comment['comment'] }} 
                    @if(auth()->user()->name == $comment['username'])
                      <a href="/delete/comment/{{ $comment['id'] }}">DEL</a></p>
                    @endif
                    <br>
                  @endforeach
                @else
                <div class="flex justify-center">
                  <a href="{{ route('login') }}" class="rounded-3xl font-bold underline">Log in to see comments.</a> 
                </div>
                    
                @endauth
            </div>
        @endif
      </div>
    </div>
    <script>
      var container = document.querySelector("#unity-container");
      var canvas = document.querySelector("#unity-canvas");
      var loadingBar = document.querySelector("#unity-loading-bar");
      var progressBarFull = document.querySelector("#unity-progress-bar-full");
      var fullscreenButton = document.querySelector("#unity-fullscreen-button");
      var warningBanner = document.querySelector("#unity-warning");

      // Shows a temporary message banner/ribbon for a few seconds, or
      // a permanent error message on top of the canvas if type=='error'.
      // If type=='warning', a yellow highlight color is used.
      // Modify or remove this function to customize the visually presented
      // way that non-critical warnings and error messages are presented to the
      // user.
      function unityShowBanner(msg, type) {
        function updateBannerVisibility() {
          warningBanner.style.display = warningBanner.children.length ? 'block' : 'none';
        }
        var div = document.createElement('div');
        div.innerHTML = msg;
        warningBanner.appendChild(div);
        if (type == 'error') div.style = 'background: red; padding: 10px;';
        else {
          if (type == 'warning') div.style = 'background: yellow; padding: 10px;';
          setTimeout(function() {
            warningBanner.removeChild(div);
            updateBannerVisibility();
          }, 5000);
        }
        updateBannerVisibility();
      }

      var buildUrl = "/games{{ $games['game_path'] }}/Build";
      var loaderUrl = buildUrl + "{{ $games['game_path'] }}.loader.js";
      var config = {
        dataUrl: buildUrl + "{{ $games['game_path'] }}.data.unityweb",
        frameworkUrl: buildUrl + "{{ $games['game_path'] }}.framework.js.unityweb",
        codeUrl: buildUrl + "{{ $games['game_path'] }}.wasm.unityweb",
        streamingAssetsUrl: buildUrl,
        companyName: "DefaultCompany",
        productName: "{{ $games['name'] }}",
        productVersion: "0.1",
        showBanner: unityShowBanner,
      };
      

      // By default Unity keeps WebGL canvas render target size matched with
      // the DOM size of the canvas element (scaled by window.devicePixelRatio)
      // Set this to false if you want to decouple this synchronization from
      // happening inside the engine, and you would instead like to size up
      // the canvas DOM size and WebGL render target sizes yourself.
      // config.matchWebGLToCanvasSize = false;

        // Desktop style: Render the game canvas in a window that can be maximized to fullscreen:

        canvas.style.width = "100%";
        canvas.style.height = "100%";

      loadingBar.style.display = "block";

      var script = document.createElement("script");
      script.src = loaderUrl;
      script.onload = () => {
        createUnityInstance(canvas, config, (progress) => {
          progressBarFull.style.width = 100 * progress + "%";
        }).then((unityInstance) => {
          loadingBar.style.display = "none";
          fullscreenButton.onclick = () => {
            unityInstance.SetFullscreen(1);
          };
        }).catch((message) => {
          alert(message);
        });
      };
      document.body.appendChild(script);
    </script>
    <script>
      var recaptureInputAndFocus = function() {
        //var canvas = document.getElementById("#unity-canvas");
        if(canvas) {
          canvas.setAttribute("tabindex", "1");
          canvas.focus(); 
        } else
          setTimeout(recaptureInputAndFocus, 100);
      }
  
      recaptureInputAndFocus();
    </script>
</x-base-layout>