document.addEventListener("DOMContentLoaded", function(event) {

  /*
   * Actions when window is scrolling
   */
  window.addEventListener('scroll', () => {
    showPic();
  });



  /*
   * Show picture when scroll is over it
   */
  const showPic = () => {
    const viewportHeight = document
      .documentElement
      .clientHeight;

    const articleList = document
      .getElementsByClassName('article-list__item');

    [].forEach.call(articleList, el => {
      const offsetTop = el.getBoundingClientRect().top;

      if (offsetTop < viewportHeight) {
        el.classList.add('visible');
      }
    });
  };



  /*
   * Cursor over images app
   */
  const cursor = document
    .getElementById('cursor');
  const imagesWithCursor = document
    .getElementsByClassName('cross-cursor');
  const sliderImgs = document
    .querySelectorAll('.last-article__picture img');

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
  [].forEach.call(sliderImgs, el => {
    el.addEventListener('mousemove', moveCursor);
    el.addEventListener('mouseout', () => {
      cursor.classList.remove('visible');
    });
  });



  /*
   * Toggle header navigation
   */
  const btnsToggleNav = document
    .getElementsByClassName('btnToggleNav');

  const nav = document
    .querySelectorAll('.header .nav')[0];

  [].forEach.call(btnsToggleNav, el => {
      el.addEventListener('click', () => {
        nav.classList.toggle("visible");
      });
    });

  /*
   * Service for async getting data
   */
  const objectToFormData = (obj) => {
    const formData = new FormData();

    for (let key in obj) {
      formData.append(key, obj[key]);
    }

    return formData;
  };

  const getResource = async (url, data) => {
    const _apiBase = 'http://designtalk/';

    const response = data === undefined
      ? await fetch(`${_apiBase}${url}`)
      : await fetch(`${_apiBase}${url}`, {
        method: 'POST',
        cache  : 'no-cache',
        body: objectToFormData(data)
      });

    if (!response.ok) {
      throw new Error(`Could not fetch data from ${url}, received ${response.status}`);
    }

    try {
      return await response.json();
    } catch (error) {
      throw new TypeError(`Received data must be a JSON. An error occurred on URL: ${response.url}`);
    }
  };

  const addChildren = (targetNode, resourceList, pageName) => {

    for (let i = 0; i < resourceList.length; i++) {
      const wrap = document.createElement('div');
      wrap.id = resourceList[i].id;
      wrap.classList.add('article-list__item', 'col-lg-6', pageName);

      // Adding picture
      const pic = document.createElement('a');
      const picDiv = document.createElement('div');
      const picImg = document.createElement('div');
      pic.classList.add('article-list__picture');
      pic.href = '/articles/' + resourceList[i].url;
      picImg.classList.add('padding-huck', 'cross-cursor');
      picImg.style.backgroundImage = "url('/images/" + resourceList[i].picture;
      pic.appendChild(picDiv.appendChild(picImg));

      // Adding listeners for print custom cursor to the picture
      picImg.addEventListener('mousemove', moveCursor);
      picImg.addEventListener('mouseout', () => {
        cursor.classList.remove('visible');
      });

      // Adding rubric of articles
      const rubric = document.createElement('a');
      rubric.classList.add('article-list__rubric', 'link');
      rubric.href = resourceList[i].rubric.link;
      rubric.innerHTML = resourceList[i].rubric.name;

      // Adding caption of articles
      const caption = document.createElement('a');
      const captionTextWrap = document.createElement('span');
      caption.classList.add('article-list__caption');
      caption.href = resourceList[i].url;
      captionTextWrap.innerHTML = resourceList[i].title;
      caption.appendChild(captionTextWrap);

      // Building element and adding to the target node
      wrap.appendChild(pic);
      wrap.appendChild(rubric);
      wrap.appendChild(caption);
      targetNode.appendChild(wrap);
    }

    // Show added articles if it visible
    showPic();
  };


  /*
   * Setting articles to the source node
   */
  const setArticles = (e, response) => {
    response.next === null
      ? e.target.style.display = 'none'
      : e.target.dataset.urlResource = response.next;

    const targetNode = document
      .getElementById(e.target.dataset.targetNodeId);

    addChildren(
      targetNode,
      response.results,
      e.target.dataset.pageName
    );
  };

  /*
   * Show more articles
   */
  const btnShowMoreArticles = document
    .getElementsByClassName('button_show-more-articles')[0];
  const spinner = document.getElementById('spinner');

  btnShowMoreArticles
    .addEventListener('click', (e) => {
      spinner.classList.add('visible');

      getResource(e.target.dataset.urlResource)
        .then((response) => {
          spinner.classList.remove('visible');
          setArticles(e, response);
        })
        .catch((error) => {
          console.log(error);
        });
    });


  /*
   * Handle subscribe news
   */












});