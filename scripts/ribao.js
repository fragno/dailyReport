function SubmitStart(){
	document.getElementById("textarea5").innerHTML = "<b>姓名:</b></br>" + document.getElementById("name").value + "</br>"
	+ "<b>本周工作安排:</b></br>" + document.getElementById("textarea1").value + "</br>"
	+ "<b>预计完成进度:</b></br>" + document.getElementById("compRange").value + "%" + "</br>"
	+ "<b>上周存在问题:</b></br>" + document.getElementById("textarea2").value + "</br>"
	+ "<b>本周工作难点:</b></br>" + document.getElementById("textarea4").value + "</br>"
	+ "<hr></br></br>"; 				

	document.getElementById("textarea6").innerHTML = "预览开发中";
	
	document.getElementById("txt").value = document.getElementById("textarea5").innerHTML;	
	document.getElementById("Name").value = document.getElementById("name").value;
	document.getElementById("Date").value = yesterdayTimeString;
	//SetCookie("name", document.getElementById("name").value);
}

function Submiting(){	
	document.getElementById("textarea5").innerHTML = "<b>姓名:</b></br>" + document.getElementById("name").value + "</br>"
	+ "<b>周中工作总结:</b></br>" + document.getElementById("textarea1").value + "</br>"
	+ "<b>计划完成情况:</b></br>" + document.getElementById("compRange").value + "%" + "</br>"
	+ "<b>计划存在问题:</b></br>" + document.getElementById("textarea2").value + "</br>"
	+ "<b>计划安排调整:</b></br>" + document.getElementById("textarea4").value + "</br>"
	+ "<hr></br></br>"; 				

	document.getElementById("textarea6").innerHTML = "预览开发中";

	document.getElementById("txt").value = document.getElementById("textarea5").innerHTML;	
	document.getElementById("Name").value = document.getElementById("name").value;
	document.getElementById("Date").value = yesterdayTimeString;
	//SetCookie("name", document.getElementById("name").value);
}

function SubmitSum(){
	document.getElementById("textarea5").innerHTML = "<b>姓名:</b></br>" + document.getElementById("name").value + "</br>"
	+ "<b>本周工作总结:</b></br>" + document.getElementById("textarea1").value + "</br>"
	+ "<b>工作完成情况:</b></br>" + document.getElementById("compRange").value + "%" + "</br>"
	+ "<b>本周存在问题:</b></br>" + document.getElementById("textarea2").value + "</br>"
	+ "<b>下周工作安排:</b></br>" + document.getElementById("textarea4").value + "</br>"
	+ "<hr></br></br>"; 				

	document.getElementById("textarea6").innerHTML = "预览开发中";

	document.getElementById("txt").value = document.getElementById("textarea5").innerHTML;	
	document.getElementById("Name").value = document.getElementById("name").value;
	document.getElementById("Date").value = yesterdayTimeString;
	//SetCookie("name", document.getElementById("name").value);
}

function tick() {
	var today=new Date();
	var yesterday=new Date(today);
	yesterday.setDate(today.getDate()-1);
	<!-- getMonth显示当前月份-1，所以要+1才能显示当前月份 -->
	var month=today.getMonth()+1;
	var year, date, hours, minutes, seconds;
	var intHours, intMinutes, intSeconds;
	var week=new Array() <!--显示几天为星期几-->
	week[0]="星期天 ";
	week[1]="星期一 ";
	week[2]="星期二 ";
	week[3]="星期三 ";
	week[4]="星期四 ";
	week[5]="星期五 ";
	week[6]="星期六 ";
	intHours = today.getHours();
	intMinutes = today.getMinutes();
	intSeconds = today.getSeconds();
	year=today.getFullYear();
	date=today.getDate();
	yesterdayDate=yesterday.getDate();
	var time;
	if (intHours == 0) {
		hours = "00:";
	}
	else if (intHours < 10) {
		hours = "0" + intHours+":";
	}
	else {
		hours = intHours + ":";
	}
	if (intMinutes < 10) {
		minutes = "0"+intMinutes+":";
	}
	else {
		minutes = intMinutes+":";
	}
	if (intSeconds < 10) {
		seconds = "0"+intSeconds+" ";
	}
	else {
		seconds = intSeconds+" ";
	}
	timeString = year + '-' + month + "-" + date;
	yesterdayTimeString = year + '-' + month + "-" + yesterdayDate;
	var xinqiString = new Date().getDay();
	document.getElementById("input1").innerHTML = timeString;
	document.getElementById("input2").innerHTML = week[xinqiString];


	/*
	var tempName = getCookie("name");
	if(!document.getElementById("name").value && tempName)
	{		
		document.getElementById("name").value = tempName;
	}
	*/


	//getArgs
	var args = {};
	args = getArgs();
	var name = args["name"];
	var email = args["email"];
	document.getElementById("name").innerHTML = name;
	document.getElementById("name").value = name;

	document.getElementById("email").innerHTML = email;
	document.getElementById("email").value = email;

}

function test(){
	var test1 = new Date().getDay();
	alert(test1);
}

function getArgs() { 
	var args = {};
	var query = location.search.substring(1);
         // Get query string
	var pairs = query.split("&"); 
	// Break at ampersand
	for(var i = 0; i < pairs.length; i++) {
		var pos = pairs[i].indexOf('=');
		// Look for "name=value"
		if (pos == -1) continue;
		// If not found, skip
                var argname = pairs[i].substring(0,pos);// Extract the name
                var value = pairs[i].substring(pos+1);// Extract the value
                value = decodeURIComponent(value);// Decode it, if needed
                args[argname] = value;
                        // Store as a property
        }
	return args;// Return the object 
 }


//parameters: cookie name, cookie value
function SetCookie(name, value)
{
	var Days = 30;
	var exp = new Date();
	exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
	document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
}

function getCookie(name)
{
	var arr = document.cookie.match(new RegExp("(^|)"+name+"=([^;]*)(;|$)"));
	if(arr != null) 
	{
		return unescape(arr[2]);
	}
	return null;
}

function delCookie(name)
{
	var exp = new Date();
	exp.setTime(exp.getTime() - 1);
	var cval = getCookie(name);
	if (cval != null) document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
}
window.onload = tick;	
