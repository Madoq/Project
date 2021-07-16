var sphereVol = function(){
    radius = document.getElementById("radius").value;
    var c = (4/3) * 3.14 * Math.pow(radius, 3);
    console.log(c);
    document.getElementById("result").innerHTML="The volume is: "+c;
    }