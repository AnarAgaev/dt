document.addEventListener("DOMContentLoaded", function(event) {

  /*
   * Cursor over images app
   */
  const cursor = document.getElementById('cursor');

  // Add new cursor to the document
  document.body.appendChild(cursor);

  // Get clickable images
  const imagesWithCursor = document
    .getElementsByClassName('cross-cursor');

  // Function for move cursor when mouse is over image
  const moveCursor = event => {
    cursor.style.top = event.pageY + 'px';
    cursor.style.left = event.pageX + 'px';
    cursor.classList.add('visible');
  };

  // Listening when cursor of mouse is over or out on clickable image
  [].forEach.call(imagesWithCursor, el => {
    el.addEventListener('mousemove', moveCursor);
    el.addEventListener('mouseout', () => {
      cursor.classList.remove('visible');
    });
  });














});