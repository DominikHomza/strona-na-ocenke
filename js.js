var sumawsz=0;
// Function to add a product to the shopping cart
function dodajDoKoszyka(nazwa, cena, ilosc) {
  sumawsz+=cena;
    // Get the shopping cart table
    var koszykTable = document.getElementById("koszyk-table");
  
    // Get the rows of the shopping cart table
    var koszykRows = koszykTable.getElementsByTagName("tr");
  
    // Loop through the rows to find a matching product
    var znalezionoProdukt = false;
    for (var i = 1; i < koszykRows.length; i++) {
      var koszykRow = koszykRows[i];
      if (koszykRow.getElementsByClassName("nazwa")[0].innerHTML == nazwa) {
        var iloscElement = koszykRow.getElementsByClassName("ilosc")[0];
        iloscElement.innerHTML = parseInt(iloscElement.innerHTML) + ilosc;
        koszykRow.getElementsByClassName("razem")[0].innerHTML = parseFloat(iloscElement.innerHTML) * cena;
        znalezionoProdukt = true;
        break;
      }
    }
  
    // If the product is not in the shopping cart, add it
    if (!znalezionoProdukt) {
      var koszykRow = document.getElementById("koszyk-row").cloneNode(true);
      koszykRow.style.display = "";
      koszykRow.getElementsByClassName("nazwa")[0].innerHTML = nazwa;
      koszykRow.getElementsByClassName("cena")[0].innerHTML = cena;
      koszykRow.getElementsByClassName("ilosc")[0].innerHTML = ilosc;
      koszykRow.getElementsByClassName("razem")[0].innerHTML = cena;
      koszykTable.getElementsByTagName("tbody")[0].appendChild(koszykRow);
    }
  
    // Calculate the total price and update the shopping cart
    var suma = 0;
    for (var i = 1; i < koszykRows.length; i++) {
      var koszykRow = koszykRows[i];
      suma += parseFloat(koszykRow.getElementsByClassName("razem")[0].innerHTML);
    }
    document.getElementById("suma").innerHTML = "Suma: " + suma.toFixed(2) + " zł";
    document.getElementById("brak-produktow").style.display = "none";
  }
  
  // Initialize the shopping cart table
  document.getElementById("koszyk-row").style.display = "none";
  document.getElementById("brak-produktow").style.display = "";
  
  // Function to show/hide the shopping cart
  function pokazKoszyk() {
    var koszyk = document.getElementById("koszyk");
    if (koszyk.style.display === "none") {
      koszyk.style.display = "block";
    } else {
      koszyk.style.display = "none";
    }
  }function obliczSume() {
    return sumawsz;
  }
  