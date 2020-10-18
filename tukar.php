<body>
<center>
<!-- menyediakan butang tukar warna font -->
<button id= "color">Tukar Warna</button>
</center>
<script> 
document.getElementById('color').onclick = changeColor;
//tukar warna di sini
var CurrentColor = "red";
function changeColor() {
    if(currentColor == "red"){
        document.body.style.color = "blue";
        currentColor = "blue";
    } else {
        document.body.style.color = "red";
        currentColor = "red";
    }
}
</script> 
</body>