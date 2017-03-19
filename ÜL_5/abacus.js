/*javascript
liigutab nuppe vasakule ja paremale */
window.onload = function () {
	var nupud = document.getElementsByClassName("bead");
	for (var i = 0; i < nupud.length; i++) {
		nupud[i].onclick = function () {
			var asukoht = getComputedStyle(this, null).getPropertyValue("float");
			if (asukoht == "left") {
				this.style.cssFloat = "right";
			} else if (asukoht == "right") {
				this.style.cssFloat = "left";
			}
		}
	}
}
