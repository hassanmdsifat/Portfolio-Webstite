
function getcaption(img)
{
	var dict = {};
	dict["railline"]="This is a image of railline";
    dict["iphone10"]="This is the image of a Iphone X";
    dict["metalica"]="My Favorite Band";
	let name=img.name;
    let obj=document.getElementById(name);
    //console.log(dict["iphone10"]);
    //alert(name);
	obj.innerHTML=dict[name];
}

function get_erro()
{
    alert("No Message Replied!");
}