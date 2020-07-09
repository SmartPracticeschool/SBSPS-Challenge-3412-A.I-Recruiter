<?php
session_start();
if(!isset($_SESSION['admin']) || $_SESSION['admin']!=true)
{
  header("location: adminlogin.php");
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Video Admin</title>
  </head>
  <script type="text/javascript">
var room;
var members;
var localStream;
onBistriConferenceReady = function () {
if ( !bc.isCompatible() ) {
    alert( "your browser is not WebRTC compatible !" );
    return;
}
bc.init( {
    "appId": "########",   // api ID is not free to use so we put #######
    "appKey": "##############" // api ID is not free to use so we put #######
} );
bc.signaling.bind( "onConnected", function () {
    showPanel( "pane_1" );
} );
bc.signaling.bind( "onError", function ( error ) {
    alert( error.text + " (" + error.code + ")" );
} );
bc.signaling.bind( "onJoinedRoom", function ( data ) {
    room = data.room;
    members = data.members;
    bc.startStream( "webcam-sd", function( stream ){
        localStream = stream;
        showPanel( "pane_2" );
        bc.attachStream( stream, q( "#video_container" ), { mirror: true } );
        for ( var i=0, max=members.length; i<max; i++ ) {
            bc.call( members[ i ].id, room, { "stream": stream } );
        }
    } );
} );
bc.signaling.bind( "onJoinRoomError", function ( error ) {
   alert( error.text + " (" + error.code + ")" );
} );
bc.signaling.bind( "onQuittedRoom", function( room ) {
       bc.stopStream( localStream, function(){
        bc.detachStream( localStream );
        showPanel( "pane_1" );
    } );
} );
bc.streams.bind( "onStreamAdded", function ( remoteStream ) {
    bc.attachStream( remoteStream, q( "#video_container_2" ) );
} );
bc.streams.bind( "onStreamClosed", function ( stream ) {
    bc.detachStream( stream );
} );
bc.streams.bind( "onStreamError", function( error ){   
    switch( error.name ){
        case "PermissionDeniedError":
            alert( "Webcam access has not been allowed" );
            bc.quitRoom( room );
            break
        case "DevicesNotFoundError":
            if( confirm( "No webcam/mic found on this machine. Process call anyway ?" ) ){
                showPanel( "pane_2" );
                for ( var i=0, max=members.length; i<max; i++ ) {
                    bc.call( members[ i ].id, room );
                }
            }
            else{
                bc.quitRoom( room );  
            }
            break
    }
} );
q( "#join" ).addEventListener( "click", joinConference );
q( "#quit" ).addEventListener( "click", quitConference );
bc.connect();
}
function joinConference(){
var roomToJoin = "Admin";
if( roomToJoin ){

    bc.joinRoom( roomToJoin );
}
else{
    alert( "you must enter a room name !" )
}  
}
function quitConference(){
bc.quitRoom( room );
}
function showPanel( id ){ 
var panes = document.querySelectorAll( ".pane" );
for( var i=0, max=panes.length; i<max; i++ ){
    panes[ i ].style.display = panes[ i ].id == id ? "block" : "none";
};
}

function q( query ){
return document.querySelector( query );
}
</script>
<style type="text/css">
        #video_container{
            
            margin: 20px;
            text-align: center;
            width:100px;
            height:50px; 
            position:absolute;
            top:150px;
            left: 150px;
            z-index: 1;
        }
        #video_container_2{
            
            margin: 20px;
            text-align: center;
            width:800px;
            height:800px; 
            position:absolute;
            top:250px;
            left: 200px;
        }
        
        video {
            width: 100%;
        }
        body{
        background-color:#E6E6FA;
        }           
        .container-fluid{
        background-image: linear-gradient(90deg, #4b6cb7, #182848);
        } 


</style>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="dashboard.php">Company Name</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="adashboard.php">Dashboard <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="schedule.php">Schedule Interview <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="video.php">Video Interview <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="performance.php">Performance Form <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout <span class="sr-only"></span></a>
      </li>
    </ul>
  </div>
</nav>

      <div class="container my-4 card">
      <div class="pane" id="pane_1" style="display: block">
        <br>
        <input type="button" value="Interview" id="join" class="btn btn-lg btn-success">
    </div>
    
    <div class=" pane" id="pane_2" style="display: none">
        <div id="video_container"></div>
        <div id="video_container_2"></div>
        <input type="button" value="Quit Conference Room" id="quit" class="btn btn-danger btn-default btn-block">
    </div>
    <br> <br> <br> <br> <br>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>