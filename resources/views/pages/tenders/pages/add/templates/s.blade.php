
.videoContainer {
width: 100%;
height: 90vh;
background: #010001;
margin: auto;
border-radius: 5px;
box-shadow: 3px 3px 3px rgba(0, 0, 0, .2);
position: relative;
overflow: hidden;
-webkit-user-select: none;
-moz-user-select: none;
user-select: none
}

.videoContainer.fullScreen {
width: 100vw!important;
height: 100vh!important
}

.videoContainer.small .intensityBar {
width: 50px!important
}

.videoContainer.small .playButton {
margin: 0 5px 0 0!important
}

.videoContainer.small .playPause,
.videoContainer.small .scale .icon,
.videoContainer.small .volume .icon {
width: 15px!important;
height: 15px!important
}

.videoContainer.small .progressBar {
height: 6px!important
}

.videoContainer.small .overlay .button {
width: 50px!important;
height: 50px!important
}

.videoContainer .overlay {
width: 100%;
height: 100%;
position: absolute;
top: 0;
left: 0;
z-index: 999;
border-radius: 5px
}

.videoContainer .overlay .button {
width: 80px;
height: 80px;
position: absolute;
top: 50%;
left: 50%;
background: url(https://goo.gl/68OJjZ);
background-size: 100% 100%;
transform: translate(-50%, calc(-50% - 30px));
cursor: pointer;
transition: width .2s, height .2s
}

.videoContainer .overlay .button:hover {
width: 90px;
height: 90px
}

.videoContainer #video {
width: 100%;
height: calc(100% - 0px);
position: relative;
top: 0;
left: 0;
overflow: hidden;
border-radius: 5px 5px 0 0
}

.videoContainer #video video {
width: 100%;
height: 100%;
position: absolute;
top: 0;
left: 0;
border-radius: 5px 5px 0 0
}

.videoContainer .controls,
.videoContainer .controls .playButton {
background: #c41f31;
align-items: center;
border-bottom-left-radius: 5px
}

.videoContainer #video video::-webkit-media-controls-enclosure {
display: none!important
}

.videoContainer .controls {
width: 100%;
height: 60px;
position: absolute;
right: 0;
bottom: 0;
display: flex;
justify-content: space-between;
border-bottom-right-radius: 5px;
z-index: 9999
}

.videoContainer .controls.is-visible {
transform: translateY(0)
}

.videoContainer .controls .playButton {
width: 70px;
height: 100%;
display: flex;
justify-content: center;
margin-right: 20px;
cursor: pointer;
transition: all .4s
}

.videoContainer .controls .playButton:hover {
background: #f44336
}

.videoContainer .controls .playButton .playPause {
width: 25px;
height: 25px;
background: url(../images/play_bq5ogt.svg);
background-size: 100% 100%
}

.videoContainer .controls .ProgressContainer {
color: #fff;
width: calc(100% - 100px);
height: 100%;
display: flex;
align-items: center;
justify-content: flex-start;
position: relative
}

.videoContainer .controls .ProgressContainer .progressBar {
width: 100%;
height: 8px;
background: #f44336;
border-radius: 20px;
cursor: pointer;
overflow: hidden
}

.videoContainer .controls .ProgressContainer .progressBar:hover+.time {
opacity: 1;
transform: translateY(0)
}

.videoContainer .controls .ProgressContainer .progressBar .progress {
width: 0%;
height: 100%;
background: #fff;
border-radius: 20px
}

.videoContainer .controls .ProgressContainer .timer {
margin: 0 10px;
font-family: Arial, sans-serif;
font-size: 12px;
font-weight: 300;
color: #fff;
letter-spacing: 1px
}

.videoContainer .controls .ProgressContainer .time {
width: 80px;
height: 25px;
background: #2e2e2e;
position: absolute;
top: -20px;
left: 0;
border-radius: 5px;
color: #fff;
font-family: Arial, sans-serif;
text-align: center;
line-height: 25px;
font-size: 12px;
letter-spacing: 1px;
opacity: 0;
transform: translateY(10px);
transition: transform .3s, opacity .3s
}

.videoContainer .controls .ProgressContainer .time::after {
content: "";
display: block;
width: 0;
height: 0;
position: absolute;
top: 25px;
left: 33px;
border-left: 6px solid transparent;
border-right: 6px solid transparent;
border-top: 6px solid #2e2e2e
}

.videoContainer .controls .volume {
width: 150px;
height: 100%;
display: flex;
align-items: center;
justify-content: flex-end;
position: relative
}

.videoContainer .controls .volume .icon {
width: 25px;
height: 25px;
background: url(../images/volume_ee3e3u.svg);
background-size: 100% 100%;
cursor: pointer;
margin-right: 10px
}

.videoContainer .controls .volume .intensityBar {
width: 100px;
height: 4px;
background: #f44336;
border-radius: 20px;
max-width: 100px;
overflow: hidden;
transform-origin: right center;
cursor: pointer;
transition: all .5s
}

.videoContainer .controls .volume .intensityBar .intensity {
width: 50%;
height: 100%;
background: #fff
}

.videoContainer .controls .scale {
width: 70px;
height: 100%;
background: #c41f31;
display: flex;
align-items: center;
justify-content: center;
margin-left: 5px;
cursor: pointer;
transition: all .4s;
border-bottom-right-radius: 5px
}

.videoContainer .controls .scale:hover {
background: #0f7fd8
}

.videoContainer .controls .scale .icon {
width: 25px;
height: 25px;
background: url(../images/expand_xzhgnk.svg);
background-size: 100% 100%
}
