var bs = document.querySelectorAll(".benefit");
var curr = null;
for (var bi=0;bi<bs.length;bi++) {
	if (bs[bi].id) {
		addPopup(bs[bi]);
		console.log(bs[bi].id);
	}
}

function addPopup(elt) {
	elt.addEventListener("click", function() {
		if (curr && curr != elt) {
			curr.classList.remove("popup");
		}
		if (elt.classList.contains("popup")) {
			elt.classList.remove("popup");
			curr = null;
		} else {
			elt.classList.add("popup");
			curr = elt;
		}
	});
}
