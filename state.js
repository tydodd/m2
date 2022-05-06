var colors = ['red','orange','yellow','green','blue','purple','grey','brown','black','teal'];
    
// state variables
var colorIndex = 0; // index of the selected color
var numColors = 0;
var numRows = 0;
var selectedCells = []; // array of arrays with length numColors

function setNumRows(n) {
    numRows = n;
}

function setNumColors(n) {
    numColors = n;
}

function initSelectedCells() {
    for(let i=0; i<numColors; i++) {
        selectedCells.push([]);
    }
}

function setCellColor(el) {
    el.classList.remove(el.getAttribute('class'));
    el.classList.add(colors[colorIndex]);
}

function selectCell(id) {
    selectedCells[colorIndex].push(id);
    selectedCells[colorIndex].sort();
}

function displaySelectedCells(index) {
    var el = document.getElementById("color"+index.toString())
    var cellsStr = "";
    for(let i=0; i<selectedCells[index].length; i++) {
        if (i==selectedCells[index].length-1) {
            cellsStr += selectedCells[index][i];
        }
        else {
            cellsStr += selectedCells[index][i] + ", ";
        }
    }
    el.innerHTML = newHTML(el.innerHTML, cellsStr);
}

function deleteRepeatId(id) {
    for(let i=0; i<numColors; i++) {
        for(let j=0; j<selectedCells[i].length; j++) {
            if(selectedCells[i][j]==id) {
                selectedCells[i].splice(j, 1);
                displaySelectedCells(i);
            }
        }
    }
}

function cellClicked(el) {
    setCellColor(el);
    deleteRepeatId(el.id);
    selectCell(el.id);
    displaySelectedCells(colorIndex);
}

function setColorIndex(i) {
    colorIndex = i;
}

function newHTML(oldHTML, cells) {
    let i = oldHTML.indexOf("|");
    return oldHTML.substring(0, i+2) + cells + "</td>";
}

function setColorOpt(newColor, colorRowIndex) {
    let oldColor = colors[colorRowIndex];
    for (let i=0; i<numColors; i++) {
        if (colors[i]==newColor) {
            let er = document.getElementById("selectColorError");
            er.innerHTML = "<div id=selectColorError>Colors cannot be selected more than once</div>"
            let el = document.getElementById("colorOpt"+colorRowIndex.toString());
            el.value = oldColor;
            return;
        }
    }
    var collection = document.getElementsByClassName(oldColor);
    for (let i=0; i<collection.length; i++) {
        collection[i].classList.add(newColor);
    }
    var collection = document.getElementsByClassName(newColor);
    for (let i=0; i<collection.length; i++) {
        collection[i].classList.remove(oldColor);
    }
    colors[colorRowIndex] = newColor;
}

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  function setCellCookies() {
    for (let i=0; i<numColors; i++) {
        let cValue = "";
        for (let j=0; j<selectedCells[i].length; j++) {
            if (j==selectedCells[i].length-1) {
                cValue += selectedCells[i][j];
            }
            else {
                cValue += selectedCells[i][j] + ", ";
            }
        }
        let cName = "cells"+i.toString();
        setCookie(cName, cValue, 1);
    }
  }

function setColorCookies() {
    for (let i=0; i<numColors; i++) {
        let cValue = colors[i];
        let cName = "colors"+i.toString();
        setCookie(cName, cValue, 1);
    }
}

function setAllCookies() {
    setCellCookies();
    setColorCookies();
}
