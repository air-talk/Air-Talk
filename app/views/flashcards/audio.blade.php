@extends('layouts.master')
@section('head')
<link rel="stylesheet" href="/css/flashcards.css">

@stop
@section('content')
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content text-center">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                    </button>
                    <h3>Practice saying your response aloud</h3>
                    <p>Use your spacebar or click to reveal the proper response</p>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div id="card" data-face="front">
                                <div class="front"> 
                                    <div class="top">
                                        Flip <i class="glyphicon glyphicon-refresh"> </i>
                                    </div>
                                    <audio controls id="front">
                                    </audio>
                                    <div id="viz">
                                        <canvas id="analyser" width="1024" height="500"></canvas>
                                        <canvas id="wavedisplay" width="1024" height="500"></canvas>
                                    </div>
                                    <div id="controls">
                                        <img id="record" src="/images/mic128.png" onclick="toggleRecording(this);">
                                        <a id="save" href="#"><img src="/images/save.svg"></a>
                                    </div>
                                </div> 
                                <div class="back">
                                    <div class="top">
                                        Flip <i class="glyphicon glyphicon-refresh"> </i>
                                    </div>
                                    <div id="back">
                                        
                                    </div>
                                    <form action="#" method="post">
                                        <input type="hidden" name="index" id="index" value="">
                                        <input type="hidden" name="id" id="id" value="">
                                        <div class="col-md-6">
                                            <button class="btn btn-danger btn-block"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>I was wrong</button>
                                        </div>
                                        <div class="col-md-6">   
                                            <button class="btn btn-success btn-block">I was right<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></button>
                                        </div>
                                    </form>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-6">
                <div class="well">
                    <h2>Example Radio Calls</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Audio</th>
                                {{-- Look into created_at column in correctAnswers table for last practiced--}}
                                <th>Times practiced</th>
                                <th>Times Correct</th>
                                <th> % </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unansweredFlashcards as $flashcard)
                                <tr>
                                    <td><strong>{{$flashcard->title}}</strong></td>
                                    {{-- change later --}}
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0%</td>
                                </tr>
                            @endforeach
                            @foreach($answeredFlashcards as $test)
                                <tr>
                                    <td><strong>{{{ $test->title }}}</strong></td>
                                    <td>{{{ $test->pivot->attempts }}}</td>
                                    <td>{{{ $test->pivot->correct }}}</td>
                                    <td>{{{ floor($test->pivot->correct / $test->pivot->attempts * 100) }}}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <!-- Trigger the login modal with a button -->
                    <a type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#myModal">Practice Flashcards</a>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </div>
@stop
@section('script')
    <script src="/js/jquery.flip.js"></script>

    <!-- Audio Recording -->
    <script type="text/javascript">

        function drawBuffer( width, height, context, data ) {
            var step = Math.ceil( data.length / width );
            var amp = height / 2;
            context.fillStyle = "silver";
            context.clearRect(0,0,width,height);
            for(var i=0; i < width; i++){
                var min = 1.0;
                var max = -1.0;
                for (j=0; j<step; j++) {
                    var datum = data[(i*step)+j]; 
                    if (datum < min)
                        min = datum;
                    if (datum > max)
                        max = datum;
                }
                context.fillRect(i,(1+min)*amp,1,Math.max(1,(max-min)*amp));
            }
        }

        (function(window){

          var WORKER_PATH = 'js/recorderjs/recorderWorker.js';

          var Recorder = function(source, cfg){
            var config = cfg || {};
            var bufferLen = config.bufferLen || 4096;
            this.context = source.context;
            if(!this.context.createScriptProcessor){
               this.node = this.context.createJavaScriptNode(bufferLen, 2, 2);
            } else {
               this.node = this.context.createScriptProcessor(bufferLen, 2, 2);
            }
           
            var worker = new Worker(config.workerPath || WORKER_PATH);
            worker.postMessage({
              command: 'init',
              config: {
                sampleRate: this.context.sampleRate
              }
            });
            var recording = false,
              currCallback;

            this.node.onaudioprocess = function(e){
              if (!recording) return;
              worker.postMessage({
                command: 'record',
                buffer: [
                  e.inputBuffer.getChannelData(0),
                  e.inputBuffer.getChannelData(1)
                ]
              });
            }

            this.configure = function(cfg){
              for (var prop in cfg){
                if (cfg.hasOwnProperty(prop)){
                  config[prop] = cfg[prop];
                }
              }
            }

            this.record = function(){
              recording = true;
            }

            this.stop = function(){
              recording = false;
            }

            this.clear = function(){
              worker.postMessage({ command: 'clear' });
            }

            this.getBuffers = function(cb) {
              currCallback = cb || config.callback;
              worker.postMessage({ command: 'getBuffers' })
            }

            this.exportWAV = function(cb, type){
              currCallback = cb || config.callback;
              type = type || config.type || 'audio/wav';
              if (!currCallback) throw new Error('Callback not set');
              worker.postMessage({
                command: 'exportWAV',
                type: type
              });
            }

            this.exportMonoWAV = function(cb, type){
              currCallback = cb || config.callback;
              type = type || config.type || 'audio/wav';
              if (!currCallback) throw new Error('Callback not set');
              worker.postMessage({
                command: 'exportMonoWAV',
                type: type
              });
            }

            worker.onmessage = function(e){
              var blob = e.data;
              currCallback(blob);
            }

            source.connect(this.node);
            this.node.connect(this.context.destination);   // if the script node is not connected to an output the "onaudioprocess" event is not triggered in chrome.
          };

          Recorder.setupDownload = function(blob, filename){
            var url = (window.URL || window.webkitURL).createObjectURL(blob);
            var link = document.getElementById("save");
            link.href = url;
            link.download = filename || 'output.wav';
          }

          window.Recorder = Recorder;

        })(window);

        window.AudioContext = window.AudioContext || window.webkitAudioContext;

        var audioContext = new AudioContext();
        var audioInput = null,
            realAudioInput = null,
            inputPoint = null,
            audioRecorder = null;
        var rafID = null;
        var analyserContext = null;
        var canvasWidth, canvasHeight;
        var recIndex = 0;

        /* TODO:

        - offer mono option
        - "Monitor input" switch
        */

        function saveAudio() {
            audioRecorder.exportWAV( doneEncoding );
            // could get mono instead by saying
            // audioRecorder.exportMonoWAV( doneEncoding );
        }

        function gotBuffers( buffers ) {
            var canvas = document.getElementById( "wavedisplay" );

            drawBuffer( canvas.width, canvas.height, canvas.getContext('2d'), buffers[0] );

            // the ONLY time gotBuffers is called is right after a new recording is completed - 
            // so here's where we should set up the download.
            audioRecorder.exportWAV( doneEncoding );
        }

        function doneEncoding( blob ) {
            Recorder.setupDownload( blob, "myRecording" + ((recIndex<10)?"0":"") + recIndex + ".wav" );
            recIndex++;
        }

        function toggleRecording( e ) {
            if (e.classList.contains("recording")) {
                // stop recording
                audioRecorder.stop();
                e.classList.remove("recording");
                audioRecorder.getBuffers( gotBuffers );
            } else {
                // start recording
                if (!audioRecorder)
                    return;
                e.classList.add("recording");
                audioRecorder.clear();
                audioRecorder.record();
            }
        }

        function convertToMono( input ) {
            var splitter = audioContext.createChannelSplitter(2);
            var merger = audioContext.createChannelMerger(2);

            input.connect( splitter );
            splitter.connect( merger, 0, 0 );
            splitter.connect( merger, 0, 1 );
            return merger;
        }

        function cancelAnalyserUpdates() {
            window.cancelAnimationFrame( rafID );
            rafID = null;
        }

        function updateAnalysers(time) {
            if (!analyserContext) {
                var canvas = document.getElementById("analyser");
                canvasWidth = canvas.width;
                canvasHeight = canvas.height;
                analyserContext = canvas.getContext('2d');
            }

            // analyzer draw code here
            {
                var SPACING = 3;
                var BAR_WIDTH = 1;
                var numBars = Math.round(canvasWidth / SPACING);
                var freqByteData = new Uint8Array(analyserNode.frequencyBinCount);

                analyserNode.getByteFrequencyData(freqByteData); 

                analyserContext.clearRect(0, 0, canvasWidth, canvasHeight);
                analyserContext.fillStyle = '#F6D565';
                analyserContext.lineCap = 'round';
                var multiplier = analyserNode.frequencyBinCount / numBars;

                // Draw rectangle for each frequency bin.
                for (var i = 0; i < numBars; ++i) {
                    var magnitude = 0;
                    var offset = Math.floor( i * multiplier );
                    // gotta sum/average the block, or we miss narrow-bandwidth spikes
                    for (var j = 0; j< multiplier; j++)
                        magnitude += freqByteData[offset + j];
                    magnitude = magnitude / multiplier;
                    var magnitude2 = freqByteData[i * multiplier];
                    analyserContext.fillStyle = "hsl( " + Math.round((i*360)/numBars) + ", 100%, 50%)";
                    analyserContext.fillRect(i * SPACING, canvasHeight, BAR_WIDTH, -magnitude);
                }
            }
            
            rafID = window.requestAnimationFrame( updateAnalysers );
        }

        function toggleMono() {
            if (audioInput != realAudioInput) {
                audioInput.disconnect();
                realAudioInput.disconnect();
                audioInput = realAudioInput;
            } else {
                realAudioInput.disconnect();
                audioInput = convertToMono( realAudioInput );
            }

            audioInput.connect(inputPoint);
        }

        function gotStream(stream) {
            inputPoint = audioContext.createGain();

            // Create an AudioNode from the stream.
            realAudioInput = audioContext.createMediaStreamSource(stream);
            audioInput = realAudioInput;
            audioInput.connect(inputPoint);

        //    audioInput = convertToMono( input );

            analyserNode = audioContext.createAnalyser();
            analyserNode.fftSize = 2048;
            inputPoint.connect( analyserNode );

            audioRecorder = new Recorder( inputPoint );

            zeroGain = audioContext.createGain();
            zeroGain.gain.value = 0.0;
            inputPoint.connect( zeroGain );
            zeroGain.connect( audioContext.destination );
            updateAnalysers();
        }

        function initAudio() {
                if (!navigator.getUserMedia)
                    navigator.getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
                if (!navigator.cancelAnimationFrame)
                    navigator.cancelAnimationFrame = navigator.webkitCancelAnimationFrame || navigator.mozCancelAnimationFrame;
                if (!navigator.requestAnimationFrame)
                    navigator.requestAnimationFrame = navigator.webkitRequestAnimationFrame || navigator.mozRequestAnimationFrame;

            navigator.getUserMedia(
                {
                    "audio": {
                        "mandatory": {
                            "googEchoCancellation": "false",
                            "googAutoGainControl": "false",
                            "googNoiseSuppression": "false",
                            "googHighpassFilter": "false"
                        },
                        "optional": []
                    },
                }, gotStream, function(e) {
                    alert('Error getting audio');
                    console.log(e);
                });
        }

        window.addEventListener('load', initAudio );
    </script>
    <script type="text/javascript">
        
        var flashcardList = [];
        @foreach($unansweredFlashcards as $flashcard)
            flashcardList.push({ id:"{{{ $flashcard->id }}}", front:"{{{ $flashcard->front }}}", back: "{{{ $flashcard->back }}}", description:"{{{ $flashcard->description }}}" })
        @endforeach
        @foreach($answeredFlashcards as $flashcard)
            flashcardList.push({ id:"{{{ $flashcard->id }}}", front:"{{{ $flashcard->front }}}", back: "{{{ $flashcard->back }}}", description:"{{{ $flashcard->description }}}" })
        @endforeach


       console.log(flashcardList);
        $(".front").prepend('<p>' + flashcardList[0].description +'</p>');
        $("#front").html('<source src="' + flashcardList[0].front + '" type="audio/mpeg">');
        $("#back").html(flashcardList[0].back);
        $("#id").val(flashcardList[0].id);
        $("#index").val('0');



        var card_face = 'front';

        $("#card").flip({
          axis: 'x',
          reverse: true,
          forceHeight: true
        });

        $("#card").on('flip:done', function() {
            var face = $(this).data('face');

            if (face == 'front') {
                $(this).data('face', 'back');
            } else {
                $(this).data('face', 'front');
            }
        });

        function sleep(milliseconds) {
          var start = new Date().getTime();
          for (var i = 0; i < 1e7; i++) {
            if ((new Date().getTime() - start) > milliseconds){
              break;
            }
          }
        }

        $(document).keypress(function(e) {
          if(e.which == 32) {
            $("#card").flip('toggle');
          }
        });

        $('#myModal').on('hidden.bs.modal', function () {
            location.reload();
        })
        
        // got anser right, store in attempts table
        $(document).keyup(function(e) {
            if(e.which == 39 && $('#card').data('face') == 'back' || e.which == 37 && $('#card').data('face') == 'back' ) {
                var next = parseInt($("#index").val());
                $("#card").flip('toggle');
                next++;
                if(next < flashcardList.length){
                    $.ajax({
                    type: "POST",
                        url: "/flashcards/attempt/" + $("#id").val() + "/" + e.which ,
                        data: {id:$("#id").val(),which:e.which},
                        dataType: "json",

                        success: function(data) {

                            $("#front").html('<source src="' + flashcardList[next].front + '" type="audio/mpeg">');
                            $("#id").val(flashcardList[next].id);
                            $("#index").val(next);
                            // sleep(50);
                            $("#back").html(flashcardList[next].back);
                        },
                        error: function(data){
                        alert("fail");
                        // add in redirect to results page here
                        }
                    });
                }else{
                    $("#card").flip('toggle');
                    $("#front").html('You have completed all of the flashcards the Modal will close in 5 seconds!');
                    $("#back").html('You have completed all of the flashcards the Modal will close in 5 seconds!');
                   
                    setTimeout(function(){
                       location.reload();
                    }, 4000);
                }
            }   
        });
        
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.min.js"></script>
@stop
