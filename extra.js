function OpenList() {
    document.getElementById("Tables").classList.toggle("show"); //Εμφάνιση της λίστας των πινάκων στο extra.php
}
if(typeof window !=='undefined'){
window.onclick = function(event) {
  if (!event.target.matches('.ListOpen')) {
    var dropdowns = document.getElementsByClassName("menu");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
}
function PublishClick(){ // Συνάρτηση κλήσης πίνακα εκδοτικών οίκων
  // Ο πίνακας των εκδοτικών οίκων προβάλλεται, ενώ ο πίνακας των συμβολαιογράφων (αν εμφανίζεται) κρύβεται
  document.getElementById("Houses").classList.add("ShowTable") 
  document.getElementById("Notaries").classList.remove("ShowTable")
}
function NotaryClick(){ //Συνάρτηση κλήσης πίνακα συμβολαιογράφων
  document.getElementById("Houses").classList.remove("ShowTable")
  document.getElementById("Notaries").classList.add("ShowTable")
}