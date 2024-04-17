/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

 "use strict";


let labels = document.getElementsByClassName('disabled_labels');
for (let i = 0; i < labels.length; i++) {
    labels[i].nextElementSibling.disabled = true;
    labels[i].style.cursor = "pointer";
    labels[i].addEventListener("click", ()=>{
        labels[i].nextElementSibling.removeAttribute("disabled");

    })
}