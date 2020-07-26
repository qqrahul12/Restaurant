var total = 0

function increase(x,w)
{	
	var y = document.getElementsByClassName('qty');
	var a = document.getElementsByClassName('qunty');
	var cur = y[x];
	var b = a[x];
	var z = cur.innerHTML;
	var check = parseInt(z,10)+1;
	if(check<=10){
			cur.innerHTML = parseInt(z,10)+1;
			b.value = parseInt(z,10)+1;
			total = total+w;}

}

function decrease(x,w)
{
	var y = document.getElementsByClassName('qty');
	var a = document.getElementsByClassName('qunty');
	var cur = y[x];
	var b = a[x];
	var z = cur.innerHTML;
	var check = parseInt(z,10)-1;
	if(check>=0){
			cur.innerHTML = parseInt(z,10)-1;
			b.value = parseInt(z,10)-1;
			total= total-w;	}

}