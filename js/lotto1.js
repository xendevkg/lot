var lotto_size = 6; // # of numbers in the lottery NOT plus bonus
var num_min = 0; //  lotto lowest pick
var num_max = 9; //  lotto highest pick
var repeat_num = 1; // 1 = yes; 0 = no; Can numbers repeat? 
var lotto_size_2 = 0; // # of numbers in the lottery NOT plus bonus
var num_min_2 = 0; //  lotto lowest pick
var num_max_2 = 9; //  lotto highest pick

// don't change values below *****
var picks = new Array (lotto_size);
var time_num = 0;

function pick_numbers(){
	picks = [];
	var i;
	var x = -1;
	for (i = 0; i < lotto_size; i++){
		do{
			pick = rand(num_min,num_max);
			pick = pad(pick, 1);
			
			if(repeat_num == 0){
			x = picks.join().indexOf(pick);
			}
		}
		while(x != -1);
		picks[i] = pick;
	}
	if(lotto_size_2 != 0){
		pick_numbers_2();
	}
	swapText(picks.join(""));
}

function start_loop(){
	time_num = 0;
	looping();
}	

function looping(){
	if(time_num == 0){
		pick_numbers()
		window.setTimeout('looping()',100);
	}
}

function pad(number, length) {
	var str = '' + number;
    while (str.length < length) {
        str = '0' + str;
    }
	return str;
}

function swapText(txtMsg){
	// FF fix
	if (navigator.userAgent.indexOf('Firefox') !=-1){
		var i;
		for (i = 0; i < lotto_size; i++){
			 msg = "msg"+i;
			 dynamiccontentNS6(msg,picks[i]);
		}
	} else
		var i;
		for (i = 0; i < lotto_size; i++){
			document.getElementById( "msg"+i ).innerHTML = picks[i];
		}
}

// Function for FF fix
function dynamiccontentNS6(elementid,content){
	if (document.getElementById && !document.all){
		rng = document.createRange();
		el = document.getElementById(elementid);
		rng.setStartBefore(el);
		htmlFrag = rng.createContextualFragment(content);
		while (el.hasChildNodes())
		el.removeChild(el.lastChild);
		el.appendChild(htmlFrag);
	}
}

function rand(minVal,maxVal,floatVal){
  var randVal = minVal+(Math.random()*(maxVal-minVal));
  return typeof floatVal=='undefined'?Math.round(randVal):randVal.toFixed(floatVal);
}

