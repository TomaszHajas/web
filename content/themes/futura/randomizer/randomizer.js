// Check for the various File API support.
	if (window.File && window.FileReader && window.FileList && window.Blob) {
  		// Great success! All the File APIs are supported.
	} else {
  		alert('The File APIs are not fully supported in this browser.');
	}
	
	function getQueryVariable(variable){
       		var query = window.location.search.substring(1);
       		var vars = query.split("&");
       		for (var i=0;i<vars.length;i++) {
               		var pair = vars[i].split("=");
               		if(pair[0] == variable){return pair[1];}
       		}
       		return(false);
	}
	
	
	var paramTemplate = getQueryVariable("template");
	var paramSeed = getQueryVariable("seed");
	if((paramTemplate === "" || paramTemplate == false) && (paramSeed == false || paramSeed === "")){
		var address = '/randomizer/index.html'+"?seed="+parseInt(1000000+Math.random()*9000000);
		javascript:window.location.href=address;
	}
	
	function getRandomNumber(){
		paramSeed = (paramSeed * 9301 + 49297) % 233280;
		return paramSeed / 233280;
	}
	
	function randomize(){
		var address = '/randomizer/index.html'+"?seed="+parseInt(1000000+getRandomNumber()*9000000);
		javascript:window.location.href=address;
	}

	function randomizeFromTemplate(type){
		var template = encodeURIComponent(document.getElementById("template").value);
		switch(type){
			case "character":
				template = encodeURIComponent("[[character/appearance]|] [[character/personality]|] [Male|Female] [[character/race]|] [[character/job]|]");
			break;
			case "item":
				template = encodeURIComponent("[object/adjective][ and [object/adjective]|] [[object/mundane]|[object/magic]|[object/trinket]]");
			break;
			case "place":
				template = encodeURIComponent("[place/adjective] [[place/area]|[[place/area] with [place/adjective]|][place/building]|[[place/area] with [place/adjective]|][place/natural]|[[place/area] with [place/adjective]|][place/structure]|[place/room][ inside [place/adjective] [place/building]|]]");
			break;
		}
		var address = '/randomizer/index.html'+"?template="+template+"&seed="+parseInt(1000000+getRandomNumber()*9000000);
		javascript:window.location.href=address;
	}

	function randomizeCharacter(){
		var address = '/randomizer/index.html'+"?template=&seed="+parseInt(1000000+getRandomNumber()*9000000);
		javascript:window.location.href=address;
	}
	
	function rollXYTimes(howMany, maxDieRoll){
		var sum = 0;
		for(var i = 0; i < howMany; i++){
			sum += parseInt(getRandomNumber()*maxDieRoll)+1;
		}
		return sum;
	}
	
	function parseOperation(operation, number1, number2){
		switch(operation){
			case "+": return number1+number2;
			case "-": return number1-number2;
			case "*": return number1*number2;
			case ":": return parseInt(number1/number2);
			default: return 0;
		}
	}
	
	function parseRoll(match){
		var regexp = /^\d+d\d+(\-|\+|\*|\:|)?\d*$/g;
		if(regexp.test(match)){
			var numbers = match.match(/\d+/g).map(Number);
			var operation = match.replace(/\d|d/g, '');
			if(operation == null || operation == ""){
				return parseOperation("+", rollXYTimes(numbers[0], numbers[1]), 0)
			}else{
				return parseOperation(operation, rollXYTimes(numbers[0], numbers[1]), numbers[2]);
			}
		}else{
			return 0;
		}
	}
	function stringToRGB(string){
		var hash = 0;
    		for (var i = 0; i < string.length; i++) {
      			hash = string.charCodeAt(i) + ((hash << 5) - hash);
    		}
	    	var c = (hash & 0x00FFFFFF).toString(16).toUpperCase();
    		var hashString = "00000".substring(0, 6 - c.length) + c;
		// darken hash color
		var color = "#", c, i;
		for (i = 0; i < 3; i++) {
			c = parseInt(hashString.substr(i*2,2), 16);
			c = Math.round(Math.min(Math.max(0, c + (c * -0.25)), 255)).toString(16);
			color += ("00"+c).substr(c.length);
		}
		return "\""+color+"\"";
	}
	
	function getRandomLine(text){
    		var lines = text.split('\n');
    		return lines[Math.floor(getRandomNumber()*lines.length)].replace(/\r?\n|\r/g, '');
	}
	
	function randomizeFirstMostNestedSquareBrackets(template){
		var biggestOpeningSquareBracketDifference = 0;
		var biggestClosingSquareBracketDifference = 0;
		var currentSquareBracketDifference = 0;
		var mostNestedOpeningSquareBracketIndex = 0;
		var mostNestedClosingSquareBracketIndex = 0;
		for(var i = 0; i < template.length; i++){
			if(template.charAt(i) == '['){
				currentSquareBracketDifference++;
				if(currentSquareBracketDifference > biggestOpeningSquareBracketDifference){
					biggestOpeningSquareBracketDifference = currentSquareBracketDifference;
					mostNestedOpeningSquareBracketIndex = i;
				}
			}else if(template.charAt(i) == ']'){
				currentSquareBracketDifference--;
				if(currentSquareBracketDifference > biggestClosingSquareBracketDifference){
					biggestClosingSquareBracketDifference = currentSquareBracketDifference;
					mostNestedClosingSquareBracketIndex = i;
				}
			}
		}
		var result = random(template.substring(mostNestedOpeningSquareBracketIndex, mostNestedClosingSquareBracketIndex+1));
		return template.substring(0, mostNestedOpeningSquareBracketIndex) + result + template.substring(mostNestedClosingSquareBracketIndex+1, template.length);
	}
	
	function removeHtmlMarkers(template){
		return template.replace(/<font color(.*?)>/gm, "").replace(/<\/font>/gm, "");
	}
	
	function random(template){
		console.log("on enter: "+template);
		if(template.includes("[") && template.includes("]")){
			regexp = /\[.*?[^[]*\]/;
			firstMatch = "";
			if(regexp.exec(template) != null){
				firstMatch = regexp.exec(template)[0];
			}
			nestedRegexp = /\[[^\]]*\[/;
			nestedMatch = nestedRegexp.exec(template);
			firstMatchNoBrackets = firstMatch.replace(/[\[\]']+/g,'');
			firstMatchNoBrackets = removeHtmlMarkers(firstMatchNoBrackets);
			console.log("nestedMatch: "+nestedMatch);
			if(nestedMatch != null && nestedMatch.length > 0){
				console.log("Nested brackets detected");
				return random(randomizeFirstMostNestedSquareBrackets(template));
			}else if(firstMatchNoBrackets.includes("|")){
				console.log("Altenative detected");
				var array = firstMatchNoBrackets.split('|');
				replacedFirstMatch = template.replace(firstMatch, "<font color="+stringToRGB(firstMatch)+">"+array[Math.floor(getRandomNumber()*array.length)]+"</font>");
				return random(replacedFirstMatch);
			}else if(/\d/.test(firstMatchNoBrackets)){
				console.log("Die roll detected");
				replacedFirstMatch = template.replace(firstMatch, "<font color="+stringToRGB(firstMatch)+">"+parseRoll(firstMatchNoBrackets)+"</font>");
				return random(replacedFirstMatch);
			}else{
				console.log("Table roll detected");
				firstMatchPath = "tables/"+firstMatchNoBrackets+".txt";
				
				var req = new XMLHttpRequest();
    				req.open("GET", firstMatchPath, false); // 'false': synchronous.
    				req.send(null);
				var text = req.responseText;
				
				if(text.includes("DOCTYPE")){
					firstMatchPath = "tables/"+firstMatchNoBrackets+"/"+firstMatchNoBrackets+".txt";
					req.open("GET", firstMatchPath, false); // 'false': synchronous.
    					req.send(null);
					text = req.responseText;
					replacedFirstMatch = template.replace(firstMatch, "<font color="+stringToRGB(firstMatch)+">"+getRandomLine(text)+"</font>");
					console.log("1 "+replacedFirstMatch);
					return random(replacedFirstMatch);
				}else{
					replacedFirstMatch = template.replace(firstMatch, "<font color="+stringToRGB(firstMatch)+">"+getRandomLine(text)+"</font>");
					console.log("2 "+replacedFirstMatch);
					return random(replacedFirstMatch);
				}
				
				/*
				return await fetch(firstMatchPath)
					.then(response => response.text())
					.then(text => {
					if(text.includes("DOCTYPE")){
						firstMatchPath = firstMatchNoBrackets+"/"+firstMatchNoBrackets+".txt";
						fetch(firstMatchPath)
							.then(response => response.text())
							.then(text => {
							replacedFirstMatch = template.replace(firstMatch, "<b>"+getRandomLine(text)+"</b>");
							console.log("1 "+replacedFirstMatch);
							return random(replacedFirstMatch);
						})
					}else{
						replacedFirstMatch = template.replace(firstMatch, "<b>"+getRandomLine(text)+"</b>");
						console.log("2 "+replacedFirstMatch);
						return random(replacedFirstMatch);
					}
				})
				*/
			}
		}else{
			console.log("before return: "+template);
			return template;
		}
	}
	
	if(paramTemplate != ""){
		console.log("template0: "+paramTemplate);
		var decodedTemplate = decodeURIComponent(paramTemplate);
		/*
		random(decodedTemplate).then(function(result){
			document.getElementById("random").innerHTML = result;
		});
		*/
		document.getElementById("random").innerHTML = random(decodedTemplate);
		document.getElementById("template").value = decodedTemplate;
	}else{
		var templateReq = new XMLHttpRequest();
    		templateReq.open("GET", "templates/templates.txt", false); // 'false': synchronous.
    		templateReq.send(null);
		var templates = templateReq.responseText;
		randomTemplate = getRandomLine(templates);
		document.getElementById("template").value = randomTemplate;
		document.getElementById("random").innerHTML = random(randomTemplate);
		/*
		random(randomTemplate).then(function(result){
			document.getElementById("random").innerHTML = result;
		});
		*/
	}
