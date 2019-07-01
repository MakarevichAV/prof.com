let add = document.querySelector('.add');
let del = document.querySelector('.delete');
let parArr = document.querySelector('.par-arr');

let i = 0;
add.addEventListener( 'click', function () {
    i++;
    let textareaP = document.createElement('textarea');
    textareaP.setAttribute( 'name', 'paragraph[]' );
    textareaP.setAttribute( 'class', 'paragraph' );
    textareaP.setAttribute( 'rows', '8' );
    textareaP.setAttribute( 'placeholder', 'Параграф' );
    textareaP.setAttribute( 'id', i );

    parArr.appendChild(textareaP);

} );

del.addEventListener( 'click', function () {

    // i = '#' + i;
    // let par = document.querySelector(i);
    let par = document.getElementById(i);
    parArr.removeChild(par);
    i--;

} );


// let xhr = new XMLHttpRequest;
// xhr.open( 'GET', '/handlers/addParagraph.php' );
// xhr.send();

// xhr.addEventListener( 'load', function () {

// } );
