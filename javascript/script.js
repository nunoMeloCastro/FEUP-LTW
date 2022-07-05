/**
function changeAllArticleColors() {
    const products = document.querySelectorAll("#products article");
    for(const p of products){
        p.classList.add("sale");
    }

}
  
changeAllArticleColors()
*/
/**
function attachBuyEvents() {
    const buttons = document.querySelectorAll("#products article button");
    console.log(buttons);
    for(b of buttons){
        b.addEventListener('click', 
        function() {
            const cart = document.querySelector("#cart table tfoot");
            const newRow = document.createElement("tr");

            const newColID = document.createElement("th");
            const newID = document.createTextNode(this.parentElement.getAttribute("data-id"));
            newColID.appendChild(newID);

            const newColName = document.createElement("th");
            const newName = document.createTextNode(this.parentElement.querySelector(".price").textContent);
            newColName.appendChild(newName);

            const newColPrice = document.createElement("th");
            const newPrice = document.createTextNode(this.parentElement.querySelector("h2").textContent);
            newColPrice.appendChild(newPrice);

            const newColQuantity = document.createElement("th");
            const newQuantity = document.createTextNode(this.parentElement.querySelector("input").value);
            newColQuantity.appendChild(newQuantity);

            const newColTotal= document.createElement("th");
            var quant = parseInt(newQuantity,10);
            var pr = parseInt(newPrice,10);
            pr = pr * quant;
            const newTotal = document.createTextNode(pr);
            newColTotal.appendChild(newTotal);

            const newColDel = document.createElement("th");
            const newDelete = document.createTextNode("Delete Button");
            newColDel.appendChild(newDelete);



            newRow.appendChild(newColID);
            newRow.appendChild(newColName);
            newRow.appendChild(newColQuantity);
            newRow.appendChild(newColPrice);
            newRow.appendChild(newColTotal);
            newRow.appendChild(newColDel);

            document.insertBefore(newRow, cart);

            //this.parentElement.classList.toggle("sale");
            //console.log(this.parentElement.getAttribute("data-id"));
            //console.log("Name: ",this.parentElement.querySelector(".price").textContent);
            //console.log("Price: ",this.parentElement.querySelector("h2").textContent);
            //console.log("Quantity: ",this.parentElement.querySelector("input").value);
        });
    }
  }
  
  attachBuyEvents()

  */
(function () {
    // Activate Adding State
    $('.btn').click(function () {
        //console.log("here2");
        var e;
        e = $(this);
        if (!e.hasClass('size_not_selected')) {
            //console.log("here3");
            e.toggleClass('adding');
            return setTimeout((function () {
                return e.toggleClass('adding');
            }), 2600);
        }
    });

}).call(this);


let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
} 
