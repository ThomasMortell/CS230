$('#inputForm').on('submit', function (e)
{
	e.preventDefault();
	if(validateForm()){
    clearResults();
		checkAnswers();
	}
});

//Validates that all the questions have been answered
function validateForm() {
	event.preventDefault();
	for(i = 1; i<=10;i++){
		if(!(document.getElementById("question-"+i+"-answers-A").checked ||	document.getElementById("question-"+i+"-answers-B").checked ||
		document.getElementById("question-"+i+"-answers-C").checked ||	document.getElementById("question-"+i+"-answers-D").checked)){
			alert("Please enter all questions before submitting the quiz.");
			return false;
		}
	}
	return true;
}

function clearResults() {
  $('#results').empty();
}

//Checks every questions answer and appends the result to the results div
function checkAnswers() {
	var totalScore = 0;

	var question1Val = "";
	var question1 = $("#wrap1 input[type='radio']:checked");
	if (question1.length > 0) {
		question1Val = question1.val();
		if(question1Val == "D") {
			$('#results').append('<div class="right">Question 1: You answered correctly!</div>')
			totalScore++;
		} else {
			$('#results').append('<div class="wrong">Question 1: You answered incorrectly!</div>')
		}
	}

	var question2Val = "";
	var question2 = $("#wrap2 input[type='radio']:checked");
	if (question2.length > 0) {
		question2Val = question2.val();
		if(question2Val == "A") {
			$('#results').append('<div class="right">Question 2: You answered correctly!</div>')
			totalScore++;
		} else {
			$('#results').append('<div class="wrong">Question 2: You answered incorrectly!</div>')
		}
	}

	var question3Val = "";
	var question3 = $("#wrap3 input[type='radio']:checked");
	if (question3.length > 0) {
		question3Val = question3.val();
		if(question3Val == "C") {
			$('#results').append('<div class="right">Question 3: You answered correctly!</div>')
			totalScore++;
		} else {
			$('#results').append('<div class="wrong">Question 3: You answered incorrectly!</div>')
		}
	}

	var question4Val = "";
	var question4 = $("#wrap4 input[type='radio']:checked");
	if (question4.length > 0) {
		question4Val = question4.val();
		if(question4Val == "D") {
			$('#results').append('<div class="right">Question 4: You answered correctly!</div>')
			totalScore++;
		} else {
			$('#results').append('<div class="wrong">Question 4: You answered incorrectly!</div>')
		}
	}

	var question5Val = "";
	var question5 = $("#wrap5 input[type='radio']:checked");
	if (question5.length > 0) {
		question5Val = question5.val();
		if(question5Val == "A") {
			$('#results').append('<div class="right">Question 5: You answered correctly!</div>')
			totalScore++;
		} else {
			$('#results').append('<div class="wrong">Question 5: You answered incorrectly!</div>')
		}
	}

	var question6Val = "";
	var question6 = $("#wrap6 input[type='radio']:checked");
	if (question6.length > 0) {
		question6Val = question6.val();
		if(question6Val == "B") {
			$('#results').append('<div class="right">Question 6: You answered correctly!</div>')
			totalScore++;
		} else {
			$('#results').append('<div class="wrong">Question 6: You answered incorrectly!</div>')
		}
	}

	var question7Val = "";
	var question7 = $("#wrap7 input[type='radio']:checked");
	if (question7.length > 0) {
		question7Val = question7.val();
		if(question7Val == "B") {
			$('#results').append('<div class="right">Question 7: You answered correctly!</div>')
			totalScore++;
		} else {
			$('#results').append('<div class="wrong">Question 7: You answered incorrectly!</div>')
		}
	}

	var question8Val = "";
	var question8 = $("#wrap8 input[type='radio']:checked");
	if (question8.length > 0) {
		question8Val = question8.val();
		if(question8Val == "D") {
			$('#results').append('<div class="right">Question 8: You answered correctly!</div>')
			totalScore++;
		} else {
			$('#results').append('<div class="wrong">Question 8: You answered incorrectly!</div>')
		}
	}

	var question9Val = "";
	var question9 = $("#wrap9 input[type='radio']:checked");
	if (question9.length > 0) {
		question9Val = question9.val();
		if(question9Val == "A") {
			$('#results').append('<div class="right">Question 9: You answered correctly!</div>')
			totalScore++;
		} else {
			$('#results').append('<div class="wrong">Question 9: You answered incorrectly!</div>')
		}
	}

	var question10Val = "";
	var question10 = $("#wrap10 input[type='radio']:checked");
	if (question10.length > 0) {
		question10Val = question10.val();
		if(question10Val == "C") {
			$('#results').append('<div class="right">Question 10: You answered correctly!</div>')
			totalScore++;
		} else {
			$('#results').append('<div class="wrong">Question 10: You answered incorrectly!</div>')
		}
	}

	$('#results').append('<div class="total">You scored ' + totalScore * 10 + '%</div>')


}
