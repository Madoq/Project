function calculate() {
	'use strict';
	var volume;
    var radius = document.getElementById('radius').value;
    if (isNaN(radius)) {
            document.getElementById(
            "result").innerHTML =
            "Please enter Numeric value";
            return false;
        }
        else
        {
            document.getElementById(
            "result").innerHTML ="";
            radius = Math.abs(radius);
            volume = (4/3) * 3.14 * Math.pow(radius, 3);
            volume = volume.toFixed(4);
            document.getElementById('volume').value = volume;
            return false;
        }    
}
function init() {
	'use strict';
	document.getElementById('theForm').onsubmit = calculate;
}
window.onload = init;