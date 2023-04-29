var pomodoro = {
  	task: null,
  	isPaused: true,
  	workTime: new Date(25.01 * 60 * 1000),
  	restTime: new Date(5.01 * 60 * 1000),
  	timer: {},
  	timeAwait: 0,
  	intervals: [],
  	text: "",
};

workButton.addEventListener("click", function () {
	var workButton = document.getElementById("workButton");

	if (pomodoro.task != "work") {
		resetPomodoroTimer();
		pomodoro.task = "work";
		pomodoro.timeAwait = pomodoro.workTime;

		clearInterval(pomodoro.timer);

		pomodoro.timer = setInterval(function () {
		var timeTheRest = getTimeTheRest();
		if (timeTheRest < 0) {
			timeTheRest = 0;
			resetPomodoroTimer();
			workButton.innerHTML = "Start";
			addCurrency(200);
		}
		renderTimerText(timeTheRest);
		}, 100);
	}
	handlePomodoroControlButtonPressWork();
});

restButton.addEventListener("click", function () {
	var restButton = document.getElementById("restButton");
	
	if (pomodoro.task != "rest") {
		resetPomodoroTimer();
		pomodoro.task = "rest";
		pomodoro.timeAwait = pomodoro.restTime;

		clearInterval(pomodoro.timer);

		pomodoro.timer = setInterval(function () {
		var timeTheRest = getTimeTheRest();
		if (timeTheRest < 0) {
			timeTheRest = 0;
			resetPomodoroTimer();
			restButton.innerHTML = "Rest";
			showBreakToast();
		}
		renderTimerText(timeTheRest);
		}, 100);
	}
	handlePomodoroControlButtonPressRest();
});

function handlePomodoroControlButtonPressWork() {
	var workButton = document.getElementById("workButton");
	var restButton = document.getElementById("restButton");

	if (pomodoro.isPaused) {
		pomodoro.intervals.push([new Date()]);
		workButton.innerHTML = "Pause";
		restButton.innerHTML = "Rest";
	} else {
		pomodoro.intervals[pomodoro.intervals.length - 1].push(new Date());
		workButton.innerHTML = "Start";
	}
	pomodoro.isPaused = !pomodoro.isPaused;
}

function handlePomodoroControlButtonPressRest() {
	var workButton = document.getElementById("workButton");
	var restButton = document.getElementById("restButton");

	if (pomodoro.isPaused) {
		pomodoro.intervals.push([new Date()]);
		restButton.innerHTML = "Pause";
		workButton.innerHTML = "Start";
	} else {
		pomodoro.intervals[pomodoro.intervals.length - 1].push(new Date());
		restButton.innerHTML = "Rest";
	}
	pomodoro.isPaused = !pomodoro.isPaused;
}

function resetPomodoroTimer() {
  	clearInterval(pomodoro.timer);
  	pomodoro.task = null;
  	pomodoro.isPaused = true;
  	pomodoro.intervals = [];
}

function getTimeTheRest() {
	var diff = 0;
	if (pomodoro.intervals.length) {
		for (var i = 0; i < pomodoro.intervals.length; i++) {
			if (pomodoro.intervals[i].length == 2) {
				diff += pomodoro.intervals[i][1] - pomodoro.intervals[i][0];

			} else if (pomodoro.intervals[i].length == 1) {
				diff += new Date() - pomodoro.intervals[i][0];
			}
		}
	}
	var timeTheRest = pomodoro.timeAwait - diff;
	return timeTheRest;
}

function renderTimerText(timeTheRest) {
	var diffDate = new Date(timeTheRest);

	var minutes = withLeadingZero(diffDate.getUTCMinutes());
	var seconds = withLeadingZero(diffDate.getUTCSeconds());

	var newText = minutes + ":" + seconds;

	if (pomodoro.text != newText) {
		pomodoro.text = newText;
		timer.innerHTML = pomodoro.text;
	}
}

function withLeadingZero(val) {
	val += "";
	if (val.length == 1) {
		val = "0" + val;
	}
	return val;
}

function showStudyToast() {
  	var toast = $(".toast-study");
  	toast.toast({ autohide: false });
  	toast.toast("show");
  	document.getElementById("toast-level").play();
}

function showBreakToast() {
  	var toast = $(".toast-break");
  	toast.toast({ autohide: false });
  	toast.toast("show");
  	document.getElementById("toast-level").play();
}

function addCurrency(amount) {
	$.ajax({
		url: "../back/action/study.action.php?action=studyReward",
		type: "POST",
		data: {
			amount: amount,
		},
		success: function () {
			showStudyToast();
		},
		error: function () {
			console.log("Error: Unable to add currency");
		},
	});
}