<script>
    const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const confirmed = confirm('Вы уверены, что хотите удалить?');
            if (confirmed) {
                const form = button.closest('form');
                form.submit();
            }
        });
    });

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script>
    var timerElement = document.getElementById("timer");
    var startTime;
    var duration = 25 * 60 * 1000; // 25 minutes in milliseconds
    var interval;
    var isTimerRunning = false;

    window.onload = function() {
        var storedTime = localStorage.getItem("startTime");
        var storedStatus = sessionStorage.getItem("timerStatus");
        if (storedTime && storedStatus === "running") {
            startTime = new Date(storedTime);
            var elapsedTime = Date.now() - startTime;
            if (elapsedTime >= duration) {
                clearInterval(interval);
                timerElement.textContent = "25:00";
                return;
            }
            var remainingTime = duration - elapsedTime;
            startTimer(remainingTime);
        }
    };

    function startTimer(remainingTime) {
        if (!isTimerRunning) {
            if (remainingTime) {
                updateTimer(remainingTime);
            } else {
                startTime = new Date();
            }
            interval = setInterval(updateTimer, 1000);
            isTimerRunning = true;
            sessionStorage.setItem("timerStatus", "running");
            localStorage.setItem("startTime", startTime);
        }
    }

    function stopTimer() {
        if (isTimerRunning) {
            clearInterval(interval);
            isTimerRunning = false;
            sessionStorage.setItem("timerStatus", "stopped");
            localStorage.removeItem("startTime");
        }
    }

    function resetTimer() {
        clearInterval(interval);
        timerElement.textContent = "25:00";
        isTimerRunning = false;
        sessionStorage.setItem("timerStatus", "stopped");
        localStorage.removeItem("startTime");
    }

    function updateTimer(remainingTime) {
        var currentTime = remainingTime || Date.now() - startTime;
        var minutes = Math.floor((duration - currentTime) / 60000);
        var seconds = Math.floor(((duration - currentTime) % 60000) / 1000);

        var minutesFormatted = minutes < 10 ? "0" + minutes : minutes;
        var secondsFormatted = seconds < 10 ? "0" + seconds : seconds;
        timerElement.textContent = minutesFormatted + ":" + secondsFormatted;

        if (currentTime >= duration) {
            clearInterval(interval);
            alert("Pomodoro Timer Completed!");
            resetTimer();
            return;
        }
    }

</script>
