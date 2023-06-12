<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
        aria-controls="offcanvasRight">Toggle right offcanvas
</button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Pomodoro timer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div><h2 id="timer">25:00</h2></div>
        <button type="button" class="btn btn-success" onclick="startTimer()">Start</button>
        <button type="button" class="btn btn-warning" onclick="stopTimer()">Stop</button>
        <button type="button" class="btn btn-danger" onclick="resetTimer()">Reset</button>
    </div>
</div>
